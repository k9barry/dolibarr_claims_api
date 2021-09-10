<?php

// POST file to dolibarr api
function fcn_postPDFDocument($logger, $apiKey, $apiUrl, $pdfFileName, $modulepart, $ref, $attachmentpath)
{

    $logger->info("PDF file = " . $attachmentpath);
    $logger->info("PDF filesize = " . filesize($attachmentpath));
    $data = file_get_contents($attachmentpath);
    $data = base64_encode($data);
    $apiEndpoint = "documents/upload";
    $parameters = [
        "filename" => "$pdfFileName",
        "modulepart" => "$modulepart",
        "ref" => "$ref",
        "subdir" => "",
        "ref" => "$ref",
        "subdir" => "",
        "filecontent" => "$data",
        "fileencoding" => "base64",
        "overwriteifexists" => "1",
        "createdirifnotexists" => "1"
    ];

    $arrPostDocument = callAPI("POST", $apiKey, $apiUrl . "/" . $apiEndpoint, json_encode($parameters));
    $arrPostDocument = json_decode($arrPostDocument, true);

    if (isset($arrPostDocument["error"]) && $arrPostDocument["error"]["code"] >= "300") {
        echo "<br>Error in fcn_postPDFDocument - " . json_encode($arrPostDocument["error"]["message"]);
        $logger->critical(json_encode($arrPostDocument));
        exit;
    }
    return $arrPostDocument;
}
