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

return array(
		'classMap' => array(
			'synccache'=>'processors/cache_sync.class.processor.php',

            'PHPMailer' => 'includes/controls/class.phpmailer.php',
            'POP3' => 'includes/controls/class.pop3.php',
            'SMTP' => 'includes/controls/class.smtp.php',
            'ClipperMailer' => 'includes/controls/clipper_mailer.class.inc.php',

            'ContextMenu' => 'includes/controls/contextmenu.php',
            'DataGrid' => 'includes/controls/datagrid.class.php',
            'DataSetPager' => 'includes/controls/datasetpager.class.php',

            'SystemEvent'=>'includes/document.parser.class.inc.php',
            'DBAPI_abstract' => 'includes/extenders/dbapi.abstract.class.inc.php',
            'DBAPI' => 'includes/extenders/dbapi.mysqli.class.inc.php',
            'MakeTable' => 'includes/extenders/maketable.class.php',
            'ManagerAPI' => 'includes/extenders/manager.api.class.inc.php',
            'ClipperSqlDumper' => 'includes/clipper_sql_dumper.inc.php',
            'Core' => 'includes/core.class.inc.php',
            'DbInfo' => 'includes/db_info.class.inc.php',
            'DocumentParser'=>'includes/document.parser.class.inc.php',
            'errorHandler' => 'includes/error.class.inc.php',
            'HashHandler' => 'includes/hash.inc.php',
            'logHandler' => 'includes/log.class.inc.php',
            'Paging' => 'includes/paginate.inc.php',
            'TemplateRules' => 'includes/template_rules.class.inc.php',
            'udperms' => 'user_documents_permissions.class.php',

            'Files' => 'media/ImageEditor/Classes/Files.php',
            'Image_Transform_Driver_GD' => 'media/ImageEditor/Classes/GD.php',
            'Image_Transform_Driver_IM' => 'media/ImageEditor/Classes/IM.php',
            'ImageEditor' => 'media/ImageEditor/Classes/ImageEditor.php',
            'ImageManager' => 'media/ImageEditor/Classes/ImageManager.php',
            'Image_Transform_Driver_NetPBM' => 'media/ImageEditor/Classes/NetPBM.php',
            'Thumbnail' => 'media/ImageEditor/Classes/Thumbnail.php',
            'Image_Transform' => 'media/ImageEditor/Classes/Transform.php',
            'Snoopy' => 'media/rss/extlib/Snoopy.class.inc',
            'RSSCache' => 'media/rss/rss_cache.inc',
            'MagpieRSS' => 'media/rss/rss_parse.inc',
		),
);