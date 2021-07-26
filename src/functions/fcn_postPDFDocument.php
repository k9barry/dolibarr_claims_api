<?php

// POST file to dolibarr api
function fcn_postPDFDocument($logger, $apiKey, $apiUrl, $pdfFileName, $modulepart, $ref, $attachment)
{

    /*     $remove = 'Content-Type: application/pdf;  ';
    $b=strpos($attachment, $remove);
var_dump($b);
exit();
    if (strpos($attachment, $remove) !== false) {
        list($encode, $base64string) = explode($remove, $attachment);
        $attachment = "$base64string";
        var_dump($attachment);
    } */

    $filesize = mb_strlen($attachment);
    $logger->info("Base64 encoded PDF filesize = " . mb_strlen($attachment));

    if ($filesize < 90000) {
        $apiEndpoint = "documents/upload";
        $parameters = [
            "filename" => "$pdfFileName",
            "modulepart" => "$modulepart",
            "ref" => "$ref",
            "subdir" => "",
            "filecontent" => "chunk_split(file_get_contents($attachment))",
            "fileencoding" => "base64",
            "overwriteifexists" => "1",
            "createdirifnotexists" => "1"
        ];
    } else {
        $apiEndpoint = "documents/upload";
        $parameters = [
            "filename" => "$pdfFileName",
            "modulepart" => "$modulepart",
            "ref" => "$ref",
            "subdir" => "",
            "filecontent" => "file_get_contents($attachment)",
            "fileencoding" => "base64",
            "overwriteifexists" => "1",
            "createdirifnotexists" => "1"
        ];
    }


    $arrPostDocument = callAPI("POST", $apiKey, $apiUrl . "/" . $apiEndpoint, json_encode($parameters));
    $arrPostDocument = json_decode($arrPostDocument, true);

    if (isset($arrPostDocument["error"]) && $arrPostDocument["error"]["code"] >= "300") {
        echo "<br>Error in fcn_postPDFDocument - " . json_encode($arrPostDocument["error"]["message"]);
        $logger->critical(json_encode($arrPostDocument));
        exit;
    }
    return $arrPostDocument;
}
