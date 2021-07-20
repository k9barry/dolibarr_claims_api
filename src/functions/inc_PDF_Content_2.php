<?php 

// Second page--------------------------------------------------------- //

$pdf->AddPage($orientation = 'L', $format = 'LETTER');

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT, true);

$pdf->SetAutoPageBreak(TRUE, 0);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->Ln(9);  //Space down from top
$linedown2 = "48";
$pdf->Line(18, ($linedown2+0), 85, ($linedown2+0),); //Vendor name
$pdf->Line(18, ($linedown2+3.5), 85, ($linedown2+3.5),); //Vendor address
$pdf->Line(18, ($linedown2+7), 85, ($linedown2+7),); //City State Zip
$pdf->Line(18, ($linedown2+14), 85, ($linedown2+14),); //Total
$pdf->Line(18, ($linedown2+28), 85, ($linedown2+28),); //Appropriation

$tbl = <<<EOD
<table align="center" width="31%" border="0" cellpadding="0" cellspacing="" nobr="true">
<tr>
  <td align="center">
    <h4>$vendCode</h4>
  </td>
</tr>
<tr>
  <td></td>
</tr>
<tr>
  <td align="center"><small>VOUCHER NO. ______________________      WARRANT NO. ___________________</small></td>
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

$pdf->SetFontSize(8);
$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Write(0, "      COST DISTRIBUTION LEDGER CLASSIFICATION", '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, "    IF CLAIM PAID MOTOR VEHICLE HIGHWAY FUND", '', 0, 'L', true, 0, false, false, 0);

$tbl = <<<EOD
<table align="left" width="29%" border="0.25" cellpadding="1" cellspacing="0.25" nobr="true">
<tr>
  <td>
  </td>
</tr>
<tr>
  <td align="center" width="22%"><b>Acct No.</b></td>
  <td align="center" width="55%"><b>Account Title</b></td>
  <td align="center" width="23%"><b>Amount</b></td>
</tr>
<tr>
  <td align="center">$subNumber0</td>
  <td align="center">$subKey0</td>
  <td align="right">$subValue0</td>
</tr>
<tr>
  <td align="center">$subNumber1</td>
  <td align="center">$subKey1</td>
  <td align="right">$subValue1</td>
</tr>
<tr>
  <td align="center">$subNumber2</td>
  <td align="center">$subKey2</td>
  <td align="right">$subValue2</td>
</tr>
<tr>
  <td align="center">$subNumber3</td>
  <td align="center">$subKey3</td>
  <td align="right">$subValue3</td>
</tr>
<tr>
  <td align="center">$subNumber4</td>
  <td align="center">$subKey4</td>
  <td align="right">$subValue4</td>
</tr>
<tr>
  <td align="center">$subNumber5</td>
  <td align="center">$subKey5</td>
  <td align="right">$subValue5</td>
</tr>
<tr>
  <td align="center">$subNumber6</td>
  <td align="center">$subKey6</td>
  <td align="right">$subValue6</td>
</tr>
<tr>
  <td align="center">$subNumber7</td>
  <td align="center">$subKey7</td>
  <td align="right">$subValue7</td>
</tr>
<tr>
  <td align="center">$subNumber8</td>
  <td align="center">$subKey8</td>
  <td align="right">$subValue8</td>
</tr>
<tr>
  <td align="center">$subNumber9</td>
  <td align="center">$subKey9</td>
  <td align="right">$subValue9</td>
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
$pdf->SetFontSize(7.5);
$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->writeHTMLCell(70, 0, 100, 40, 'ALLOWED _______________________, ________', 0, 0, 0, 0, 'C');
$pdf->writeHTMLCell(70, 0, 100, 50, 'IN THE SUM OF $__________________________', 0, 0, 0, 0, 'C');
$pdf->writeHTMLCell(70, 0, 100, 60, '_________________________________________', 0, 0, 0, 0, 'C');
$pdf->writeHTMLCell(70, 0, 100, 70, '_________________________________________', 0, 0, 0, 0, 'C');
$pdf->writeHTMLCell(70, 0, 100, 80, 'Board of County Commissioners', 0, 0, 0, 0, 'C');

/* END PDF================================================================================ */