<?php

// GET supplier invoices sorted by fk_soc with status of unpaid
function fcn_getSupplierInvoices($logger, $apiKey, $apiUrl, $vendorID)
{
    $apiEndpoint = "supplierinvoices";
    $parameters = [
        "limit" => 100,
        "sortfield" => "t.fk_soc",
        "status" => "unpaid",
        "thirdparty_ids" => "$vendorID"
    ];
    $arrUnpaidInvoices = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
    $arrUnpaidInvoices = json_decode($arrUnpaidInvoices, true);

    if (isset($arrUnpaidInvoices["error"]) && $arrUnpaidInvoices["error"]["code"] >= "300") {
        echo "<br><br>No UNPAID supplier invoices found - Error in fcn_getSupplierInvoices<br><br>";
		$logger->critical(json_encode($arrUnpaidInvoices));
        exit;
	}
	return $arrUnpaidInvoices;
}
