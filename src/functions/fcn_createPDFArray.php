<?php

// Function to create an array to print claim from one vendor id at a time

function fcn_createPDFArray($logger, $apiKey, $apiUrl, $vendorID, $signature, $title)
{

    $logger->info("Step 1 - create PDf array started");
    // GET supplier information
    $arr_supplierInfo = fcn_getSupplierInfo($logger, $apiKey, $apiUrl, $vendorID);
    $arr_vendor = array(
        'VendName' => $arr_supplierInfo['name'],
        'VendAddress' => $arr_supplierInfo['address'],
        'VendCity' => $arr_supplierInfo['town'],
        'VendState' => $arr_supplierInfo['state_code'],
        'VendZip' => $arr_supplierInfo['zip'],
        'VendCode' => $arr_supplierInfo['code_fournisseur']
    );


    // GET bank account details
    $logger->info("Step 1 - get bank accounts information");
    $arr_bankAccounts = fcn_getBankAccounts($logger, $apiKey, $apiUrl);
    $arr_filteredBankAccount = array_column($arr_bankAccounts, 'label', 'id');

    // GET invoice details
    $logger->info("Step 1 - get invoice details");
    $arr_filteredInvoices = fcn_getSupplierInvoices($logger, $apiKey, $apiUrl, $vendorID);
    for ($i = 0; $i < count($arr_filteredInvoices); $i++) {
        $arr_inv_detail[$i] = array(
            "InvID" => $arr_filteredInvoices[$i]['id'],
            "InvDate" => date('m/d/Y', $arr_filteredInvoices[$i]['datec']),
            "InvRef" => substr($arr_filteredInvoices[$i]['ref_supplier'], 0, 25),
            "InvNote" => substr($arr_filteredInvoices[$i]['note_public'], 0, 41),
            "InvAmt" => substr($arr_filteredInvoices[$i]['total_ttc'], 0, -6),
            "InvFundID" => $arr_filteredInvoices[$i]['fk_account'],
            // use $arr_filteredInvoices[$i]['fk_account'] to get InvFundLabel and InvFundNumber
            "Bank" => search($arr_bankAccounts, 'id', $arr_filteredInvoices[$i]['fk_account'])
        );
    }

    // GET current date, signature image path, and title
    $logger->info("Step 1 - get date, signature image path, and title information");
    $arr_signature = array(
        'ClaimDate' => date('m/d/Y', time()),
        'ClaimSig' => $signature,
        'ClaimTitle' => substr($title, 0, 25)
    );

    // Join arrays to send to next function
    $logger->info("Step 1 - merge the arrays into arr_print");
    $arr_print = $arr_vendor + $arr_inv_detail + $arr_signature + $arr_filteredBankAccount;

    // Cleanup arrays
    unset($arr_vendor);
    unset($arr_bankAccounts);
    unset($arr_filteredInvoices);
    unset($arr_signature);
    unset($arr_filteredBankAccount);
    $logger->info("Step 1 - cleanup arrays no longer needed");

    return $arr_print;
}
