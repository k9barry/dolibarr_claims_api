<?php

// Function to create an array to print claim from one vendor id at a time
function fcn_createPDFArray($logger, $apiKey, $apiUrl, $vendorID, $signature, $title)
{

    $logger->info("Vendor " . $vendorID . " - create PDf array started");
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
    $logger->info("Vendor " . $vendorID . " - arr_vendor = " . json_encode($arr_vendor));


    // GET invoice details
    $logger->info("Vendor " . $vendorID . " - get individual invoice details");
    $arr_filteredInvoiceInfo = fcn_getInvoiceInfo($logger, $apiKey, $apiUrl, $vendorID);
    for ($i = 0; $i < count($arr_filteredInvoiceInfo); $i++) {
        $arr_inv_detail[$i] = array(
            "InvID" => $arr_filteredInvoiceInfo[$i]['id'],
            "InvDate" => date('m/d/Y', $arr_filteredInvoiceInfo[$i]['datec']),
            "InvRef" => substr($arr_filteredInvoiceInfo[$i]['ref_supplier'], 0, 25),
            "InvNote" => substr($arr_filteredInvoiceInfo[$i]['note_public'], 0, 38),
            "InvAmt" => substr($arr_filteredInvoiceInfo[$i]['total_ttc'], 0, -6),
            "InvFundID" => $arr_filteredInvoiceInfo[$i]['fk_account'],
            // use $arr_filteredInvoiceInfo[$i]['fk_account'] to get InvFundLabel and InvFundNumber
            $arr_getLabelandNumber = fcn_getBankAccountbyID($logger, $apiKey, $apiUrl, $arr_filteredInvoiceInfo[$i]['fk_account']),
            "InvFundLabel" => $arr_getLabelandNumber['label'],
            "InvFundNumber" => $arr_getLabelandNumber['ref'],
        );

        $allowedKeys = ['InvID', 'InvDate', 'InvRef', 'InvNote', 'InvAmt', 'InvFundID', 'InvFundLabel', 'InvFundNumber'];
        $arr_inv_detail[$i] = array_intersect_key($arr_inv_detail[$i], array_flip($allowedKeys));
    }
    $logger->info("Vendor " . $vendorID . " - all invoice details " . json_encode($arr_inv_detail));


    // GET current date, signature image path, and title
    $logger->info("Vendor " . $vendorID . " - get date, signature image path, and title information");
    $arr_signature = array(
        'ClaimDate' => date('m/d/Y', time()),
        'ClaimSig' => $signature,
        'ClaimTitle' => substr($title, 0, 25)
    );
    $logger->info("Vendor " . $vendorID . " - arr_signature path = " . json_encode($arr_signature));


    // Join arrays to send to next function
    $arr_print = $arr_vendor + $arr_inv_detail + $arr_signature;
    $logger->info("Vendor " . $vendorID . " - merge the arrays into arr_print");
    $logger->info("Vendor " . $vendorID . " $arr_print = " . json_encode($arr_print));

    // Cleanup arrays
    unset($arr_vendor);
    unset($arr_filteredInvoiceInfo);
    unset($arr_signature);
    $logger->info("Vendor " . $vendorID . " - cleanup arrays no longer needed");

    return $arr_print;
}
