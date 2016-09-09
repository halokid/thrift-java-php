#!/usr/bin/env php
<?php

namespace helloworld\php;

error_reporting(E_ALL);

//echo __DIR__; exit();

require_once '/opt/thrift_php/lib/Thrift/ClassLoader/ThriftClassLoader.php';

///**
use Thrift\ClassLoader\ThriftClassLoader;

//$GEN_DIR = realpath(dirname(__FILE__).'/..').'/gen-php';
$GEN_DIR = '/opt/thrift_php/mycode/gen-php';

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', '/opt/thrift_php/lib');
//$loader->registerNamespace('Thrift', __DIR__ . '/../../lib/php/lib');
//$loader->registerDefinition('shared', $GEN_DIR);
$loader->registerDefinition('helloworld', $GEN_DIR);
$loader->register();



use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;
//**/


//$socket = new TSocket('localhost', 8090); 
$socket = new TSocket('192.168.17.1', 8090); 
$transport = new TBufferedTransport($socket, 1024, 1024);
$protocol = new TBinaryProtocol($transport);
$client = new \helloworld\HelloWorldServiceClient($protocol);
print_r($client);

$transport->open();
$str = $client->sayHello("jimmyxx");
echo $str;

//$log = $client->getStruct(1);
//print "Log: $log->value\n";

$transport->close();

















