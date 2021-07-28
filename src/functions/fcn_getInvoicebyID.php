<?php

// GET supplier invoices information
function fcn_getInvoicebyID($logger, $apiKey, $apiUrl, $invoiceID)
{
    $apiEndpoint = "supplierinvoices/" . $invoiceID;
    $parameters = [
    ];
    $arrInvoicebyID = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
    $arrInvoicebyID = json_decode($arrInvoicebyID, true);

    if (isset($arrInvoicebyID["error"]) && $arrInvoicebyID["error"]["code"] >= "300") {
        echo "<br><br>Error in fcn_getInvoicebyID - " . json_encode($arrInvoicebyID["error"]["message"]);
        $logger->critical(json_encode($arrInvoicebyID));
        exit;
    }
    return $arrInvoicebyID;
}
