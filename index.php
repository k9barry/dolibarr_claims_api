<?php
error_reporting(E_ALL & ~E_NOTICE);

// Initial entry point for program
include 'src/include.php';

// GET supplier invoices sorted by fk_soc with status of unpaid
$unpaid = fcn_getAllUnpaidInvoices($logger, $apiKey, $apiUrl);

$table = "<!DOCTYPE html>";
$table .= "<html>";
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

for ($i = 0; $i < count($unpaid); $i++) {
    $name = $unpaid[$i]['socnom'];
    $date =  date('m/d/Y', $unpaid[$i]['datec']);
    $invoice = substr($unpaid[$i]['ref_supplier'], 0, 25);
    $note = substr($unpaid[$i]['note_public'], 0, 38);
    $amount = substr($unpaid[$i]['total_ttc'], 0, -6);
    $id = $unpaid[$i]['fk_account'];
    $bank = fcn_getBankAccountbyID($logger, $apiKey, $apiUrl, $id);
    $acct = $bank['bank'] . " " . $bank['label'];


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

$table .= "<form align='center' action='./claims.php' method='get'>Do you want the above listed claims marked as PAID?  ";
$table .= "<button name='paid' type='submit' value=1>YES</button>  <button name='paid' type='submit' value=0>NO</button>";
$table .= "</form>";

$table.="</html>";
$table.="</body>";
print $table;