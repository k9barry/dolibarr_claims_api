<?php

// Pay supplier invoice with claim

function fcn_postSupplierPayment($logger, $apiKey, $apiUrl, $invoiceID)
{
    
    // GET fk_account 
    $arrInvoicebyID = fcn_getInvoicebyID($logger, $apiKey, $apiUrl, $invoiceID);
    $fk_account = $arrInvoicebyID['fk_account'];

    // Retrieve payment type filter by code = "CL"
    $claimPymtTypeID = fcn_getClaimPymtTypeID($logger, $apiKey, $apiUrl);

    // Set current date in UNIX time
    $unixCurrentTime = time();

    // POST supplier invoice as paid
    $apiEndpoint = "supplierinvoices/" . $invoiceID . "/payments";
    $parameters = [
        "datepaye" => "$unixCurrentTime",
        "payment_mode_id" => "$claimPymtTypeID",
        "closepaidinvoices" => "yes",
        "accountid" => "$fk_account",
        "num_payment" => "",
        "comment" => "Paid by claim using the API",
        "chqemetteur" => "",
        "chqbank" => ""
    ];
    $arrSupplierInvoicePaid = callAPI("POST", $apiKey, $apiUrl . "/" . $apiEndpoint, json_encode($parameters));
    $arrSupplierInvoicePaid = json_decode($arrSupplierInvoicePaid, true);

    if (isset($arrSupplierInvoicePaid["error"]) && $arrSupplierInvoicePaid["error"]["code"] >= "300") {
        echo "<br><br>Error in fcn_postSupplierPayment - " . json_encode($arrSupplierInvoicePaid["error"]["message"]);
        $logger->critical(json_encode($arrSupplierInvoicePaid));
        exit;
    }
    return $arrSupplierInvoicePaid;
}
