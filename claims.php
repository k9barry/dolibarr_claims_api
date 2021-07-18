<?php
error_reporting(E_ALL & ~E_NOTICE);

// Initial entry point for program
include 'src/include.php';

// GET supplier invoices sorted by fk_soc with status of unpaid
$arrAllUnpaidInvoices = fcn_getAllUnpaidInvoices($logger, $apiKey, $apiUrl);
$logger->info("arrAllUnpaidInvoices = ".json_encode($arrAllUnpaidInvoices));

// Count of unpaid supplier invoices by supplier id
$arrSupplierInvoiceId = fcn_asscArrayCountValue($arrAllUnpaidInvoices, 'socid');
$logger->info("arrSupplierInvoiceId = ".json_encode($arrSupplierInvoiceId));

unset($arrAllUnpaidInvoices);  // unset $arrAllUnpaidInvoices to clean stuff up
$logger->info("Unset arrAllUnpaidInvoices to clean stuff up");

$supplierInvoiceId = array_keys($arrSupplierInvoiceId);
foreach ($supplierInvoiceId as $vendorID) {
    // Step 1 - create PDF array of information
    $arr_print = fcn_createPDFArray($logger, $apiKey, $apiUrl, $vendorID, $signature, $title);

    // Step 2 - using the array from above print the individual pdf  
    // save a copy to dolibarr and tmp folderand set the supplier invoice to PAID status
    fcn_createPDF($logger, $apiKey, $apiUrl, $arr_print);

    // Step 3 - unset $arr_print to clean stuff up
    unset($arr_print);
    $logger->info("Unset arr_print to clean things up");
    
    // Step 4 - Merge all pdf's in tmp folder into one big browser view to print then unlink
    fcn_mergeTmpFolderPDFs($logger);

}
// Step 6 - unset $supplierInvoiceId to clean stuff up
unset($supplierInvoiceId);
$logger->info("Unset array supplierInvoiceId to clean things up");
