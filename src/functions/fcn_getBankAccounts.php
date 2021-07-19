<?php

// Get bank account id and label
function fcn_getBankAccounts($logger, $apiKey, $apiUrl)
{
	$apiEndpoint = "bankaccounts";
	$parameters = [];
	// Retrieve bank accounts
	$arr_bankAccountInfo = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
	$arr_bankAccountInfo = json_decode($arr_bankAccountInfo, true);

	if (isset($arr_bankAccountInfo["error"]) && $arr_bankAccountInfo["error"]["code"] >= "300") {
		echo "<br><br>Error in fcn_getBankAccounts - ". json_encode($arr_bankAccountInfo["error"]["message"]);
		$logger->critical(json_encode($arr_bankAccountInfo));
		exit;
	}
	return $arr_bankAccountInfo;
}
