<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

require_once 'vendor/autoload.php';
require_once 'GenerateHelper.class.php';

$IDEHelper = new GenerateHelper();

if(file_exists("config.php")){
    $info = include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
}else{
    $info = null;
}
if(!is_array($info) || !isset($info['name'], $info['version'])) die("MAKE CONFIG file");

if(!isset($info['modxFolder']) || !is_dir($info['modxFolder'])){
    $info['modxFolder'] = dirname(__FILE__). DIRECTORY_SEPARATOR . 'modx';
}

if(!isset($info['coreFolder']) || !is_dir($info['modxFolder'] . DIRECTORY_SEPARATOR . $info['coreFolder'])){
    $info['coreFolder'] = 'manager';
}

$config = dirname(__FILE__) . DIRECTORY_SEPARATOR . "classmap" . DIRECTORY_SEPARATOR . $info['name'] . "_" . $info['version'] . ".php";
if(file_exists($config)){
    $config = include_once $config;
}
if(!is_array($config)){
    $config = array();
}

if(!isset($config['classMap']) || !is_array($config['classMap'])){
	die('Empty classMap');
}
$IDEHelper->setFiles($config['classMap']);

$customPHPdoc = dirname(__FILE__) . DIRECTORY_SEPARATOR . "phpdoc" . DIRECTORY_SEPARATOR . $info['name'] . "_" . $info['version'] . ".php";
if(file_exists($customPHPdoc)){
	$customPHPdoc = include_once $customPHPdoc;
}
if(!is_array($customPHPdoc)){
	$customPHPdoc = array();
}
$IDEHelper->setMap($customPHPdoc);

$template = dirname(__FILE__) . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . $info['name'] . "_" . $info['version'] . ".txt";
$template = (file_exists($template)) ? file_get_contents($template) : '';
$IDEHelper->setTemplate($template);

echo $IDEHelper->run(array($info['name'], $info['version']));

