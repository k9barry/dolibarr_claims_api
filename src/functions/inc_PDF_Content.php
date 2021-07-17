<?php

/* START PDF================================================================================ */
  // Include the main TCPDF library (search for installation path).
  require_once("./vendor/tecnickcom/tcpdf/examples/tcpdf_include.php");

  if (!class_exists('TCPDF')) {
    die('TCPDF could not be loaded. Abort!');
  }
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('Claims Creator');
  $pdf->SetTitle('Account Payable Voucher');

  // remove default header/footer
  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);

  // set default monospaced font
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  // set margins
  $pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);

  // set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

  // set image scale factor
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

  // set some language-dependent strings (optional)
  if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
  }

  // First page--------------------------------------------------------- //
  $pdf->AddPage($orientation = 'P', $format = 'LETTER');

  // set font
  $pdf->SetFont('times', '', 6);
  $pdf->Cell(0, 0, 'Prescribed by the State Board of Accounts', 0, 0, 'L', 0,);
  $pdf->Cell(0, 0, 'County Form No. 17 (Rev. 1996)', 0, 1, 'R', 0,);
  $pdf->SetFont('times', 'B', 12);
  $pdf->Write(0, 'ACCOUNTS PAYABLE VOUCHER', '', 0, 'C', true, 0, false, false, 0);
  $pdf->SetFontSize(10);
  $pdf->Write(0, 'MADISON COUNTY, INDIANA', '', 0, 'C', true, 0, false, false, 0);
  $pdf->SetFont('times', '', 9);
  $txt = 'An invoice or bill to be properly itemized must show: kind of service, where preformed, dates service rendered, by whom, rates per day, number of units, price per unit etc.';
  $pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

  $tbl = <<<EOD
  <table border="0.5" cellpadding="4" cellspacing="0.5" nobr="true">
  <tr>
    <th align="center" colspan="2">
      <h3>Payee</h3>
    </th>
    <th colspan="2"></th>
  </tr>
  <tr>
    <td colspan="2">$vendName</td>
    <td colspan="2">Purchase Order No:</td>
  </tr>
  <tr>
    <td colspan="2">$vendAddress</td>
    <td colspan="2">Terms:</td>
  </tr>
  <tr>
    <td colspan="2">$vendCity, $vendState $vendZip</td>
    <td colspan="2">Due Date:</td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td align="center" width="15%"><b>Invoice Date</b></td>
    <td align="center" width="25%"><b>Invoice Number</b></td>
    <td align="center" width="45%"><b>Description<br>
    (or note attached invoice(s) or bill(s))</b></td>
    <td align="center" width="15%"><b>Amount</b></td>
  </tr>
  <tr>
    <td>$invDate0</td>
    <td>$invRef0</td>
    <td>$invNote0</td>
    <td align="right">$invAmount0</td>
  </tr>
  <tr>
    <td>$invDate1</td>
    <td>$invRef1</td>
    <td>$invNote1</td>
    <td align="right">$invAmount1</td>
  </tr>
  <tr>
    <td>$invDate2</td>
    <td>$invRef2</td>
    <td>$invNote2</td>
    <td align="right">$invAmount2</td>
  </tr>
  <tr>
    <td>$invDate3</td>
    <td>$invRef3</td>
    <td>$invNote3</td>
    <td align="right">$invAmount3</td>
  </tr>
  <tr>
    <td>$invDate4</td>
    <td>$invRef4</td>
    <td>$invNote4</td>
    <td align="right">$invAmount4</td>
  </tr>
  <tr>
    <td>$invDate5</td>
    <td>$invRef5</td>
    <td>$invNote5</td>
    <td align="right">$invAmount5</td>
  </tr>
  <tr>
    <td>$invDate6</td>
    <td>$invRef6</td>
    <td>$invNote6</td>
    <td align="right">$invAmount6</td>
  </tr>
  <tr>
    <td>$invDate7</td>
    <td>$invRef7</td>
    <td>$invNote7</td>
    <td align="right">$invAmount7</td>
  </tr>
  <tr>
    <td>$invDate8</td>
    <td>$invRef8</td>
    <td>$invNote8</td>
    <td align="right">$invAmount8</td>
  </tr>
  <tr>
    <td>$invDate9</td>
    <td>$invRef9</td>
    <td>$invNote9</td>
    <td align="right">$invAmount9</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td align="right">Total</td>
    <td align="right">$total</td>
  </tr>
</table>
EOD;
  $pdf->SetFontSize(8);
  $pdf->writeHTML($tbl, true, false, false, false, '');
  $txt = 'I hereby certify that the attached invoice(s), or bill(s), is (are) true and correct and the materials or services iteimized thereon for which charge is made were ordered and received except ______________________________________________________________________
  ';
  $pdf->SetFontSize(9);
  $pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);
  $tbl = <<<EOD
  <table border="0" cellpadding="0" cellspacing="" nobr="true">
  <tr>
    <td align="center" colspan="3">$claimDate</td>
    <td align="center" colspan="3"></td>
    <td align="center" colspan="3">$claimTitle</td>
  </tr>
  <tr>
    <td align="center" colspan="3"><sup>Date</sup></td>
    <td align="center" colspan="3"><sup>Signature</sup></td>
    <td align="center" colspan="3"><sup>Title</sup></td>
  </tr>
