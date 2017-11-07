<?php
require __DIR__ . '/../_tools/init.php';

// Initialize the client
$client = new \SmileCoreTest\RestClient();
$client->setDebug(true);
$client->setMagentoParams($params);
$client->connect();


$client->get('rest/V1/seller/identifier/main');
