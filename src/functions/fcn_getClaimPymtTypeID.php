<?php

// Retrieve payment type filter by code = "CL"
function fcn_getClaimPymtTypeID($logger, $apiKey, $apiUrl)
{
	$apiEndpoint = "setup/dictionary/payment_types";
	$parameters = [
		"limit" => 1, 
		"sortfield" => "id", 
		"active" => "1", 
		"sqlfilters" => "t.code='CL'"
	];
	$getClaimPymtID = callAPI("GET", $apiKey, $apiUrl . "/" . $apiEndpoint, $parameters);
	$getClaimPymtID = json_decode($getClaimPymtID, true);

	if (isset($getClaimPymtID["error"]) && $getClaimPymtID["error"]["code"] >= "300") {
		echo "<br><br>Error in fcn_getClaimPymtTypeID - ". json_encode($getClaimPymtID["error"]["message"]);
		$logger->critical(json_encode($getClaimPymtID));
		exit;
	}

	$claimPymtTypeID = $getClaimPymtID[0]['id'];
	return $claimPymtTypeID;
}
