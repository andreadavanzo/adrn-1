<?php

$phptest_usage_start = memory_get_usage(false);
$phptest_allocated_start = memory_get_usage(true);
$phptest_peak_start = memory_get_peak_usage(false);
$phptest_real_peak_start = memory_get_peak_usage(true);
$phptest_microtime_start = microtime(true);

/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */

$minPhpVersion = '8.1'; // If you update this, don't forget to update `spark`.
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;

    exit(1);
}

/*
 *---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 *---------------------------------------------------------------
 */

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// LOAD OUR PATHS CONFIG FILE
// This is the line that might need to be changed, depending on your folder structure.
require FCPATH . '../app/Config/Paths.php';
// ^^^ Change this line if you move your application folder

$paths = new Config\Paths();

// LOAD THE FRAMEWORK BOOTSTRAP FILE
require $paths->systemDirectory . '/Boot.php';

CodeIgniter\Boot::bootWeb($paths);



$phptest_usage_end = memory_get_usage(false);
$phptest_allocated_end = memory_get_usage(true);
$phptest_peak_end = memory_get_peak_usage(false);
$phptest_real_peak_end = memory_get_peak_usage(true);
$phptest_microtime_end = microtime(true);

echo "<pre>\n";
echo sprintf("phptest_usage_start: %d\n", $phptest_usage_start);
echo sprintf("phptest_allocated_start: %d\n", $phptest_allocated_start);
echo sprintf("phptest_peak_start: %d\n", $phptest_peak_start);
echo sprintf("phptest_real_peak_start: %d\n", $phptest_real_peak_start);

echo sprintf("phptest_usage_end: %d\n", $phptest_usage_end);
echo sprintf("phptest_allocated_end: %d\n", $phptest_allocated_end);
echo sprintf("phptest_peak_end: %d\n", $phptest_peak_end);
echo sprintf("phptest_real_peak_end: %d\n", $phptest_real_peak_end);

echo sprintf("phptest_usage: %d\n", $phptest_usage_end - $phptest_usage_start);
echo sprintf("phptest_allocated: %d\n", $phptest_allocated_end - $phptest_allocated_start);
echo sprintf("phptest_microtime: %f\n", $phptest_microtime_end - $phptest_microtime_start);