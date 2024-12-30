<?php

$phptest_usage_start = memory_get_usage(false);
$phptest_allocated_start = memory_get_usage(true);
$phptest_peak_start = memory_get_peak_usage(false);
$phptest_real_peak_start = memory_get_peak_usage(true);
$phptest_microtime_start = microtime(true);

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send(false);

//die('123');
$kernel->terminate($request, $response);

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