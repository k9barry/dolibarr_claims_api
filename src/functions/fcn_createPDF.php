<?php

function fcn_createPDF($logger, $apiKey, $apiUrl, $arr_print)
{

  $logger->info("Vendor " . $arr_print['VendName'] . " - create PDf");

  //Define variables
  $vendName = '';
  $vendAddress = '';
  $vendCity = '';
  $vendState = '';
  $vendZip = '';
  $vendCode = '';

  $invDate0 = '';
  $invRef0 = '';
  $invNote0 = '';
  $invAmount0 = '';
  $subKey0 = '';
  $subValue0 = '';
  $subNumber0 = '';

  $invDate1 = '';
  $invRef1 = '';
  $invNote1 = '';
  $invAmount1 = '';
  $subKey1 = '';
  $subValue1 = '';
  $subNumber1 = '';

  $invDate2 = '';
  $invRef2 = '';
  $invNote2 = '';
  $invAmount2 = '';
  $subKey2 = '';
  $subValue2 = '';
  $subNumber2 = '';

  $invDate3 = '';
  $invRef3 = '';
  $invNote3 = '';
  $invAmount3 = '';
  $subKey3 = '';
  $subValue3 = '';
  $subNumber3 = '';

  $invDate4 = '';
  $invRef4 = '';
  $invNote4 = '';
  $invAmount4 = '';
  $subKey4 = '';
  $subValue4 = '';
  $subNumber4 = '';

  $invDate5 = '';
  $invRef5 = '';
  $invNote5 = '';
  $invAmount5 = '';
  $subKey5 = '';
  $subValue5 = '';
  $subNumber5 = '';

  $invDate6 = '';
  $invRef6 = '';
  $invNote6 = '';
  $invAmount6 = '';
  $subKey6 = '';
  $subValue6 = '';
  $subNumber6 = '';

  $invDate7 = '';
  $invRef7 = '';
  $invNote7 = '';
  $invAmount7 = '';
  $subKey7 = '';
  $subValue7 = '';
  $subNumber7 = '';

  $invDate8 = '';
  $invRef8 = '';
  $invNote8 = '';
  $invAmount8 = '';
  $subKey8 = '';
  $subValue8 = '';
  $subNumber8 = '';

  $invDate9 = '';
  $invRef9 = '';
  $invNote9 = '';
  $invAmount9 = '';

  $claimDate = '';
  $claimSignature = '';
  $claimTitle = '';

  $total = '0';

  //Fill variables
  $vendName = htmlspecialchars($arr_print['VendName']);
  $vendAddress = htmlspecialchars($arr_print['VendAddress']);
  $vendCity = htmlspecialchars($arr_print['VendCity']);
  $vendState = htmlspecialchars($arr_print['VendState']);
  $vendZip = htmlspecialchars($arr_print['VendZip']);
  $vendCode = htmlspecialchars($arr_print['VendCode']);

  $invDate0 = htmlspecialchars($arr_print[0]['InvDate']);
  $invRef0 = htmlspecialchars($arr_print[0]['InvRef']);
  $invNote0 = htmlspecialchars($arr_print[0]['InvNote']);
  $invAmount0 = htmlspecialchars($arr_print[0]['InvAmt']);

  echo "<br>";
  echo "<br>";
  echo "$invDate0";
  echo "<br>";
  echo "$invRef0";
  echo "<br>";
  echo "$invNote0";
  echo "<br>";
  echo "$invAmount0";
  echo "<br>";

  if (!empty($arr_print[1]['InvDate'])) {
    $invDate1 = htmlspecialchars($arr_print[1]['InvDate']);
    $invRef1 = htmlspecialchars($arr_print[1]['InvRef']);
    $invNote1 = htmlspecialchars($arr_print[1]['InvNote']);
    $invAmount1 = htmlspecialchars($arr_print[1]['InvAmt']);
  }
  if (!empty($arr_print[2]['InvDate'])) {
    $invDate2 = htmlspecialchars($arr_print[2]['InvDate']);
    $invRef2 = htmlspecialchars($arr_print[2]['InvRef']);
    $invNote2 = htmlspecialchars($arr_print[2]['InvNote']);
    $invAmount2 = htmlspecialchars($arr_print[2]['InvAmt']);
  }
  if (!empty($arr_print[3]['InvDate'])) {
    $invDate3 = htmlspecialchars($arr_print[3]['InvDate']);
    $invRef3 = htmlspecialchars($arr_print[3]['InvRef']);
    $invNote3 = htmlspecialchars($arr_print[3]['InvNote']);
    $invAmount3 = htmlspecialchars($arr_print[3]['InvAmt']);
  }
  if (!empty($arr_print[4]['InvDate'])) {
    $invDate4 = htmlspecialchars($arr_print[4]['InvDate']);
    $invRef4 = htmlspecialchars($arr_print[4]['InvRef']);
    $invNote4 = htmlspecialchars($arr_print[4]['InvNote']);
    $invAmount4 = htmlspecialchars($arr_print[4]['InvAmt']);
  }
  if (!empty($arr_print[5]['InvDate'])) {
    $invDate5 = htmlspecialchars($arr_print[5]['InvDate']);
    $invRef5 = htmlspecialchars($arr_print[5]['InvRef']);
    $invNote5 = htmlspecialchars($arr_print[5]['InvNote']);
    $invAmount5 = htmlspecialchars($arr_print[5]['InvAmt']);
  }
  if (!empty($arr_print[6]['InvDate'])) {
    $invDate6 = htmlspecialchars($arr_print[6]['InvDate']);
    $invRef6 = htmlspecialchars($arr_print[6]['InvRef']);
    $invNote6 = htmlspecialchars($arr_print[6]['InvNote']);
    $invAmount6 = htmlspecialchars($arr_print[6]['InvAmt']);
  }
  if (!empty($arr_print[7]['InvDate'])) {
    $invDate7 = htmlspecialchars($arr_print[7]['InvDate']);
    $invRef7 = htmlspecialchars($arr_print[7]['InvRef']);
    $invNote7 = htmlspecialchars($arr_print[7]['InvNote']);
    $invAmount7 = htmlspecialchars($arr_print[7]['InvAmt']);
  }
  if (!empty($arr_print[8]['InvDate'])) {
    $invDate8 = htmlspecialchars($arr_print[8]['InvDate']);
    $invRef8 = htmlspecialchars($arr_print[8]['InvRef']);
    $invNote8 = htmlspecialchars($arr_print[8]['InvNote']);
    $invAmount8 = htmlspecialchars($arr_print[8]['InvAmt']);
  }
  if (!empty($arr_print[9]['InvDate'])) {
    $invDate9 = htmlspecialchars($arr_print[9]['InvDate']);
    $invRef9 = htmlspecialchars($arr_print[9]['InvRef']);
    $invNote9 = htmlspecialchars($arr_print[9]['InvNote']);
    $invAmount9 = htmlspecialchars($arr_print[9]['InvAmt']);
  }

  $claimDate = htmlspecialchars($arr_print['ClaimDate']);
  $claimSignature = htmlspecialchars($arr_print['ClaimSig']);
  $claimTitle = htmlspecialchars($arr_print['ClaimTitle']);

  // get total amount
  $total = htmlspecialchars(array_sum(array_column($arr_print, "InvAmt")));
  $total = '$' . number_format($total, 2, '.', ',');

  // unset $arr_print to flatten and get fund subtotals
  unset($arr_print['VendName']);
  unset($arr_print['VendAddress']);
  unset($arr_print['VendCity']);
  unset($arr_print['VendState']);
  unset($arr_print['VendZip']);
  unset($arr_print['VendCode']);
  unset($arr_print['ClaimDate']);
  unset($arr_print['ClaimSig']);
  unset($arr_print['ClaimTitle']);

  $subKey0 = '';
  $subValue0 = '';
  $subNumber0 = '';
  $subBank0 = '';
  $subKey1 = '';
  $subValue1 = '';
  $subNumber1 = '';
  $subBank1 = '';
  $subKey2 = '';
  $subValue2 = '';
  $subNumber2 = '';
  $subBank2 = '';
  $subKey3 = '';
  $subValue3 = '';
  $subNumber3 = '';
  $subBank3 = '';
  $subKey4 = '';
  $subValue4 = '';
  $subNumber4 = '';
  $subBank4 = '';
  $subKey5 = '';
  $subValue5 = '';
  $subNumber5 = '';
  $subBank5 = '';
  $subKey6 = '';
  $subValue6 = '';
  $subNumber6 = '';
  $subBank6 = '';
  $subKey7 = '';
  $subValue7 = '';
  $subNumber7 = '';
  $subBank7 = '';
  $subKey8 = '';
  $subValue8 = '';
  $subNumber8 = '';
  $subBank8 = '';
  $subKey9 = '';
  $subValue9 = '';
  $subNumber9 = '';
  $subBank9 = '';

  $appropriation = '';

  $sub = [];
  $sub = array_reduce(
    $arr_print,
    function ($result, $item) {
      if (!isset($result[$item['InvFundLabel']])) $result[$item['InvFundLabel']] = 0;
      $result[$item['InvFundLabel']] += $item['InvAmt'];
      return $result;
    },
    array()
  );

  $subKey = array_keys($sub);
  $subValue = array_values($sub);

  if (count($subKey) == 1) {
    $appropriation = "".htmlspecialchars($arr_print[0]['InvFundBank'])." ".$subKey[0]."";
  } else {
    $appropriation = 'See Table Below';
    $subKey0 = htmlspecialchars(substr($subKey[0], 10, 15));
    $subValue0 = htmlspecialchars(number_format($subValue[0], 2, '.', ','));
    $subNumber0 = htmlspecialchars(substr($subKey[0], 0, 9));
    $subBank0 = htmlspecialchars($arr_print[0]['InvFundBank']);
  }

  if (isset($subKey[1])) {
    $subKey1 = htmlspecialchars(substr($subKey[1], 10, 15));
    $subValue1 = htmlspecialchars(number_format($subValue[1], 2, '.', ','));
    $subNumber1 = htmlspecialchars(substr($subKey[1], 0, 9));
    $subBank1 = htmlspecialchars($arr_print[1]['InvFundBank']);
  }

  if (isset($subKey[2])) {
    $subKey2 = htmlspecialchars(substr($subKey[2], 10, 15));
    $subValue2 = htmlspecialchars(number_format($subValue[2], 2, '.', ','));
    $subNumber2 = htmlspecialchars(substr($subKey[2], 0, 9));
    $subBank2 = htmlspecialchars($arr_print[2]['InvFundBank']);
  }

  if (isset($subKey[3])) {
    $subKey3 = htmlspecialchars(substr($subKey[3], 10, 15));
    $subValue3 = htmlspecialchars(number_format($subValue[3], 2, '.', ','));
    $subNumber3 = htmlspecialchars(substr($subKey[3], 0, 9));
    $subBank3 = htmlspecialchars($arr_print[3]['InvFundBank']);
  }

  if (isset($subKey[4])) {
    $subKey4 = htmlspecialchars(substr($subKey[4], 10, 15));
    $subValue4 = htmlspecialchars(number_format($subValue[4], 2, '.', ','));
    $subNumber4 = htmlspecialchars(substr($subKey[4], 0, 9));
    $subBank4 = htmlspecialchars($arr_print[4]['InvFundBank']);
  }

  if (isset($subKey[5])) {
    $subKey5 = htmlspecialchars(substr($subKey[5], 10, 15));
    $subValue5 = htmlspecialchars(number_format($subValue[5], 2, '.', ','));
    $subNumber5 = htmlspecialchars(substr($subKey[5], 0, 9));
    $subBank5 = htmlspecialchars($arr_print[5]['InvFundBank']);
  }

  if (isset($subKey[6])) {
    $subKey6 = htmlspecialchars(substr($subKey[6], 10, 15));
    $subValue6 = htmlspecialchars(number_format($subValue[6], 2, '.', ','));
    $subNumber6 = htmlspecialchars(substr($subKey[6], 0, 9));
    $subBank6 = htmlspecialchars($arr_print[6]['InvFundBank']);
  }

  if (isset($subKey[7])) {
    $subKey7 = htmlspecialchars(substr($subKey[7], 10, 15));
    $subValue7 = htmlspecialchars(number_format($subValue[7], 2, '.', ','));
    $subNumber7 = htmlspecialchars(substr($subKey[7], 0, 9));
    $subBank7 = htmlspecialchars($arr_print[7]['InvFundBank']);
  }

  if (isset($subKey[8])) {
    $subKey8 = htmlspecialchars(substr($subKey[8], 10, 15));
    $subValue8 = htmlspecialchars(number_format($subValue[8], 2, '.', ','));
    $subNumber8 = htmlspecialchars(substr($subKey[8], 0, 9));
    $subBank8 = htmlspecialchars($arr_print[8]['InvFundBank']);
  }

  if (isset($subKey[9])) {
    $subKey9 = htmlspecialchars(substr($subKey[9], 10, 15));
    $subValue9 = htmlspecialchars(number_format($subValue[9], 2, '.', ','));
    $subNumber9 = htmlspecialchars(substr($subKey[9], 0, 9));
    $subBank9 = htmlspecialchars($arr_print[9]['InvFundBank']);
  }


  // Print individual pdf
  include('inc_PDF_Content_1.php');
  include('inc_PDF_Content_2.php');

  // Create single pdf file 
  $pdfFileName = "CLAIM-" . $vendName . ".pdf";
  $pdfPathFile = __DIR__ . "/tmp/" . $pdfFileName;
  echo "pdfFilePath = $pdfPathFile<br><br>";
  $pdf->Output($pdfPathFile, "F");
  $logger->info("PDF claim created at = " . $pdfPathFile);

  //ob_end_clean();
  $attachmentpath = $pdfPathFile;
  //$logger->info("Base64 encoded PDF file = " . $attachment);

  // get invID numbers included in this claim
  $invIDNumbersInClaim = array_column($arr_print, 'InvID');
  $logger->info("Invoice ID numbers paid in this claim = " . json_encode($invIDNumbersInClaim));

  //get level1name from fcn_getDocuments for each invID in claim and post claim PDF to that invoice then mark as PAID
  foreach ($invIDNumbersInClaim as $invoiceID) {

    // Call fcn_getDocument function and return level1name
    $getLevel1Name = fcn_getDocument($logger, $apiKey, $apiUrl, "supplier_invoice", "$invoiceID");
    $ref = $getLevel1Name[0]['level1name'];

    // POST pdf file to dolibarr api
    fcn_postPDFDocument($logger, $apiKey, $apiUrl, $pdfFileName, "supplier_invoice", $ref, $attachmentpath);
    $logger->info("Claim " . $pdfPathFile . " added to " . $ref);

    //  Mark supplier invoice as PAID
    if ($_GET['paid'] == 1) {
      fcn_postSupplierPayment($logger, $apiKey, $apiUrl, $invoiceID);
      $logger->info("Supplier invoice ID " . $invoiceID . " marked as PAID = ");
    } else if ($_GET['paid'] == 0) {
      $logger->info("Supplier invoice ID " . $invoiceID . " NOT marked as PAID = ");
    }
  }
}
