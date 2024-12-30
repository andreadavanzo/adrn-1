<?php

$phptest_usage_start = memory_get_usage(false);
$phptest_allocated_start = memory_get_usage(true);
$phptest_peak_start = memory_get_peak_usage(false);
$phptest_real_peak_start = memory_get_peak_usage(true);
$phptest_microtime_start = microtime(true);

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();

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
