<?php
global $info;

if (!defined('MGR_DIR')) define('MGR_DIR', $info['coreFolder']);
if (!defined('MODX_BASE_PATH')) define('MODX_BASE_PATH', $info['modxFolder'] . DIRECTORY_SEPARATOR);
if (!defined('MODX_MANAGER_PATH')) define('MODX_MANAGER_PATH', MODX_BASE_PATH . MGR_DIR . DIRECTORY_SEPARATOR);
if (!defined('MODX_API_MODE')) define('MODX_API_MODE', true);
if (!defined('MAGPIE_DIR')) {define('MAGPIE_DIR', MODX_MANAGER_PATH . "media". DIRECTORY_SEPARATOR ."rss" . DIRECTORY_SEPARATOR);}

$incPath = str_replace("\\","/", MODX_MANAGER_PATH);
set_include_path(get_include_path() . PATH_SEPARATOR . $incPath);

$incPath = str_replace("\\","/", MODX_MANAGER_PATH."includes/"); // Mod by Raymond
set_include_path(get_include_path() . PATH_SEPARATOR . $incPath);

/**
 * @TODO некоторые файлы содержат тупо функции. Их тоже можно включить в Helper
 *  - includes/categories.inc.php
 *  - includes/datefunctions.inc.php
 *  - includes/extenders/deprecated.functions.inc.php
 *  - includes/protect.inc.php
 *  - includes/quotes_stripper.inc.php
 *  - media/rss/rss_fetch.inc
 *  - includes/secure_mgr_documents.inc.php
 *  - includes/secure_web_documents.inc.php
 *  - includes/tmplvars.commands.inc.php
 *  - includes/tmplvars.format.inc.php
 *  - includes/tmplvars.inc.php
 *  - includes/media/rss/rss_utils.inc
 *  - includes/media/rss/fetch_rss.inc
 */
return array(
		'classMap' => array(
			'synccache'=>'processors/cache_sync.class.processor.php',
			'DocumentParser'=>'includes/document.parser.class.inc.php',
			'SystemEvent'=>'includes/document.parser.class.inc.php',
            'DBAPI'=>'includes/extenders/dbapi.mysql.class.inc.php',
            'EXPORT_SITE' => 'includes/extenders/export.class.inc.php',
            'MakeTable' => 'includes/extenders/maketable.class.php',
            'ManagerAPI' => 'includes/extenders/manager.api.class.inc.php',
            'MODxMailer' => 'includes/extenders/modxmailer.class.inc.php',
            'PHPMailer' => 'includes/controls/phpmailer/class.phpmailer.php',
            'PHPCOMPAT' => 'includes/extenders/phpcompat.class.inc.php',
            'ContextMenu' => 'includes/controls/contextmenu.php',
            'DataGrid' => 'includes/controls/datagrid.class.php',
            'DataSetPager' => 'includes/controls/datasetpager.class.php',
            'rc4crypt' => 'includes/crypt.class.inc.php',
            'errorHandler' => 'includes/error.class.inc.php',
            'logHandler' => 'includes/log.class.inc.php',
            'Paging' => 'includes/paginate.inc.php',
            /**
             * @TODO нужен настроеный движок
             * 'VeriWord' => 'includes/veriword.php',
             */
            'Snoopy' => 'media/rss/extlib/Snoopy.class.inc',
            'RSSCache' => 'media/rss/rss_cache.inc',
            'MagpieRSS' => 'media/rss/rss_parse.inc',
		),

	);