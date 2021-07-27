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

$pdf->Ln(0);  //Space down from top
$linedown2 = "48";
$pdf->Line(18, ($linedown2+0), 85, ($linedown2+0),); //Vendor name
$pdf->Line(18, ($linedown2+4.5), 85, ($linedown2+4.5),); //Vendor address
$pdf->Line(18, ($linedown2+9), 85, ($linedown2+9),); //City State Zip
$pdf->Line(18, ($linedown2+18), 85, ($linedown2+18),); //Total
$pdf->Line(20, ($linedown2+32), 85, ($linedown2+32),); //Appropriation

$tbl = <<<EOD
<table align="center" width="31%" border="0" cellpadding="0" cellspacing="" nobr="true">
<tr>
  <td align="center">
    <h2>$vendCode</h2>
  </td>
</tr>
<tr>
  <td></td>
</tr>
<tr>
  <td align="center"><small>VOUCHER NO. _________________    WARRANT NO. ________________</small></td>
</tr>
<tr>
  <td></td>
</tr>
<tr>
  <td align="center"><h3>$vendName</h3></td>
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
  <td align="center"><h6>ON ACCOUNT OF APPROPRIATION</h6></td>
</tr>
<tr>
  <td align="center"><h6>FOR</h6></td>
</tr>
<tr>
  <td align="center">$appropriation</td>
</tr>
</table>
EOD;

$pdf->SetFontSize(10);
$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetFontSize(8);
$pdf->Write(0, "     COST DISTRIBUTION LEDGER CLASSIFICATION", '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, "   IF CLAIM PAID MOTOR VEHICLE HIGHWAY FUND", '', 0, 'L', true, 0, false, false, 0);

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
  <td align="center"><font size="8">$subNumber0</font></td>
  <td align="center"><font size="8">$subBank0 $subKey0</font></td>
  <td align="right"><font size="8">$subValue0</font></td>
</tr>
<tr>
  <td align="center"><font size="8">$subNumber1</font></td>
  <td align="center"><font size="8">$subBank1 $subKey1</font></td>
  <td align="right"><font size="8">$subValue1</font></td>
</tr>
<tr>
  <td align="center"><font size="8">$subNumber2</font></td>
  <td align="center"><font size="8">$subBank2 $subKey2</font></td>
  <td align="right"><font size="8">$subValue2</font></td>
</tr>
<tr>
  <td align="center"><font size="8">$subNumber3</font></td>
  <td align="center"><font size="8">$subBank3 $subKey3</font></td>
  <td align="right"><font size="8">$subValue3</font></td>
</tr>
<tr>
  <td align="center"><font size="8">$subNumber4</font></td>
  <td align="center"><font size="8">$subBank4 $subKey4</font></td>
  <td align="right"><font size="8">$subValue4</font></td>
</tr>
<tr>
  <td align="center"><font size="8">$subNumber5</font></td>
  <td align="center"><font size="8">$subBank5 $subKey5</font></td>
  <td align="right"><font size="8">$subValue5</font></td>
</tr>
<tr>
  <td align="center"><font size="8">$subNumber6</font></td>
  <td align="center"><font size="8">$subBank6 $subKey6</font></td>
  <td align="right"><font size="8">$subValue6</font></td>
</tr>
<tr>
  <td align="center"><font size="8">$subNumber7</font></td>
  <td align="center"><font size="8">$subBank7 $subKey7</font></td>
  <td align="right"><font size="8">$subValue7</font></td>
</tr>
<tr>
  <td align="center"><font size="8">$subNumber8</font></td>
  <td align="center"><font size="8">$subBank8 $subKey8</font></td>
  <td align="right"><font size="8">$subValue8</font></td>
</tr>
<tr>
  <td align="center"><font size="8">$subNumber9</font></td>
  <td align="center"><font size="8">$subBank9 $subKey9</font></td>
  <td align="right"><font size="8">$subValue9</font></td>
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
$pdf->SetFontSize(10);
$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->writeHTMLCell(70, 0, 100, 40, 'ALLOWED __________________, ________', 0, 0, 0, 0, 'C');
$pdf->writeHTMLCell(70, 0, 100, 50, 'IN THE SUM OF $_____________________', 0, 0, 0, 0, 'C');
$pdf->writeHTMLCell(70, 0, 100, 60, '____________________________________', 0, 0, 0, 0, 'C');
$pdf->writeHTMLCell(70, 0, 100, 70, '____________________________________', 0, 0, 0, 0, 'C');
$pdf->writeHTMLCell(70, 0, 100, 80, 'Board of County Commissioners', 0, 0, 0, 0, 'C');

/* END PDF================================================================================ */