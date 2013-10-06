<?php
global $info, $IDEHelper;

if (!defined('MODX_BASE_PATH')) define('MODX_BASE_PATH', $info['modxFolder'] . DIRECTORY_SEPARATOR);
if (!defined('MODX_BASE_URL')) define('MODX_BASE_URL', '/');

if (!defined('MODX_CORE_PATH')) define('MODX_CORE_PATH', MODX_BASE_PATH . 'core' . DIRECTORY_SEPARATOR);
if (!defined('MODX_CONFIG_KEY')) define('MODX_CONFIG_KEY', 'config');

if (!defined('MODX_PROCESSORS_PATH')) define('MODX_PROCESSORS_PATH', MODX_CORE_PATH . 'model/modx/processors/' . DIRECTORY_SEPARATOR );

if (!defined('MODX_CONNECTORS_PATH')) define('MODX_CONNECTORS_PATH', MODX_BASE_PATH . 'connectors' . DIRECTORY_SEPARATOR);
if (!defined('MODX_CONNECTORS_URL')) define('MODX_CONNECTORS_URL', '/connectors/');

if (!defined('MODX_MANAGER_PATH')) define('MODX_MANAGER_PATH', MODX_BASE_PATH . 'manager' . DIRECTORY_SEPARATOR);
if (!defined('MODX_MANAGER_URL')) define('MODX_MANAGER_URL', '/manager/');

if (!defined('MODX_API_MODE')) define('MODX_API_MODE', true);

if (!defined('MODX_URL_SCHEME'))  define('MODX_URL_SCHEME', 'http://');
if (!defined('MODX_HTTP_HOST')) define('MODX_HTTP_HOST', 'agel-nash.ru');
if (!defined('MODX_SITE_URL')) define('MODX_SITE_URL', MODX_URL_SCHEME . MODX_HTTP_HOST . MODX_BASE_URL);

if (!defined('MODX_ASSETS_PATH')) define('MODX_ASSETS_PATH', MODX_BASE_PATH . 'assets');
if (!defined('MODX_ASSETS_URL')) define('MODX_ASSETS_URL', '/assets/');

if (!defined('MODX_LOG_LEVEL_FATAL')) define('MODX_LOG_LEVEL_FATAL', 0);
if (!defined('MODX_LOG_LEVEL_ERROR')) define('MODX_LOG_LEVEL_ERROR', 1);
if (!defined('MODX_LOG_LEVEL_WARN')) define('MODX_LOG_LEVEL_WARN', 2);
if (!defined('MODX_LOG_LEVEL_INFO')) define('MODX_LOG_LEVEL_INFO', 3);
if (!defined('MODX_LOG_LEVEL_DEBUG')) define('MODX_LOG_LEVEL_DEBUG', 4);

if (!defined('MODX_CACHE_DISABLED')) define('MODX_CACHE_DISABLED', false);

if (!defined('XPDO_PHP_VERSION')) define('XPDO_PHP_VERSION', phpversion());
if (!defined('XPDO_CLI_MODE')) define('XPDO_CLI_MODE', false);
if (!defined('XPDO_CORE_PATH')) define('XPDO_CORE_PATH', MODX_CORE_PATH . 'xpdo' . DIRECTORY_SEPARATOR);


if (!defined('MAGPIE_DIR')) define('MAGPIE_DIR', MODX_CORE_PATH . 'model/modx/xmlrss' . DIRECTORY_SEPARATOR);

$incPath = str_replace("\\","/", MODX_BASE_PATH);
set_include_path(get_include_path() . PATH_SEPARATOR . $incPath);

$incPath = str_replace("\\","/", MODX_CORE_PATH);
set_include_path(get_include_path() . PATH_SEPARATOR . $incPath);

