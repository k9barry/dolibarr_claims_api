<?php 

// Second page--------------------------------------------------------- //

  $pdf->AddPage($orientation = 'L', $format = 'LETTER');

  // set margins
  $pdf->SetMargins(5, 10, PDF_MARGIN_RIGHT);

  $pdf->Ln(15);

  $pdf->Line(12, 51, 80, 51,); //Vendor name
  $pdf->Line(12, 55, 80, 55,); //Vendor address
  $pdf->Line(12, 59, 80, 59,); //City State Zip
  $pdf->Line(12, 67, 80, 67,); //Total
  $pdf->Line(12, 82.5, 80, 82.5,); //Appropriation

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