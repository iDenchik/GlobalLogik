<?php
define('ROOT', dirname(__FILE__));
$test = require_once(ROOT.'/vendor/autoload.php');

$container = \Illuminate\Container\Container::getInstance();
$container->bind(\Contracts\PercentCalculateInterface::class, \Services\PercentCalculator::class);
$instance = $container->make(\Controllers\PercentController::class);

echo $instance->getPercent($_GET);
