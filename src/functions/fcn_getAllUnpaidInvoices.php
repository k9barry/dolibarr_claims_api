<?php

// GET supplier invoices sorted by fk_soc with status of unpaid
function fcn_getAllUnpaidInvoices($logger, $apiKey, $apiUrl)
{
    $apiEndpoint = "supplierinvoices";
    $parameters = [
        "limit" => 100,
        "sortfield" => "t.fk_soc",
        "status" => "unpaid"
    ];
    $arrAllUnpaidInvoices = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
    $arrAllUnpaidInvoices = json_decode($arrAllUnpaidInvoices, true);

    if (isset($arrAllUnpaidInvoices["error"]) && $arrAllUnpaidInvoices["error"]["code"] >= "300") {
        echo "<br><br>No UNPAID supplier invoices found - Error in fcn_getSupplierInvoices<br><br>";
		$logger->critical(json_encode($arrAllUnpaidInvoices));
        exit;
	}

	return $arrAllUnpaidInvoices;
}
