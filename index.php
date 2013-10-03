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
error_reporting(E_ALL);
ini_set('display_errors','On');

if (!defined('MGR_DIR')) define('MGR_DIR', $config['adminFolder']);
if (!defined('MODX_BASE_PATH')) define('MODX_BASE_PATH', $config['modxFolder'] . DIRECTORY_SEPARATOR);
if (!defined('MODX_MANAGER_PATH')) define('MODX_MANAGER_PATH', MODX_BASE_PATH . MGR_DIR . DIRECTORY_SEPARATOR);
if (!defined('MODX_API_MODE')) define('MODX_API_MODE', true);
if (!defined('MAGPIE_DIR')) {define('MAGPIE_DIR', MODX_MANAGER_PATH . "media". DIRECTORY_SEPARATOR ."rss" . DIRECTORY_SEPARATOR);}

$customPHPdoc = "phpdoc" . DIRECTORY_SEPARATOR . $config['name'] . "_". $config['version'] . ".php";

if(file_exists($customPHPdoc)){
	$customPHPdoc = include_once $customPHPdoc;
}
if(!is_array($customPHPdoc)){
	$customPHPdoc = array();
}
$incPath = str_replace("\\","/", MODX_MANAGER_PATH);
set_include_path(get_include_path() . PATH_SEPARATOR . $incPath);


$incPath = str_replace("\\","/", MODX_MANAGER_PATH."includes/"); // Mod by Raymond
set_include_path(get_include_path() . PATH_SEPARATOR . $incPath);

$out = new GenerateHelper($config['classMap'], $customPHPdoc);
echo $out->run();

