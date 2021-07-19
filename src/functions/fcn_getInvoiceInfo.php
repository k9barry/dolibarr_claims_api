<?php

// GET supplier invoices information
function fcn_getInvoiceInfo($logger, $apiKey, $apiUrl, $thirdparty_ids = "")
{
    $apiEndpoint = "supplierinvoices";
    $parameters = [
        "limit" => 100,
        "sortfield" => "t.fk_soc",
        "status" => "unpaid",
        "thirdparty_ids" => "$thirdparty_ids"
    ];
    $arrInvoiceInfo = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
    $arrInvoiceInfo = json_decode($arrInvoiceInfo, true);

    if (isset($arrInvoiceInfo["error"]) && $arrInvoiceInfo["error"]["code"] >= "300") {
        echo "<br><br>No UNPAID supplier invoices found - ". json_encode($arrInvoiceInfo["error"]["message"]);
		$logger->critical(json_encode($arrInvoiceInfo));
        exit;
	}
	return $arrInvoiceInfo;
}
