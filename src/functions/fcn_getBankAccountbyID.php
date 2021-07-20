<?php

// Get bank account id and label
function fcn_getBankAccountbyID($logger, $apiKey, $apiUrl, $id)
{
	$apiEndpoint = "bankaccounts/".$id;
	$parameters = [];
	// Retrieve bank accounts
	$arr_getLabelandNumber = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
	$arr_getLabelandNumber = json_decode($arr_getLabelandNumber, true);

	if (isset($arr_getLabelandNumber["error"]) && $arr_getLabelandNumber["error"]["code"] >= "300") {
		echo "<br><br>Error in fcn_getBankAccounts - ". json_encode($arr_getLabelandNumber["error"]["message"]);
		$logger->critical(json_encode($arr_getLabelandNumber));
		exit;
	}
	return $arr_getLabelandNumber;
}
