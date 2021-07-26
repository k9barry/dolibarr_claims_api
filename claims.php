<?php
error_reporting(E_ALL & ~E_NOTICE);

// Initial entry point for program
include 'src/include.php';

// Get POST variable from index.php
if (isset($_GET['paid']) && $_GET['paid'] == 1) {
    $logger->info("Mark invoices as PAID _GET['paid'] variable = " . $_GET['paid']);
} else {
    $logger->info("Leave invoices as UN-PAID _GET['paid'] variable = " . $_GET['paid']);
}

// GET supplier invoices sorted by fk_soc with status of unpaid
$arrAllUnpaidInvoices = fcn_getAllUnpaidInvoices($logger, $apiKey, $apiUrl);
//$logger->info("arrAllUnpaidInvoices = " . json_encode($arrAllUnpaidInvoices));

// Count of unpaid supplier invoices by supplier id
$arrSupplierInvoiceCount = fcn_asscArrayCountValue($arrAllUnpaidInvoices, 'socid');
$logger->info("arrSupplierInvoiceCount = " . json_encode($arrSupplierInvoiceCount));

unset($arrAllUnpaidInvoices);  // unset $arrAllUnpaidInvoices to clean stuff up
$logger->info("Unset arrAllUnpaidInvoices to clean stuff up");

// Returns an array of vendor Id's with unpaid supplier invoices
$arrVendorIdSupplierUnpaid = array_keys($arrSupplierInvoiceCount);
$logger->info("arrVendorIdSupplierUnpaid = vendor Id's with unpaid supplier invoices " . json_encode($arrVendorIdSupplierUnpaid));

foreach ($arrVendorIdSupplierUnpaid as $vendorID) {
    // Step 1 - create PDF array of information
    $arr_print = fcn_createPDFArray($logger, $apiKey, $apiUrl, $vendorID, $signature, $title);

    // Step 2 - using the array from above print the individual pdf  
    // save a copy to dolibarr and tmp folderand set the supplier invoice to PAID status
    fcn_createPDF($logger, $apiKey, $apiUrl, $arr_print);

    // Step 3 - unset $arr_print to clean stuff up
    unset($arr_print);
    $logger->info("Unset arr_print to clean things up");
}

// Step 4 - Merge all pdf's in tmp folder into one big browser view to print then unlink
fcn_mergeTmpFolderPDFs($logger);
$logger->info("claims.pdf merge file sent to browser");

// Step 6 - unset $arrVendorIdSupplierUnpaid to clean stuff up
unset($arrVendorIdSupplierUnpaid);
$logger->info("Unset array arrVendorIdSupplierUnpaid to clean things up");
$logger->info('+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
