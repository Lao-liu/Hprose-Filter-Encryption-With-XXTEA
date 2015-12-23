<?php

require_once 'hprose-php/src/Hprose.php';
require_once 'hprose-filter-init.php';

function onBeforeInvoke($name, &$args, $byref, $context){
    foreach ($args as $k => $arg) {
        $args[$k] = decrypt($arg);
    }
}

function onAfterInvoke($name, &$args, $byref, &$result, $context){
	$result = encrypt($result);
}

function testFilter($name){
	return 'Args: ' . $name;
}

$server = new HproseHttpServer();
$server->addFilter(new serverFilter);
// 只加密参数启用
// $server->onBeforeInvoke = 'onBeforeInvoke';
// $server->onAfterInvoke  = 'onAfterInvoke';
$server->addFunction('testFilter');
$server->start();