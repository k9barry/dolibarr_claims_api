<?php

// Get bank account id and label
function fcn_getStateNamebyID($logger, $apiKey, $apiUrl, $id)
{
	$apiEndpoint = "setup/dictionary/states/" . $id;
	$parameters = [];
	// Retrieve state name
	$arr_getStateName = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
	$arr_getStateName = json_decode($arr_getStateName, true);

	if (isset($arr_getStateName["error"]) && $arr_getStateName["error"]["code"] >= "300") {
		echo "<br><br>Error in arr_getStateName - " . json_encode($arr_getStateName["error"]["message"]);
		$logger->critical(json_encode($arr_getStateName));
		exit;
	}
	return $arr_getStateName;
}
