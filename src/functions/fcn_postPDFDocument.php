<?php

// POST file to dolibarr api
function fcn_postPDFDocument($logger, $apiKey, $apiUrl, $pdfFileName, $modulepart, $ref, $attachment)
{
    $apiEndpoint = "documents/upload";
    $parameters = [
        "filename" => "$pdfFileName",
        "modulepart" => "$modulepart",
        "ref" => "$ref",
        "subdir" => "",
        "filecontent" => "chunk_split(base64_encode(file_get_contents($attachment)))",
        "fileencoding" => "base64",
        "overwriteifexists" => "1",
        "createdirifnotexists" => "1"
    ];
    $arrPostDocument = callAPI("POST", $apiKey, $apiUrl . "/" . $apiEndpoint, json_encode($parameters));
    $arrPostDocument = json_decode($arrPostDocument, true);

    if (isset($arrPostDocument["error"]) && $arrPostDocument["error"]["code"] >= "300") {
        echo "<br><br>Error in fcn_postPDFDocument<br><br>";
        $logger->critical(json_encode($arrPostDocument));
        exit;
    }
    return $arrPostDocument;
}
