<?php
require 'vendor/autoload.php';

$API_USER    = 'asd';
$API_KEY     = 'ROV2zGLvXzP0DmFtBmDNLQ';


// Instantiate the Passworks client

$api = new Passworks\Client($API_USER, $API_KEY);
$api->setEndpoint('http://api.passworks.git:3000');