</table>
EOD;

  $pdf->SetFontSize(9);
  $pdf->writeHTML($tbl, true, false, false, false, '');
   $txt = 'I hereby certify that the attached invoice(s), or bill(s), is (are) true and correct and I have audited the same in accordance with IC 5-11-10-12';
  $pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);
  $txt = '
  ____________________,________                              ________________________________________________________________';
  $txt .= '                                            Date                                                                                                             County Auditor';
  $pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);
  $pdf->Line(33, 163, 57, 163,);  //Date line
  $pdf->Line(73, 163, 135, 163,);  //Signature line
  $pdf->Line(148, 163, 190, 163,);  //Title line
  $pdf->SetLineWidth(0.1);
  $pdf->Line(16, 190, 190, 190,);
  $pdf->Image($claimSignature, 70, 154.5, 60, '', '', '', '', false, 300);

// Second page--------------------------------------------------------- //

  $pdf->AddPage($orientation = 'L', $format = 'LETTER');

  // set margins
  $pdf->SetMargins(5, 10, PDF_MARGIN_RIGHT);

  $pdf->Ln(15);

  $pdf->Line(18, 51, 90, 51,); //Vendor name
  $pdf->Line(18, 55, 90, 55,); //Vendor address
  $pdf->Line(18, 59, 90, 59,); //City State Zip
  $pdf->Line(18, 67, 90, 67,); //Total
  $pdf->Line(18, 82.5, 90, 82.5,); //Appropriation

  $tbl = <<<EOD
  <table align="left" width="30%" border="0" cellpadding="0" cellspacing="" nobr="true">
  <tr>
    <td align="center">
      <h4>$vendCode</h4>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td align="left"><small>VOUCHER NO. ______________________ WARRANT NO. ___________________</small></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td align="center">$vendName</td>
  </tr>
  <tr>
    <td align="center">$vendAddress</td>
  </tr>
  <tr>
    <td align="center">$vendCity, $vendState $vendZip</td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td align="center">$total</td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td align="center"><h4>ON ACCOUNT OF APPROPRIATION</h4></td>
  </tr>
  <tr>
    <td align="center"><h4>FOR</h4></td>
  </tr>
  <tr>
    <td align="center">$appropriation</td>
  </tr>
</table>
EOD;
  $pdf->SetFontSize(9);
  $pdf->writeHTML($tbl, true, false, false, false, '');
  $pdf->Write(0, "   COST DISTRIBUTION LEDGER CLASSIFICATION", '', 0, 'L', true, 0, false, false, 0);
  $pdf->Write(0, " IF CLAIM PAID MOTOR VEHICLE HIGHWAY FUND", '', 0, 'L', true, 0, false, false, 0);

  $tbl = <<<EOD
  <table align="left" width="30%" border="0.5" cellpadding="0" cellspacing="0.5" nobr="false">
  <tr>
    <td align="center" width="20%"><b>Acct No.</b></td>
    <td align="center" width="60%"><b>Account Title</b></td>
    <td align="center" width="25%"><b>Amount</b></td>
  </tr>
  <tr>
    <td align="center">$invFundNumber99</td>
    <td align="center">$invFundName99</td>
    <td align="right">$invAmount99</td>
  </tr>
  <tr>
    <td align="center">$invFundNumber1</td>
    <td align="center">$invFundName1</td>
    <td align="right">$invAmount1</td>
  </tr>
  <tr>
    <td align="center">$invFundNumber2</td>
    <td align="center">$invFundName2</td>
    <td align="right">$invAmount2</td>
  </tr>
  <tr>
    <td align="center">$invFundNumber3</td>
    <td align="center">$invFundName3</td>
    <td align="right">$invAmount3</td>
  </tr>
  <tr>
    <td align="center">$invFundNumber4</td>
    <td align="center">$invFundName4</td>
    <td align="right">$invAmount4</td>
  </tr>
  <tr>
    <td align="center">$invFundNumber5</td>
    <td align="center">$invFundName5</td>
    <td align="right">$invAmount5</td>
  </tr>
  <tr>
    <td align="center">$invFundNumber6</td>
    <td align="center">$invFundName6</td>
    <td align="right">$invAmount6</td>
  </tr>
  <tr>
    <td align="center">$invFundNumber7</td>
    <td align="center">$invFundName7</td>
    <td align="right">$invAmount7</td>
  </tr>
  <tr>
    <td align="center">$invFundNumber8</td>
    <td align="center">$invFundName8</td>
    <td align="right">$invAmount8</td>
  </tr>
  <tr>
    <td align="center">$invFundNumber9</td>
    <td align="center">$invFundName9</td>
    <td align="right">$invAmount9</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
EOD;
  $pdf->SetFontSize(8);
  $pdf->writeHTML($tbl, true, false, false, false, '');
  $pdf->writeHTMLCell(70, 0, 100, 40, 'ALLOWED _______________________, ________', 0, 0, 0, 0, 'C');
  $pdf->writeHTMLCell(70, 0, 100, 50, 'IN THE SUM OF $__________________________', 0, 0, 0, 0, 'C');
  $pdf->writeHTMLCell(70, 0, 100, 60, '_________________________________________', 0, 0, 0, 0, 'C');
  $pdf->writeHTMLCell(70, 0, 100, 70, '_________________________________________', 0, 0, 0, 0, 'C');
  $pdf->writeHTMLCell(70, 0, 100, 80, 'Board of County Commissioners', 0, 0, 0, 0, 'C');

  /* END PDF================================================================================ */
  
