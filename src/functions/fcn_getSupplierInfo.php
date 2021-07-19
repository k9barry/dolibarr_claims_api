<?php

// GET supplier info
function fcn_getSupplierInfo($logger, $apiKey, $apiUrl, $thirdparty_ids = "")
{
    $apiEndpoint = "thirdparties/".$thirdparty_ids;
    $parameters = [
    ];
    $arrSupplierInfo = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
    $arrSupplierInfo = json_decode($arrSupplierInfo, true);

    if (isset($arrSupplierInfo["error"]) && $arrSupplierInfo["error"]["code"] >= "300") {
        echo "<br><br>Error in fcn_getSupplierInfo - ". json_encode($arrSupplierInfo["error"]["message"]);
		$logger->critical(json_encode($arrSupplierInfo));
        exit;
	}
    return $arrSupplierInfo;
}
