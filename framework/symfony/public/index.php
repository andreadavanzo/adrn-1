<?php

declare(strict_types=1);

ini_set('display_errors', 'true');
ini_set('track_errors', 'true');
ini_set('display_startup_errors', 'true');
error_reporting(E_ALL);


require_once '../../../cesp/cesp_log.php';
cesp_log('start');

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

$kernel = new \App\Kernel('dev', true);

// Create the HTTP request and pass it to the Symfony Kernel for handling
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

// Let the Symfony Kernel handle the request and send the response
$response = $kernel->handle($request);

//phptest_log('end');

$response->send(false);

// Terminate the kernel after the response is sent
$kernel->terminate($request, $response);

cesp_log('end');
echo '<pre>';
cesp_log('print');
echo '</pre>';