$classMap = array(
    'xPDO' => 'xpdo/xpdo.class.php',
    'xPDOCriteria' => 'xpdo/xpdo.class.php',
    'xPDOIterator' => 'xpdo/xpdo.class.php',
    'xPDOConnection' => 'xpdo/xpdo.class.php',
    'xPDOException' => 'xpdo/xpdo.class.php',

    'xPDOValidator' => 'xpdo/validation/xpdovalidator.class.php',
    'xPDOValidationRule' => 'xpdo/validation/xpdovalidator.class.php',
    'xPDOMinLengthValidationRule' => 'xpdo/validation/xpdovalidator.class.php',
    'xPDOMaxLengthValidationRule' => 'xpdo/validation/xpdovalidator.class.php',
    'xPDOMinValueValidationRule' => 'xpdo/validation/xpdovalidator.class.php',
    'xPDOMaxValueValidationRule' => 'xpdo/validation/xpdovalidator.class.php',
    'xPDOObjectExistsValidationRule' => 'xpdo/validation/xpdovalidator.class.php',
    'xPDOForeignKeyConstraint' => 'xpdo/validation/xpdovalidator.class.php',

    'xPDOCacheManager' => 'xpdo/cache/xpdocachemanager.class.php',
    'xPDOCache' => 'xpdo/cache/xpdocachemanager.class.php',
    'xPDOFileCache'  => 'xpdo/cache/xpdocachemanager.class.php',
    'xPDOAPCCache' => 'xpdo/cache/xpdoapccache.class.php',
    'xPDOWinCache' => 'xpdo/cache/xpdowincache.class.php',
    'xPDOMemCache' => 'xpdo/cache/xpdomemcache.class.php',
    'xPDOMemCached' => 'xpdo/cache/xpdomemcached.class.php',

    'xPDOZip' => 'xpdo/compression/xpdozip.class.php',
    //'PclZip' => 'xpdo/compression/pclzip.lib.php',

    //'Services_JSON' => 'xpdo/json/JSON.php',

    'xPDOVehicle' => 'xpdo/transport/xpdovehicle.class.php',
    'xPDOFileVehicle' => 'xpdo/transport/xpdofilevehicle.class.php',
    'xPDOObjectVehicle' => 'xpdo/transport/xpdoobjectvehicle.class.php',
    'xPDOScriptVehicle' => 'xpdo/transport/xpdoscriptvehicle.class.php',
    'xPDOTransport' => 'xpdo/transport/xpdotransport.class.php',
    'xPDOTransportVehicle' => 'xpdo/transport/xpdotransportvehicle.class.php',

    'xPDORevisionControl' => 'xpdo/revision/xpdorevisioncontrol.class.php',

    'xPDODriver' => 'xpdo/om/xpdodriver.class.php',
    'xPDOGenerator' => 'xpdo/om/xpdogenerator.class.php',
    'xPDOManager' => 'xpdo/om/xpdomanager.class.php',
    'xPDOObject' => 'xpdo/om/xpdoobject.class.php',
    'xPDOSimpleObject' => 'xpdo/om/xpdoobject.class.php',
    'xPDOQuery' => 'xpdo/om/xpdoquery.class.php',
    'xPDOQueryCondition' => 'xpdo/om/xpdoquery.class.php',

    'xPDODriver_mysql' => 'xpdo/om/mysql/xpdodriver.class.php',
    'xPDOGenerator_mysql' => 'xpdo/om/mysql/xpdogenerator.class.php',
    'xPDOManager_mysql' => 'xpdo/om/mysql/xpdomanager.class.php',
    'xPDOObject_mysql' => 'xpdo/om/mysql/xpdoobject.class.php',
    'xPDOSimpleObject_mysql' => 'xpdo/om/mysql/xpdoobject.class.php',
    'xPDOQuery_mysql' => 'xpdo/om/mysql/xpdoquery.class.php',

    'modX' => 'core/model/modx/modx.class.php',
    'modsystemevent' => 'core/model/modx/modx.class.php',
    'modElement' => 'core/model/modx/modelement.class.php',
    'modManagerController' => 'core/model/modx/modmanagercontroller.class.php',

    'Snoopy' => 'core/model/modx/xmlrss/extlib/snoopy.class.php',

    'modAccessPolicyUpdateProcessor' => 'core/model/modx/processors/security/access/policy/update.class.php',


    'modTemplateVarOutputRender' => 'core/model/modx/modtemplatevar.class.php',
    'modTemplateVarInputRender' => 'core/model/modx/modtemplatevar.class.php',
    'modTemplateVarOutputRenderDeprecated' => 'core/model/modx/modtemplatevar.class.php',
    'modTemplateVarInputRenderDeprecated' => 'core/model/modx/modtemplatevar.class.php',
    'modTemplateVarRender' => 'core/model/modx/modtemplatevar.class.php',
    'modTemplateVar' => 'core/model/modx/modtemplatevar.class.php',
    'modAccessibleSimpleObject' => 'core/model/modx/modaccessiblesimpleobject.class.php',
    'modAccessibleObject' => 'core/model/modx/modaccessibleobject.class.php',
    'modResource' => 'core/model/modx/modresource.class.php',
    'modScript' => 'core/model/modx/modscript.class.php',

    'CFRuntime' => 'core/model/aws/sdk.class.php',
    'CFLoader' => 'core/model/aws/sdk.class.php'

);

/**
 * Autoload file
 */
$addClass = array(
    'xpdo/xpdo.class.php',
    'xpdo/validation/xpdovalidator.class.php',
    'xpdo/om/xpdoobject.class.php',
    'xpdo/om/xpdoquery.class.php',
    'core/model/modx/modaccessibleobject.class.php',
    'core/model/modx/modaccessiblesimpleobject.class.php',
    'core/model/modx/modprocessor.class.php',
    'core/model/modx/modelement.class.php',
    'core/model/modx/processors/security/access/policy/update.class.php',
    'core/model/modx/modtemplatevar.class.php',
    'core/model/modx/modResource.class.php',
    'core/model/modx/modscript.class.php',
    'xpdo/cache/xpdocachemanager.class.php',
    'core/model/aws/sdk.class.php'
);
$tmp = $IDEHelper::findFile(MODX_CORE_PATH . 'model/');
foreach($tmp as $item){
    if(preg_match("#/(\w+)\.class\.php$#", $item)){
        $addClass[] = $item;
    }
}

$classMap = array_merge($IDEHelper::getClassList($addClass), $classMap);

$unSentClass = array(
    'rssfetch'
);
foreach($unSentClass as $item){
    unset($classMap[$item]);
}

return array(
    'classMap' => $classMap
);