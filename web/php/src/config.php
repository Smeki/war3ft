<?php
// Visit war3ft.net for more information
// Configuration using environment variables with fallback values

// Database configuration
$host = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USERNAME') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';
$dbname = getenv('DB_NAME') ?: 'amx';
$server_ip_port = getenv('SERVER_IP_PORT') ?: '127.0.0.1:27015';

// Set error reporting based on environment
$error_reporting = getenv('ERROR_REPORTING') ?: '1';
if ($error_reporting === '1') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Set timezone from environment or default to UTC
$timezone = getenv('TIMEZONE') ?: 'UTC';
date_default_timezone_set($timezone);

// Set character encoding
ini_set('default_charset', 'UTF-8');
?>
