<?php

// GET supplier invoices sorted by fk_soc with status of unpaid
$unpaid = fcn_getAllUnpaidInvoices($logger, $apiKey, $apiUrl);

foreach ($unpaid as $key => $index) {
    $name = $key['socnom'];
    echo $name;
    $date = $key['datec'];
    echo $date;
    $invoice = $key['ref'];
    echo $invoice;
    $note = $key['note_public'];
    echo $note;
    $amount = $key['total_ttc'];
    echo $amount;
}

