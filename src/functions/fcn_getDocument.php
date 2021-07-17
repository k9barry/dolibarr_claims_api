<?php

// GET supplier info
function fcn_getDocument($logger, $apiKey, $apiUrl, $modulepart, $id)
{
    $apiEndpoint = "documents?modulepart=".$modulepart."&id=".$id;
    $parameters = [
    ];
    $arrDocumentInfo = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
    $arrDocumentInfo = json_decode($arrDocumentInfo, true);

    if (isset($arrDocumentInfo["error"]) && $arrDocumentInfo["error"]["code"] >= "300") {
        echo "<br><br>Error in fcn_getDocument<br><br>";
		$logger->critical(json_encode($arrDocumentInfo));
        exit;
	}
    return $arrDocumentInfo;
}
