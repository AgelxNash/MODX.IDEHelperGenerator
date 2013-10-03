<?php
require_once 'vendor/autoload.php';
require_once 'GenerateHelper.class.php';

$config = include_once "classmap.config.php";
if(!is_array($config)){
	$config = array();
}

if(!isset($config['modxFolder']) || !is_dir($config['modxFolder'])){
	$config['modxFolder'] = dirname(__FILE__). DIRECTORY_SEPARATOR . 'modx';
}

if(!isset($config['adminFolder']) || !is_dir($config['modxFolder'] . DIRECTORY_SEPARATOR . $config['adminFolder'])){
	$config['adminFolder'] = 'manager';
}

if(!isset($config['name']) || !is_scalar($config['name'])){
	$config['name'] = 'evolution';
}

if(!isset($config['classMap']) || !is_array($config['classMap'])){
	$config['classMap'] = array(
		'DocumentParser'=>'includes/document.parser.class.inc.php',
	);
}

$customPHPdoc = "phpdoc" . DIRECTORY_SEPARATOR . $config['name'] . "_". $config['version'] . ".php";
if(!file_exists($customPHPdoc)){
	$customPHPdoc = include_once $customPHPdoc;
}
if(!is_array($customPHPdoc)){
	$customPHPdoc = array();
}

$out = new GenerateHelper($config['modxFolder'], $config['adminFolder'], $config['classMap'], $customPHPdoc);
$out->run();

