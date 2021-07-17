<?php

function fcn_createPDF($logger, $apiKey, $apiUrl, $arr_print)
{

  $logger->info("Step 2 - create PDf");
  /* 
  // Full array print of $arr_print
  echo "<br><br>Full array - arr_print<br>";
  print_r($arr_print);
  echo "<br><br>";
 */
  //Define variables
  $vendName = '';
  $vendAddress = '';
  $vendCity = '';
  $vendState = '';
  $vendZip = '';
  $vendCode = '';

  $invID0 = '';
  $invDate0 = '';
  $invRef0 = '';
  $invNote0 = '';
  $invAmount0 = '';
  $invFundID0 = '';
  $invFundNumber0 = '';
  $invFundName0 = '';

  $invID1 = '';
  $invDate1 = '';
  $invRef1 = '';
  $invNote1 = '';
  $invAmount1 = '';
  $invFundID1 = '';
  $invFundNumber1 = '';
  $invFundName1 = '';

  $invID2 = '';
  $invDate2 = '';
  $invRef2 = '';
  $invNote2 = '';
  $invAmount2 = '';
  $invFundID2 = '';
  $invFundNumber2 = '';
  $invFundName2 = '';

  $invID3 = '';
  $invDate3 = '';
  $invRef3 = '';
  $invNote3 = '';
  $invAmount3 = '';
  $invFundID3 = '';
  $invFundNumber3 = '';
  $invFundName3 = '';

  $invID4 = '';
  $invDate4 = '';
  $invRef4 = '';
  $invNote4 = '';
  $invAmount4 = '';
  $invFundID4 = '';
  $invFundNumber4 = '';
  $invFundName4 = '';

  $invID5 = '';
  $invDate5 = '';
  $invRef5 = '';
  $invNote5 = '';
  $invAmount5 = '';
  $invFundID5 = '';
  $invFundNumber5 = '';
  $invFundName5 = '';

  $invID6 = '';
  $invDate6 = '';
  $invRef6 = '';
  $invNote6 = '';
  $invAmount6 = '';
  $invFundID6 = '';
  $invFundNumber6 = '';
  $invFundName6 = '';

  $invID7 = '';
  $invDate7 = '';
  $invRef7 = '';
  $invNote7 = '';
  $invAmount7 = '';
  $invFundID7 = '';
  $invFundNumber7 = '';
  $invFundName7 = '';

  $invID8 = '';
  $invDate8 = '';
  $invRef8 = '';
  $invNote8 = '';
  $invAmount8 = '';
  $invFundID8 = '';
  $invFundNumber8 = '';
  $invFundName8 = '';

  $invID9 = '';
  $invDate9 = '';
  $invRef9 = '';
  $invNote9 = '';
  $invAmount9 = '';
  $invFundID9 = '';
  $invFundNumber9 = '';
  $invFundName9 = '';

  $claimDate = '';
  $claimSignature = '';
  $claimTitle = '';
  $total = '0';
  $appropriation = '';
  $invFundNumber99 = '';
  $invFundName99 = '';
  $invAmount99 = '';

  //Fill variables
  $vendName = $arr_print['VendName'];
  $vendAddress = $arr_print['VendAddress'];
  $vendCity = $arr_print['VendCity'];
  $vendState = $arr_print['VendState'];
  $vendZip = $arr_print['VendZip'];
  $vendCode = $arr_print['VendCode'];

  /* 
  echo "<br><br>";
  print_r($arr_print[0]);
  echo "<br><br>";
 */

  $invID0 = $arr_print[0]['InvID'];
  $invDate0 = $arr_print[0]['InvDate'];
  $invRef0 = $arr_print[0]['InvRef'];
  $invNote0 = $arr_print[0]['InvNote'];
  $invAmount0 = $arr_print[0]['InvAmt'];
  $invFundID0 = $arr_print[0]['InvFundID'];
  $invFundNumber0 = $arr_print[0]['Bank'][0]['ref'];
  $invFundName0 = $arr_print[0]['Bank'][0]['label'];

  $appropriation = $arr_print[0]['Bank'][0]['label'];

  echo "<br>";
  echo "$invID0";
  echo "<br>";
  echo "$invDate0";
  echo "<br>";
  echo "$invRef0";
  echo "<br>";
  echo "$invNote0";
  echo "<br>";
  echo "$invAmount0";
  echo "<br>";
  echo "$invFundID0";
  echo "<br>";
  echo "$invFundNumber0";
  echo "<br>";
  echo "$invFundName0";
  echo "<br>";

  if (!empty($arr_print[1]['InvID'])) {
    $invID1 = $arr_print[1]['InvID'];
    $invDate1 = $arr_print[1]['InvDate'];
    $invRef1 = $arr_print[1]['InvRef'];
    $invNote1 = $arr_print[1]['InvNote'];
    $invAmount1 = $arr_print[1]['InvAmt'];
    $invFundID1 = $arr_print[1]['InvFundID'];
    $invFundNumber1 = $arr_print[1]['Bank'][0]['ref'];
    $invFundName1 = $arr_print[1]['Bank'][0]['label'];

    $appropriation = 'See Table Below';
    $invFundNumber99 = $arr_print[0]['Bank'][0]['ref'];
    $invFundName99 = $arr_print[0]['Bank'][0]['label'];
    $invAmount99 = $arr_print[0]['InvAmt'];
  }
  if (!empty($arr_print[2]['InvID'])) {
    $invID2 = $arr_print[2]['InvID'];
    $invDate2 = $arr_print[2]['InvDate'];
    $invRef2 = $arr_print[2]['InvRef'];
    $invNote2 = $arr_print[2]['InvNote'];
    $invAmount2 = $arr_print[2]['InvAmt'];
    $invFundID2 = $arr_print[2]['InvFundID'];
    $invFundNumber2 = $arr_print[2]['Bank'][0]['ref'];
    $invFundName2 = $arr_print[2]['Bank'][0]['label'];
  }
  if (!empty($arr_print[3]['InvID'])) {
    $invID3 = $arr_print[3]['InvID'];
    $invDate3 = $arr_print[3]['InvDate'];
    $invRef3 = $arr_print[3]['InvRef'];
    $invNote3 = $arr_print[3]['InvNote'];
    $invAmount3 = $arr_print[3]['InvAmt'];
    $invFundID3 = $arr_print[3]['InvFundID'];
    $invFundNumber3 = $arr_print[3]['Bank'][0]['ref'];
    $invFundName3 = $arr_print[3]['Bank'][0]['label'];
  }
  if (!empty($arr_print[4]['InvID'])) {
    $invID4 = $arr_print[4]['InvID'];
    $invDate4 = $arr_print[4]['InvDate'];
    $invRef4 = $arr_print[4]['InvRef'];
    $invNote4 = $arr_print[4]['InvNote'];
    $invAmount4 = $arr_print[4]['InvAmt'];
    $invFundID4 = $arr_print[4]['InvFundID'];
    $invFundNumber4 = $arr_print[4]['Bank'][0]['ref'];
    $invFundName4 = $arr_print[4]['Bank'][0]['label'];
  }
  if (!empty($arr_print[5]['InvID'])) {
    $invID5 = $arr_print[5]['InvID'];
    $invDate5 = $arr_print[5]['InvDate'];
    $invRef5 = $arr_print[5]['InvRef'];
    $invNote5 = $arr_print[5]['InvNote'];
    $invAmount5 = $arr_print[5]['InvAmt'];
    $invFundID5 = $arr_print[5]['InvFundID'];
    $invFundNumber5 = $arr_print[5]['Bank'][0]['ref'];
    $invFundName5 = $arr_print[5]['Bank'][0]['label'];
  }
  if (!empty($arr_print[6]['InvID'])) {
    $invID6 = $arr_print[6]['InvID'];
    $invDate6 = $arr_print[6]['InvDate'];
    $invRef6 = $arr_print[6]['InvRef'];
    $invNote6 = $arr_print[6]['InvNote'];
    $invAmount6 = $arr_print[6]['InvAmt'];
    $invFundID6 = $arr_print[6]['InvFundID'];
    $invFundNumber6 = $arr_print[6]['Bank'][0]['ref'];
    $invFundName6 = $arr_print[6]['Bank'][0]['label'];
  }
  if (!empty($arr_print[7]['InvID'])) {
    $invID7 = $arr_print[7]['InvID'];
    $invDate7 = $arr_print[7]['InvDate'];
    $invRef7 = $arr_print[7]['InvRef'];
    $invNote7 = $arr_print[7]['InvNote'];
    $invAmount7 = $arr_print[7]['InvAmt'];
    $invFundID7 = $arr_print[7]['InvFundID'];
    $invFundNumber7 = $arr_print[7]['Bank'][0]['ref'];
    $invFundName7 = $arr_print[7]['Bank'][0]['label'];
  }
  if (!empty($arr_print[8]['InvID'])) {
    $invID8 = $arr_print[8]['InvID'];
    $invDate8 = $arr_print[8]['InvDate'];
    $invRef8 = $arr_print[8]['InvRef'];
    $invNote8 = $arr_print[8]['InvNote'];
    $invAmount8 = $arr_print[8]['InvAmt'];
    $invFundID8 = $arr_print[8]['InvFundID'];
    $invFundNumber8 = $arr_print[8]['Bank'][0]['ref'];
    $invFundName8 = $arr_print[8]['Bank'][0]['label'];
  }
  if (!empty($arr_print[9]['InvID'])) {
    $invID9 = $arr_print[9]['InvID'];
    $invDate9 = $arr_print[9]['InvDate'];
    $invRef9 = $arr_print[9]['InvRef'];
    $invNote9 = $arr_print[9]['InvNote'];
    $invAmount9 = $arr_print[9]['InvAmt'];
    $invFundID9 = $arr_print[9]['InvFundID'];
    $invFundNumber9 = $arr_print[9]['Bank'][0]['ref'];
    $invFundName9 = $arr_print[9]['Bank'][0]['label'];
  }

  $claimDate = $arr_print['ClaimDate'];
  $claimSignature = $arr_print['ClaimSig'];
  $claimTitle = $arr_print['ClaimTitle'];

  // get total amount
  $total = array_sum(array_column($arr_print, "InvAmt"));
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

  /* 
  // print $arr_print after values are unset
  echo "Array after variables are unset to flatten<br>";
  print_r($arr_print);
  echo "<br><br>";
 */


  /*  
$sum = [];
$sum = array_reduce($arr_print, function($result, $item) {
  if (!isset($result[$item['InvFundID']])) $result[$item['InvFundID']] = 0;
  $result[$item['InvFundID']] += $item['InvAmt'];
  return $result;
}, array());
echo "<br><br>";
var_dump($sum);
echo "<br><br>";
 */

  /* 
  // Get the subtoal amount and bank fund numbers
  $subTotal = array();
  $subTotal =  (array_reduce(
    $arr_print,
    function ($carry, $row) {
      $carry[$row['InvFundID']] = ($carry[$row['InvFundID']] ?? 0) + $row['InvAmt'];
      return $carry;
    }
  ));
  echo "<br><br>";
  echo "Subtotal of invoice amounts and fund ID<br>";
  print_r($subTotal); //Array ( [4] => 2683.79 [1] => 1159.88 [3] => 175.2 )
  echo "<br><br>";
 */
  /* 
   $subTotal = array();
  $subTotal = array_reduce($arr_print, function ($c, $i) {
    $c[$i['InvFundID']] = ($c[$i['InvFundID']] ?? 0) + $i['InvAmt'];
    return $c;
  }, array());
  print_r($subTotal); 
 */

  // Print individual pdf
  include('inc_PDF_Content.php');

  // Create single pdf file 
  $pdfFileName = "CLAIM-" . $vendName . ".pdf";
  $pdfPathFile = __DIR__ . "\\tmp\\" . $pdfFileName;
  echo "pdfFilePath = $pdfPathFile<br><br>";
  $pdf->Output($pdfPathFile, "F");

  $attachment = $pdf->Output($pdfFileName, "E");
  $logger->info("Step 2 - PDF claim created at = " . $pdfPathFile);

  // get invID numbers included in this claim
  $invIDNumbersInClaim = array_column($arr_print, 'InvID');

  $logger->info("Step 2 - Invoice ID numbers paid in this claim = " . json_encode($invIDNumbersInClaim));

  //get level1name from fcn_getDocuments for each invID in claim and post claim PDF to that invoice then mark as PAID
  foreach ($invIDNumbersInClaim as $invoiceID) {

    // Call fcn_getDocument function and return level1name
    $getLevel1Name = fcn_getDocument($logger, $apiKey, $apiUrl, "supplier_invoice", "$invoiceID");
    $ref = $getLevel1Name[0]['level1name'];

    // POST pdf file to dolibarr api
    fcn_postPDFDocument($logger, $apiKey, $apiUrl, $pdfFileName, "supplier_invoice", $ref, $attachment);
    $logger->info("Step 2 - claim PDF added to supplier invoice = " . $ref);

    //  Mark supplier invoice as PAID
    fcn_postSupplierPayment($logger, $apiKey, $apiUrl, $invoiceID);
    $logger->info("Step 2 - supplier invoice marked as PAID = " . $ref);
  }
}
