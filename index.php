<?php
error_reporting(E_ALL & ~E_NOTICE);

// Initial entry point for program
include 'src/include.php';

// GET supplier invoices sorted by fk_soc with status of unpaid
$unpaid = fcn_getAllUnpaidInvoices($logger, $apiKey, $apiUrl);

$table = "<table border='0.5' cellpadding='4' cellspacing='0.5' nobr='true'>";

for ($i = 0; $i < count($unpaid); $i++) {
    $name = $unpaid[$i]['socnom'];
    $date =  date('m/d/Y', $unpaid[$i]['datec']);
    $invoice = substr($unpaid[$i]['ref'], 0, 25);
    $note = substr($unpaid[$i]['note_public'], 0, 38);
    $amount = substr($unpaid[$i]['total_ttc'], 0, -6);
    $acct = $unpaid[$i]['fk_account'];


    $table .= "<tr>";
    $table .= "<td align='center' width='15%'>" . $name . "</td>";
    $table .= "<td align='center' width='25%'>" . $date . "</td>";
    $table .= "<td align='center' width='45%'>" . $invoice . "<br>";
    $table .= "<td align='center' width='15%'>" . $note . "</td>";
    $table .= "<td align='center' width='15%'>" . $amount . "</td>";
    $table .= "<td align='center' width='15%'>" . $acct . "</td>";
    $table .= "</tr>";
}

$table .= "</table>";
print $table;
