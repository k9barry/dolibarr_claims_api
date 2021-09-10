<?php

// Composer autoload
if (!file_exists("./vendor/autoload.php")) {
    echo "Please install the vendor file by running 'composer install'";
    $logger->info("./vendor/autoload.php missing - use composer install to correct");
    exit();
}
include_once "./vendor/autoload.php";

// Load Monolog and Initialize
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Monolog\Processor\IntrospectionProcessor;

$logger = new Logger('claim_logger'); // Create the logger
$logger->pushHandler(new RotatingFileHandler("./src/log/claim.log", 3, Logger::DEBUG)); // Adds RotatingFileHandler
$logger->pushProcessor(new IntrospectionProcessor());
$logger->info('+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
$logger->info('Claim logger is now ready'); // You can now use your logger

// Copy conifig.txt to ./src/.env if exists
if (file_exists("/var/www/html/dolibarr/documents/ecm/Claim Configuration/config.txt")) {
    $logger->info("config.txt exists and is being copied to ./src/.env");
    if (file_exists("./src/.env")) {
        rename('./src/.env', './src/.env-bak');
    }
    copy('/var/www/html/dolibarr/documents/ecm/Claim Configuration/config.txt', '/var/www/html/dolibarr/htdocs/custom/dolibarr_claims_api/src/.env');
}

// Load phpdotenv variables if exists
if (!file_exists("./src/.env")) {
    echo "Please rename the .env-dev file to .env and change the necessary settings";
    $logger->info("phpDotenv library failed please rename the .env-dev file to .env and change the necessary settings");
    exit();
}

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(['apiKey', 'apiUrl']);
$logger->info("phpDotenv library loaded");

// Include all needed files
foreach (glob("./src/functions/fcn_*.php") as $filename) {
    include_once $filename;
    $logger->info("include_once $filename");
}

// Unlink files in tmp folder
foreach (glob("./src/functions/tmp/*.pdf") as $filename) {
    unlink($filename);
    $logger->info("Delete PDF " . $filename);
}

// set variables from .env
$apiKey = $_ENV['apiKey'];
$logger->info("apiKey = $apiKey");
$apiUrl = $_ENV['apiUrl'];
$logger->info("apiUrl = $apiUrl");
$signature = $_ENV['signature'];
$logger->info("signature file path = $signature");
$title = $_ENV['title'];
$logger->info("title = $title");
