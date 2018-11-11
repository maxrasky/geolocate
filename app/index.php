<?php
/**
 * @file index.php
 * @author maxpoltoratsky
 */

require 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$app = new app\Application();
$app->run();
