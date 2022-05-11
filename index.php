<?php
error_reporting(E_ALL & ~E_NOTICE);

// This file located at /var/www/html/dolibarr/htdocs/custom/dolibarr_claims_api

// Security check
require '../../main.inc.php';

if ($user->socid) {
        $socid = $user->socid;
}

$allowed = 0;
if (!empty($user->rights->accounting->chartofaccount)) {
        $allowed = 1; // Dictionary with list of banks accounting account allowed to manager of chart account
}
if (!$allowed) {
        $result = restrictedArea($user, 'banque');
}

// Initial entry point for program
include 'src/include.php';

// GET supplier invoices sorted by fk_soc with status of unpaid
$unpaid = fcn_getAllUnpaidInvoices($logger, $apiKey, $apiUrl);

$table = "<!DOCTYPE html>";
$table .= "<html>";
$table .= "<head>";
$table .= "<style>";

$table .= "table { width: 100%; }";
$table .= "table, th, td { border: 1px solid black; }";
$table .= "th { background-color: yellow; }";
$table .= "td:empty {  background-color: red; }";

$table .= "</style>";
$table .= "</head>";
$table .= "<body>";
$table .= "<h1 align='center'>Claims</h1>";
$table .= "<table width='100%' border='1.5' cellpadding='4' cellspacing='0.5' nobr='true'>";
$table .= "<tr>";
$table .= "<th align='center' width='15%'>Vendor Name</th>";
$table .= "<th align='center' width='5%'>Date</th>";
$table .= "<th align='center' width='15%'>Invoice #</th>";
$table .= "<th align='center' width='25%'>Notes</th>";
$table .= "<th align='center' width='10%'>Amount</th>";
$table .= "<th align='center' width='30%'>Account</th>";
$table .= "</tr>";


//Set alert to '0' or '1'
$alert = 0;

for ($i = 0; $i < count($unpaid); $i++) {
    $name = $unpaid[$i]['socnom'];
    $date =  date('m/d/Y', $unpaid[$i]['date']);
    $invoice = substr($unpaid[$i]['ref_supplier'], 0, 25);
    if ($invoice == "") { $alert = 1; }
    $note = substr($unpaid[$i]['note_public'], 0, 38);
    $amount = substr($unpaid[$i]['total_ttc'], 0, -6);
    if ($amount == 0) { $alert = 1; }
    $id = $unpaid[$i]['fk_account'];
    if (empty($id)) { $alert = 1; }
    $bank = fcn_getBankAccountbyID($logger, $apiKey, $apiUrl, $id);
    $acct = $bank['bank'] . "" . $bank['label'];

    $table .= "<tr>";
    $table .= "<td align='center'>" . $name . "</td>";
    $table .= "<td align='center'>" . $date . "</td>";
    $table .= "<td align='center'>" . $invoice . "</td>";
    $table .= "<td align='center'>" . $note . "</td>";
    $table .= "<td align='center'>$ " . $amount . "</td>";
    $table .= "<td align='center'>" . $acct . "</td>";
    $table .= "</tr>";
}

$table .= "</table>";

//Button to exclude all invoices from being paid - POST into claims.php
$table .= "<br><br>";
$table .= "<h3 align='center'>##########################################################################################################################</h1>";

if ($alert === 0) {
    $table .= "<form align='center' action='./claims.php' method='get'>Do you want the above listed claims marked as PAID?  ";
    $table .= "<button name='paid' type='submit' value=1>MARK INVOICES PAID</button>  <button name='paid' type='submit' value=0>VIEW CLAIMS</button>";
    $table .= "</form>";
} else {
    $table .= "<form align='center' action='./claims.php' method='get'>Please correct the fields highlighted in red! You can NOT mark these invoices as PAID!  ";
    $table .= "<button name='paid' type='submit' value=0>VIEW CLAIMS</button>";
    $table .= "</form>";
}
$table.="<li><iframe src='http://10.200.0.252/compta/bank/list.php?optioncss=print' width='100%' height='500' scrolling='yes' style='overflow:hidden; margin-top:-4px; margin-left:-4px; border:none;'></iframe></>
$table.="</body>";
$table.="</html>";
print $table;
