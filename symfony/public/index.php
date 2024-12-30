<?php

use App\Kernel;

$phptest_usage_start = memory_get_usage(false);
$phptest_allocated_start = memory_get_usage(true);
$phptest_peak_start = memory_get_peak_usage(false);
$phptest_real_peak_start = memory_get_peak_usage(true);
$phptest_microtime_start = microtime(true);

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

$kernel = new \App\Kernel('dev', true);

// Create the HTTP request and pass it to the Symfony Kernel for handling
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

// Let the Symfony Kernel handle the request and send the response
$response = $kernel->handle($request);

$phptest_usage_end = memory_get_usage(false);
$phptest_allocated_end = memory_get_usage(true);
$phptest_peak_end = memory_get_peak_usage(false);
$phptest_real_peak_end = memory_get_peak_usage(true);
$phptest_microtime_end = microtime(true);

$response->send(false);

// Terminate the kernel after the response is sent
$kernel->terminate($request, $response);

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