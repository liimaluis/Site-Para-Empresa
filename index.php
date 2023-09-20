<?php

session_start();
ob_start();

require __DIR__ . '/vendor/autoload.php';

define('CURL107', true);

$url = new Core\ConfigController();
$url->loadPage();
