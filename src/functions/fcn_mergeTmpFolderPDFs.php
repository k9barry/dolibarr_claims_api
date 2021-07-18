<?php
use Jmleroux\PDFMerger\PDFMerger;

// Merge all pdf's in tmp folder into one big browser view to print then unlink

function fcn_mergeTmpFolderPDFs($logger) 
{
    $PDFMergerPath = "./vendor/jmleroux/pdf-merger/src/PDFMerger.php";
    if (!file_exists($PDFMergerPath)) {
        echo "file does not exist";
    }
    require_once($PDFMergerPath);
    $pdf = new PDFMerger('fpdf');
    
    //include all needed files
    foreach (glob("./src/functions/tmp/*.pdf") as $filename) {
        $pdf->addPDF("$filename", "1", "P");
        $pdf->addPDF("$filename", "2", "L");
        echo "<br>$filename<br>";
    }

    //$pdf->addPDF('samplepdfs/one.pdf', '1, 3, 4');
    //$pdf->addPDF('samplepdfs/two.pdf', '1-2');
    //$pdf->addPDF('samplepdfs/three.pdf', 'all');

    //You can optionally specify a different orientation for each PDF
    //$pdf->addPDF('samplepdfs/one.pdf', '1, 3, 4', 'L');
    //$pdf->addPDF('samplepdfs/two.pdf', '1-2', 'P');

    ob_end_clean();
    $pdf->merge("browser", "claims.pdf", "P");
    $logger->info("PDF's merged into one file on browser");

}