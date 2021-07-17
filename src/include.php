<?php

// Composer autoload
include_once "./vendor/autoload.php";

// Load Monolog and Initialize
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Monolog\Processor\IntrospectionProcessor;

$logger = new Logger('claim_logger'); // Create the logger
$logger->pushHandler(new RotatingFileHandler("./src/log/claim.log", Logger::DEBUG)); // Adds RotatingFileHandler
$logger->pushProcessor(new IntrospectionProcessor());
$logger->info('Claim logger is now ready'); // You can now use your logger

// Load phpdotenv variables if exists
if (file_exists("./src/.env")) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $dotenv->required(['apiKey', 'apiUrl']);
    $logger->info("phpDotenv library loaded \r\n");
} else {
    echo "Please rename the .env-dev file to .env and change the necessary settings";
    $logger->info("phpDotenv library failed please rename the .env-dev file to .env and change the necessary settings");
    exit();
}

// Include all needed files
foreach (glob("./src/functions/fcn_*.php") as $filename)
{
    include_once $filename;
    $logger->info("include_once $filename \r\n");
}

// Unlink files in tmp folder
foreach (glob("./src/functions/tmp/*.pdf") as $filename) {
    unlink($filename);
    $logger->info("Delete PDF ". $filename);
}

// set variables from .env
$apiKey = $_ENV['apiKey'];
$logger->info("apiKey = $apiKey \r\n");
$apiUrl = $_ENV['apiUrl'];
$logger->info("apiUrl = $apiUrl \r\n");
$signature = $_ENV['signature'];
$logger->info("signature file path = $signature \r\n");
$title = $_ENV['title'];
$logger->info("title = $title \r\n");
