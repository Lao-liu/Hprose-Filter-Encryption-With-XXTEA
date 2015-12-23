<?php
require_once 'hprose-php/src/Hprose.php';
require_once 'hprose-filter-init.php';

// 只加密传递参数

// $client = new HproseHttpClient('http://192.168.1.200/hprose-filter-server.php');

// $myName = 'Laoliu';

// var_dump($myName, "\n");

// $args = encrypt($myName);

// var_dump("Encrypt:",$args, "\n");

// $result = $client->testFilter($args);

// var_dump("Result:",$result, "\n");

// $de = decrypt($result, "\n");

// var_dump("Decrypt:",$de);


// 通过 Filter 加密全部请求

$client = new HproseHttpClient('http://192.168.1.200/hprose-filter-server.php');

$client->addFilter(new clientCryptFilter);

$myName = 'Laoliu';

var_dump($myName, "\n");

$result = $client->testFilter($myName);

var_dump("Result:",$result, "\n");