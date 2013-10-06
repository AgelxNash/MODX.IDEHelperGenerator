<?php die("Access denied!");

if (!defined('MGR_DIR')) define('MGR_DIR', 'manager');
if (!defined('MODX_BASE_PATH')) define('MODX_BASE_PATH', 'base_path');
if (!defined('MODX_BASE_URL')) define('MODX_BASE_URL', 'base_url');
if (!defined('MODX_SITE_URL')) define('MODX_SITE_URL', 'site_url');
if (!defined('MODX_MANAGER_PATH')) define('MODX_MANAGER_PATH', 'base_path/manager/');
if (!defined('MODX_MANAGER_URL')) define('MODX_MANAGER_URL', 'site_url/manager/');
if (!defined('MODX_API_MODE')) define('MODX_API_MODE', false);
if (!defined('IN_PARSER_MODE')) define('IN_PARSER_MODE', true);
if (!defined('IN_MANAGER_MODE')) define('IN_MANAGER_MODE', false);

$modx = new DocumentParser();

class synccache{
	var $aliasVisible = array();
	var $aliases = array();
	var $cachePath = null;
	var $deletedfiles = array();
	var $parents = array();
	var $showReport = null;
	/**
	* build siteCache file
	*
	* @param \DocumentParser $modx
	*
	* @return boolean
	*/
	public function buildCache($modx){}

	public function emptyCache($modx=null){}

	public function escapeDoubleQuotes($s){}

	public function escapeSingleQuotes($s){}

	public function getParents($id, $path=""){}

	public function setCachepath($path){}

	public function setReport($bool){}

}
class DocumentParser extends OldFunctions{
	/** 
	* @var \SystemEvent
	*/
	var $Event = null;
	var $aliasListing = null;
	var $aliases = null;
	var $chunkCache = null;
	var $config = null;
	var $contentTypes = null;
	var $currentSnippet = null;
	/** 
	* @var \DBAPI
	*/
	var $db = null;
	var $debug = null;
	var $documentContent = null;
	var $documentGenerated = null;
	var $documentIdentifier = null;
	var $documentListing = null;
	var $documentMap = null;
	var $documentMethod = null;
	var $documentName = null;
	var $documentObject = null;
	var $dumpSQL = null;
	var $dumpSnippets = null;
	var $entrypage = null;
	var $error_reporting = null;
	/** 
	* @var \SystemEvent
	*/
	var $event = null;
	var $executedQueries = null;
	var $forwards = "3";
	var $jscripts = null;
	var $loadedjscripts = null;
	var $maxParserPasses = null;
	var $minParserPasses = null;
	var $mstart = null;
	var $placeholders = null;
	var $pluginEvent = null;
	var $queryCode = null;
	var $queryTime = null;
	var $result = null;
	var $rs = null;
	var $sjscripts = null;
	var $snippetCache = null;
	var $snippetObjects = null;
	var $sql = null;
	var $stopOnNotice = null;
	var $table_prefix = null;
	var $templateObject = null;
	var $tstart = null;
	var $virtualDir = null;
	var $visitor = null;
	/** 
	* deprecated functions
	* @var \OldFunctions
	*/
	var $old = null;
	/**
	* Document constructor
	* @return \DocumentParser
	*/
	public function DocumentParser(){}

	/**
	* Add an event listner to a plugin - only for use within the current execution cycle
	*
	* @param string $evtName
	* @param string $pluginName
	*
	* @return boolean|int
	*/
	public function addEventListener($evtName, $pluginName){}

	/**
	* Change current web user's password
	*
	* @param string $oldPwd
	* @param string $newPwd
	*
	* @return string|boolean
	*/
	public function changeWebUserPassword($oldPwd, $newPwd){}

	/**
	* Check the cache for a specific document/resource
	*
	* @param int $id
	*
	* @return string
	*/
	public function checkCache($id){}

	/**
	* Checks, if a the result is a preview
	* @return boolean
	*/
	public function checkPreview(){}

	/**
	* Checks the publish state of page
	*/
	public function checkPublishStatus(){}

	/**
	* Check for manager login session
	* @return boolean
	*/
	public function checkSession(){}

	/**
	* check if site is offline
	* @return boolean
	*/
	public function checkSiteStatus(){}

	/**
	* Create a 'clean' document identifier with path information, friendly URL suffix and prefix.
	*
	* @param string $qOrig
	*
	* @return string
	*/
	public function cleanDocumentIdentifier($qOrig){}

	/**
	* Clear the cache of MODX.
	* @return boolean
	*/
	public function clearCache(){}

	/**
	* Run a plugin
	*
	* @param string $pluginCode
	* @param array $params
	*
	*/
	public function evalPlugin($pluginCode, $params){}

	/**
	* Run a snippet
	*
	* @param string $snippet
	* @param array $params
	*
	* @return string
	*/
	public function evalSnippet($snippet, $params){}

	/**
	* Run snippets as per the tags in $documentSource and replace the tags with the returned values.
	*
	* @param string $documentSource
	*
	* @return string
	*/
	public function evalSnippets($documentSource){}

	/**
	* Starts the parsing operations.
	*/
	public function executeParser(){}

	/**
	* Gets all active child documents of the specified document, i.e. those which published and not deleted.
	*
	* @param int $id
	* @param string $sort
	* @param string $dir
	* @param string $fields
	*
	* @return array
	*/
	public function getActiveChildren($id="0", $sort="menuindex", $dir="ASC", $fields="id, pagetitle, description, parent, alias, menutitle"){}

	/**
	* Gets all child documents of the specified document, including those which are unpublished or deleted.
	*
	* @param int $id
	* @param string $sort
	* @param string $dir
	* @param string $fields
	*
	* @return array
	*/
	public function getAllChildren($id="0", $sort="menuindex", $dir="ASC", $fields="id, pagetitle, description, parent, alias, menutitle"){}

	/**
	* Returns the cache relative URL/path with respect to the site root.
	* @return string
	*/
	public function getCachePath(){}

	/**
	* Returns an array of child IDs belonging to the specified parent.
	*
	* @param int $id
	* @param int $depth
	* @param array $children
	*
	* @return array
	*/
	public function getChildIds($id, $depth="10", $children=array()){}

	/**
	* Returns the chunk content for the given chunk name
	*
	* @param string $chunkName
	*
	* @return boolean|string
	*/
	public function getChunk($chunkName){}

	/**
	* Returns an entry from the config
	* @return boolean|string
	*/
	public function getConfig($name=""){}

	/**
	* Returns one document/resource
	*
	* @param int $id
	* @param string $fields
	* @param int $published
	* @param int $deleted
	*
	* @return boolean|string
	*/
	public function getDocument($id="0", $fields="*", $published="1", $deleted="0"){}

	/**
	* Returns the children of the selected document/folder.
	*
	* @param int $parentid
	* @param int $published
	* @param int $deleted
	* @param string $fields
	* @param string $where
	* @param \type $sort
	* @param string $dir
	* @param string $limit
	*
	* @return array
	*/
	public function getDocumentChildren($parentid="0", $published="1", $deleted="0", $fields="*", $where="", $sort="menuindex", $dir="ASC", $limit=""){}

	/**
	* Get the TV outputs of a document's children.
	*
	* @param int $parentid
	* @param int $published
	* @param string $docsort
	* @param \ASC $docsortdir
	* @param array $tvidnames
	*
	* @return boolean|array
	*/
	public function getDocumentChildrenTVarOutput($parentid="0", $tvidnames=array(), $published="1", $docsort="menuindex", $docsortdir="ASC", $tvidnames){}

	/**
	* Get the TVs of a document's children. Returns an array where each element represents one child doc.
	*
	* @param int $parentid
	* @param int $published
	* @param string $docsort
	* @param \ASC $docsortdir
	* @param string $tvfields
	* @param string $tvsort
	* @param string $tvsortdir
	* @param array $tvidnames
	*
	* @return boolean|array
	*/
	public function getDocumentChildrenTVars($parentid="0", $tvidnames=array(), $published="1", $docsort="menuindex", $docsortdir="ASC", $tvfields="*", $tvsort="rank", $tvsortdir="ASC", $tvidnames){}

	/**
	* Returns the document identifier of the current request
	*
	* @param string $method
	*
	* @return int
	*/
	public function getDocumentIdentifier($method){}

	/**
	* Get the method by which the current document/resource was requested
	* @return string
	*/
	public function getDocumentMethod(){}

	/**
	* Get all db fields and TVs for a document/resource
	*
	* @param \type $method
	* @param \type $identifier
	*
	* @return array
	*/
	public function getDocumentObject($method, $identifier, $isPrepareResponse=false){}

	/**
	* Returns multiple documents/resources
	*
	* @param array $ids
	* @param int $published
	* @param int $deleted
	* @param string $fields
	* @param string $where
	* @param \type $sort
	* @param string $dir
	* @param string $limit
	*
	* @return array|boolean
	*/
	public function getDocuments($ids=array(), $published="1", $deleted="0", $fields="*", $where="", $sort="menuindex", $dir="ASC", $limit=""){}

	/**
	* Returns the full table name based on db settings
	*
	* @param string $tbl
	*
	* @return string
	*/
	public function getFullTableName($tbl){}

	public function getIdFromAlias($alias){}

	/**
	* Returns current user id.
	*
	* @param string $context
	*
	* @return string
	*/
	public function getLoginUserID($context="", $context){}

	/**
	* Returns current user name
	*
	* @param string $context
	*
	* @return string
	*/
	public function getLoginUserName($context="", $context){}

	/**
	* Returns current login user type - web or manager
	* @return string
	*/
	public function getLoginUserType(){}

	/**
	* Returns the manager relative URL/path with respect to the site root.
	* @return string
	*/
	public function getManagerPath(){}

	/**
	* Returns the current micro time
	* @return float
	*/
	public function getMicroTime(){}

	/**
	* Returns the page information as database row, the type of result is defined with the parameter $rowMode
	*
	* @param int $pageid
	* @param int $active
	* @param string $fields
	*
	* @return boolean|array
	*/
	public function getPageInfo($pageid="-1", $active="1", $fields="id, pagetitle, description, alias"){}

	/**
	* Returns the parent document/resource of the given docid
	*
	* @param int $pid
	* @param int $active
	* @param string $fields
	*
	* @return boolean|array
	*/
	public function getParent($pid="-1", $active="1", $fields="id, pagetitle, description, alias, parent"){}

	/**
	* Returns an array of all parent record IDs for the id passed.
	*
	* @param int $id
	* @param int $height
	*
	* @return array
	*/
	public function getParentIds($id, $height="10"){}

	/**
	* Returns the placeholder value
	*
	* @param string $name
	*
	* @return string
	*/
	public function getPlaceholder($name){}

	public function getRegisteredClientScripts(){}

	public function getRegisteredClientStartupScripts(){}

	/**
	* Get MODx settings including, but not limited to, the system_settings table
	*/
	public function getSettings(){}

	/**
	* Returns the id of the current snippet.
	* @return int
	*/
	public function getSnippetId(){}

	/**
	* Returns the name of the current snippet.
	* @return string
	*/
	public function getSnippetName(){}

	public function getTagsFromContent($content, $left="[+", $right="+]"){}

	/**
	* Modified by Raymond for TV - Orig Modified by Apodigm - DocVars Returns a single site_content field or TV record from the db.
	*
	* @param string $idname
	* @param string $fields
	* @param \type $docid
	* @param int $published
	*
	* @return boolean
	*/
	public function getTemplateVar($idname="", $fields="*", $docid="", $published="1"){}

	/**
	* Returns an associative array containing TV rendered output values.
	*
	* @param \type $idnames
	* @param string $docid
	* @param int $published
	* @param string $sep
	*
	* @return boolean|array
	*/
	public function getTemplateVarOutput($idnames=array(), $docid="", $published="1", $sep=""){}

	/**
	* Returns an array of site_content field fields and/or TV records from the db
	*
	* @param array $idnames
	* @param string $fields
	* @param string $docid
	* @param int $published
	* @param string $sort
	* @param string $dir
	*
	* @return boolean|array
	*/
	public function getTemplateVars($idnames=array(), $fields="*", $docid="", $published="1", $sort="rank", $dir="ASC"){}

	public function getTimerStats($tstart){}

	/**
	* Returns an array of document groups that current user is assigned to.
	*
	* @param boolean $resolveIds
	*
	* @return string|array
	*/
	public function getUserDocGroups($resolveIds=false){}

	/**
	* Returns a user info record for the given manager user
	*
	* @param int $uid
	*
	* @return boolean|string
	*/
	public function getUserInfo($uid){}

	/**
	* Returns the ClipperCMS version information as version, branch, release date and full application name.
	* @return array
	*/
	public function getVersionData($data=null){}

	/**
	* Returns a record for the web user
	*
	* @param int $uid
	*
	* @return boolean|string
	*/
	public function getWebUserInfo($uid){}

	public function get_backtrace($backtrace){}

	/**
	* Returns true if user has the currect permission
	*
	* @param string $pm
	*
	* @return int
	*/
	public function hasPermission($pm){}

	public function htmlspecialchars($str, $flags="2"){}

	/**
	* Invoke an event.
	*
	* @param string $evtName
	* @param array $extParams
	*
	* @return boolean|array
	*/
	public function invokeEvent($evtName, $extParams=array()){}

	/**
	* Returns true if we are currently in the manager backend
	* @return boolean
	*/
	public function isBackend(){}

	/**
	* Returns true if we are currently in the frontend
	* @return boolean
	*/
	public function isFrontend(){}

	/**
	* Returns true if the current web user is a member the specified groups
	*
	* @param array $groupNames
	*
	* @return boolean
	*/
	public function isMemberOfWebGroup($groupNames=array()){}

	public function jsonDecode($json, $assoc=false){}

	/**
	* Loads an extension from the extenders folder.
	*
	* @param string $extnamegetAllChildren
	*
	* @return boolean
	*/
	public function loadExtension($extname, $extnamegetAllChildren){}

	/**
	* Add an a alert message to the system event log
	*
	* @param int $evtid
	* @param int $type
	* @param string $msg
	* @param string $source
	*
	*/
	public function logEvent($evtid, $type, $msg, $source="Parser"){}

	/**
	* Create an URL for the given document identifier. The url prefix and postfix are used, when friendly_url is active.
	*
	* @param int $id
	* @param string $alias
	* @param string $args
	* @param string $scheme
	*
	* @return string
	*/
	public function makeUrl($id, $alias="", $args="", $scheme=""){}

	/**
	* Merge chunks
	*
	* @param string $content
	*
	* @return string
	*/
	public function mergeChunkContent($content){}

	/**
	* Merge content fields and TVs
	*
	* @param string $template
	*
	* @return string
	*/
	public function mergeDocumentContent($content, $template){}

	/**
	* Merge placeholder values
	*
	* @param string $content
	*
	* @return string
	*/
	public function mergePlaceholderContent($content){}

	/**
	* Merge system settings
	*
	* @param string $template
	*
	* @return string
	*/
	public function mergeSettingsContent($content, $template){}

	public function messageQuit($msg="unspecified error", $query="", $is_error=true, $nr="", $file="", $source="", $text="", $line="", $output=""){}

	public function nicesize($size){}

	/**
	* Final processing and output of the document/resource.
	*
	* @param boolean $noEvent
	*
	*/
	public function outputContent($noEvent=false){}

	public function parseChunk($chunkName, $chunkArr, $prefix="{", $suffix="}"){}

	/**
	* Parse a source string.
	*
	* @param string $source
	*
	* @return string
	*/
	public function parseDocumentSource($source){}

	/**
	* Parses a resource property string and returns the result as an array
	*
	* @param string $propertyString
	*
	* @return array
	*/
	public function parseProperties($propertyString){}

	/**
	* PHP error handler set by http://www.php.net/manual/en/function.set-error-handler.php
	*
	* @param int $nr
	* @param string $text
	* @param string $file
	* @param string $line
	*
	* @return boolean
	*/
	public function phpError($nr, $text, $file, $line){}

	/**
	* Final jobs.
	*/
	public function postProcess(){}

	/**
	* The next step called at the end of executeParser()
	*/
	public function prepareResponse(){}

	/**
	* Registers Client-side CSS scripts - these scripts are loaded at inside the <head> tag
	*
	* @param string $src
	* @param string $media
	*
	*/
	public function regClientCSS($src, $media=""){}

	/**
	* Returns all registered startup scripts
	* @return string
	*/
	public function regClientHTMLBlock($html){}

	/**
	* Registers Client-side JavaScript these scripts are loaded at the end of the page unless $startup is true
	*
	* @param string $src
	* @param array $options
	* @param boolean $startup
	*
	* @return string
	*/
	public function regClientScript($src, $options=array(), $startup=false){}

	/**
	* Returns all registered JavaScripts
	* @return string
	*/
	public function regClientStartupHTMLBlock($html){}

	/**
	* Registers Startup Client-side JavaScript - these scripts are loaded at inside the <head> tag
	*
	* @param string $src
	* @param array $options
	*
	*/
	public function regClientStartupScript($src, $options=array()){}

	/**
	* Remove all event listners - only for use within the current execution cycle
	*/
	public function removeAllEventListener(){}

	/**
	* Remove event listner - only for use within the current execution cycle
	*
	* @param string $evtName
	*
	* @return boolean
	*/
	public function removeEventListener($evtName){}

	/**
	* Convert URL tags [~.
	*
	* @param string $documentSource
	*
	* @return string
	*/
	public function rewriteUrls($documentSource){}

	public function rotate_log($target="event_log", $limit="3000", $trim="100"){}

	/**
	* Executes a snippet.
	*
	* @param string $snippetName
	* @param array $params
	*
	* @return string
	*/
	public function runSnippet($snippetName, $params=array()){}

	/**
	* Sends a message to a user's message box.
	*
	* @param string $type
	* @param string $to
	* @param string $from
	* @param string $subject
	* @param string $msg
	* @param int $private
	*
	*/
	public function sendAlert($type, $to, $from, $subject, $msg, $private="0"){}

	/**
	* Redirect to the error page, by calling sendForward(). This is called for example when the page was not found.
	*/
	public function sendErrorPage(){}

	/**
	* Forward to another page
	*
	* @param int $id
	* @param string $responseCode
	*
	*/
	public function sendForward($id, $responseCode=""){}

	/**
	* Redirect
	*
	* @param string $url
	* @param int $count_attempts
	* @param \type $type
	* @param \type $responseCode
	*
	* @return boolean
	*/
	public function sendRedirect($url, $count_attempts="0", $type="", $responseCode=""){}

	public function sendStrictURI(){}

	public function sendUnauthorizedPage(){}

	public function sendmail($params=array(), $msg=""){}

	/**
	* Sets a value for a placeholder
	*
	* @param string $name
	* @param string $value
	*
	*/
	public function setPlaceholder($name, $value){}

	/**
	* Format alias to be URL-safe. Strip invalid characters.
	* @return string
	*/
	public function stripAlias($alias){}

	/**
	* Remove unwanted html tags and snippet, settings and tags
	*
	* @param string $html
	* @param string $allowed
	*
	* @return string
	*/
	public function stripTags($html, $allowed=""){}

	public function toAlias($text){}

	/**
	* Returns the timestamp in the date format defined in $this->config['datetime_format']
	*
	* @param int $timestamp
	* @param string $mode
	*
	* @return string
	*/
	public function toDateFormat($timestamp="0", $mode=""){}

	/**
	* For use by toPlaceholders(); For setting an array or object element as placeholder.
	*
	* @param string $key
	* @param object $value
	* @param string $prefix
	*
	*/
	public function toPlaceholder($key, $value, $prefix=""){}

	/**
	* Set placeholders en masse via an array or object.
	*
	* @param object $subject
	* @param string $prefix
	*
	*/
	public function toPlaceholders($subject, $prefix=""){}

	/**
	* Make a timestamp from a string corresponding to the format in $this->config['datetime_format']
	*
	* @param string $str
	*
	* @return string
	*/
	public function toTimeStamp($str){}

	/**
	* Displays a javascript alert message in the web browser
	*
	* @param string $msg
	* @param string $url
	*
	*/
	public function webAlert($msg, $url=""){}

}
class SystemEvent{
	var $_output = null;
	var $_propagate = null;
	var $activated = null;
	var $activePlugin = null;
	var $name = null;
	/**
	*
	* @param string $name
	*
	*/
	public function SystemEvent($name=""){}

	public function _resetEventObject(){}

	/**
	* Display a message to the user
	*
	* @param string $msg
	*
	*/
	public function alert($msg){}

	/**
	* Output
	*
	* @param string $msg
	*
	*/
	public function output($msg){}

	/**
	* Stop event propogation
	*/
	public function stopPropagation(){}

}
class DBAPI{
	var $config = null;
	var $conn = null;
	var $isConnected = null;
	public function DBAPI($host="", $dbase="", $uid="", $pwd="", $pre=null, $charset="", $connection_method="SET CHARACTER SET"){}

	public function connect($host="", $dbase="", $uid="", $pwd="", $persist="0"){}

	public function delete($from, $where="", $orderby="", $limit=""){}

	public function disconnect(){}

	public function escape($s, $safecount="0"){}

	public function fieldName($rs, $col="0"){}

	public function freeResult($rs){}

	public function getAffectedRows($conn=null){}

	/**
	*
	* @param \: $dsq
	*
	*/
	public function getColumn($name, $dsq){}

	/**
	*
	* @param \: $dsq
	*
	*/
	public function getColumnNames($dsq){}

	/**
	*
	* @param \: $params
	*
	*/
	public function getHTMLGrid($dsq, $params, $params){}

	public function getInsertId($conn=null){}

	public function getLastError($conn=null){}

	public function getRecordCount($ds){}

	/**
	*
	* @param \: $dsq
	*
	*/
	public function getRow($ds, $mode="assoc", $dsq){}

	/**
	*
	* @param \: $table
	*
	*/
	public function getTableMetaData($table, $table){}

	/**
	*
	* @param \: $dsq
	*
	*/
	public function getValue($dsq){}

	/**
	* @return string
	*/
	public function getVersion(){}

	public function getXML($dsq){}

	public function initDataTypes(){}

	public function insert($fields, $intotable, $fromfields="*", $fromtable="", $where="", $limit=""){}

	/**
	*
	* @param \: $rs
	*
	* @return \:
	*/
	public function makeArray($rs=""){}

	public function numFields($rs){}

	public function optimize($table_name){}

	public function prepareDate($timestamp, $fieldType="DATETIME"){}

	public function query($sql){}

	/**
	*
	* @param string $str
	*
	* @return string
	*/
	public function replaceFullTableName($str, $force=null){}

	public function select($fields="*", $from="", $where="", $orderby="", $limit=""){}

	public function selectDb($name){}

	public function update($fields, $table, $where=""){}

}
class EXPORT_SITE{
	var $count = null;
	var $exportstart = null;
	var $generate_mode = null;
	var $ignore_ids = null;
	var $output = array();
	var $repl_after = null;
	var $repl_before = null;
	var $targetDir = null;
	var $total = null;
	public function EXPORT_SITE(){}

	public function clearCache(){}

	public function curl_get_contents($url, $timeout="30"){}

	public function getFileName($docid, $alias, $prefix, $suffix){}

	public function getTotal($ignore_ids="", $noncache="0"){}

	public function get_mtime(){}

	public function makeFile($docid, $filepath){}

	public function parsePlaceholder($tpl, $ph=array()){}

	public function removeDirectoryAll($directory=""){}

	public function run($parent="0"){}

	public function setExportDir($dir){}

	public function setUrlMode(){}

}
class MakeTable{
	var $actionField = null;
	var $allOption = null;
	var $cellAction = null;
	var $columnHeaderClass = null;
	var $columnWidths = null;
	var $excludeFields = null;
	var $formAction = null;
	var $formElementName = null;
	var $formElementType = null;
	var $formName = null;
	var $linkAction = null;
	var $pageNav = null;
	var $rowAlternateClass = null;
	var $rowAlternatingScheme = null;
	var $rowHeaderClass = null;
	var $rowRegularClass = null;
	var $selectedValues = null;
	var $tableClass = null;
	var $tableID = null;
	var $tableWidth = null;
	var $thClass = null;
	public function MakeTable(){}

	/**
	* Adds an INPUT form element column to the table.
	*/
	public function addFormField($value, $isChecked){}

	/**
	* Generates the table content.
	*/
	public function create($fieldsArray, $fieldHeadersArray=array(), $linkpage=""){}

	/**
	* Generates the cell content, including any specified action fields values.
	*/
	public function createCellText($currentActionFieldValue, $value){}

	/**
	* Creates an individual page link for the paging navigation.
	*/
	public function createPageLink($link, $pageNum, $displayText, $currentPage=false, $qs=""){}

	/**
	* Generates optional paging navigation controls for the table.
	*/
	public function createPagingNavigation($numRecords, $qs=""){}

	/**
	* Determines what class the current row should have applied.
	*/
	public function determineRowClass($position, $value){}

	/**
	* Generates an onclick action applied to the current cell, to execute any specified cell actions.
	*/
	public function getCellAction($currentActionFieldValue, $value){}

	/**
	* Retrieves the width of a specific table column by index position.
	*/
	public function getColumnWidth($columnPosition){}

	/**
	* Generates the proper LIMIT clause for queries to retrieve paged results in a MakeTable $fieldsArray.
	*/
	public function handlePaging(){}

	/**
	* Generates the SORT BY clause for queries used to retrieve a MakeTable $fieldsArray
	*/
	public function handleSorting($natural_order=false){}

	/**
	* Function to prepare a link generated in the table cell/link actions.
	*/
	public function prepareLink($link, $value){}

	/**
	* Generates a link to order by a specific $fieldsArray key; use to generate sort by links in the MakeTable $fieldHeadingsArray values.
	*/
	public function prepareOrderByLink($key, $text, $qs=""){}

	/**
	* Sets the default field value to be used when appending query parameters to link actions.
	*/
	public function setActionFieldName($value){}

	/**
	* Sets an option to generate a check all link when checkbox is indicated as the table formElementType.
	*/
	public function setAllOption(){}

	/**
	* Sets the default link href for all cells in the table.
	*/
	public function setCellAction($value){}

	/**
	* Sets the class attribute of the column header row.
	*/
	public function setColumnHeaderClass($value){}

	/**
	* Sets the width attribute of each column in the array.
	*/
	public function setColumnWidths($widthArray, $value){}

	/**
	* Excludes fields from the table by array key.
	*/
	public function setExcludeFields($value){}

	/**
	* Sets extra content to be presented following the table (but within the form, if a form is being rendered with the table).
	*/
	public function setExtra($value){}

	/**
	* Sets the action of the FORM element.
	*/
	public function setFormAction($value){}

	/**
	* Sets the name of the INPUT form element to be presented as the first column.
	*/
	public function setFormElementName($value){}

	/**
	* Sets the type of INPUT form element to be presented as the first column.
	*/
	public function setFormElementType($value){}

	/**
	* Sets the name of the FORM to wrap the table in when a form element has been indicated.
	*/
	public function setFormName($value){}

	/**
	* Sets the default link href for the text presented in a cell.
	*/
	public function setLinkAction($value){}

	/**
	* Sets the class attribute of alternate table rows.
	*/
	public function setRowAlternateClass($value){}

	/**
	* Sets the table to provide alternate row colors using ODD or EVEN rows
	*/
	public function setRowAlternatingScheme($value){}

	/**
	* Sets the class attribute of the table header row.
	*/
	public function setRowHeaderClass($value){}

	/**
	* Sets the class attribute of regular table rows.
	*/
	public function setRowRegularClass($value){}

	/**
	* An optional array of values that can be preselected when using
	*/
	public function setSelectedValues($valueArray, $value){}

	/**
	* Sets the class attribute of the main HTML TABLE.
	*/
	public function setTableClass($value){}

	/**
	* Sets the id attribute of the main HTML TABLE.
	*/
	public function setTableID($value){}

	/**
	* Sets the width attribute of the main HTML TABLE.
	*/
	public function setTableWidth($value){}

	/**
	* Sets the class attribute of the table header row.
	*/
	public function setThHeaderClass($value){}

}
class ManagerAPI{
	var $action = null;
	public function ManagerAPI(){}

	public function checkHashAlgorithm($algorithm=""){}

	public function checkSystemChecksum(){}

	public function clearSavedFormValues(){}

	public function genHash($password, $seed="1"){}

	public function getSystemChecksum($check_files){}

	public function getUserHashAlgorithm($uid){}

	public function hasFormValues(){}

	public function initPageViewState($id="0"){}

	public function loadFormValues(){}

	public function saveFormValues($id="0"){}

	public function savePageViewState($id="0"){}

	public function setSystemChecksum($checksum){}

}
class MODxMailer extends PHPMailer{
	var $encode_header_method = null;
	var $mb_language = null;
	public function MODxMailer(){}

	public function MailSend($header, $body){}

	public function SetError($msg){}

	public function address_split($address){}

	public function mbMailSend($header, $body){}

}
class PHPMailer{
	/** 
	* Should we allow sending messages with empty body?
	* @var bool
	*/
	var $AllowEmpty = false;
	/** 
	* Sets the text-only body of the message. This automatically sets the email to multipart/alternative. This body can be read by mail clients that do not have HTML email capability such as mutt. Clients that can read HTML will view the normal Body.
	* @var string
	*/
	var $AltBody = "";
	/** 
	* Sets SMTP auth type. Options are LOGIN | PLAIN | NTLM | CRAM-MD5 (default LOGIN)
	*/
	var $AuthType = "";
	/** 
	* Sets the Body of the message. This can be either an HTML or text body.
	* @var string
	*/
	var $Body = "";
	/** 
	* Sets the CharSet of the message.
	* @var string
	*/
	var $CharSet = "utf-8";
	/** 
	* Sets the email address that a reading confirmation will be sent.
	* @var string
	*/
	var $ConfirmReadingTo = "";
	/** 
	* Sets the Content-type of the message.
	* @var string
	*/
	var $ContentType = "text/plain";
	/** 
	* Used with DKIM Singing required if DKIM is enabled, in format of email address 'domain.com'
	* @var string
	*/
	var $DKIM_domain = "";
	/** 
	* Used with DKIM Signing required if DKIM is enabled, in format of email address 'you@yourdomain.com' typically used as the source of the email
	* @var string
	*/
	var $DKIM_identity = "";
	/** 
	* Used with DKIM Signing optional parameter if your private key requires a passphras
	* @var string
	*/
	var $DKIM_passphrase = "";
	/** 
	* Used with DKIM Signing required if DKIM is enabled, path to private key file
	* @var string
	*/
	var $DKIM_private = "";
	/** 
	* Used with DKIM Signing required parameter if DKIM is enabled
	* @var string
	*/
	var $DKIM_selector = "";
	/** 
	* Sets the function/method to use for debugging output.
	* @var string
	*/
	var $Debugoutput = "echo";
	/** 
	* Sets the Encoding of the message. Options for this are "8bit", "7bit", "binary", "base64", and "quoted-printable".
	* @var string
	*/
	var $Encoding = "8bit";
	/** 
	* Holds the most recent mailer error message.
	* @var string
	*/
	var $ErrorInfo = "";
	/** 
	* Sets the From email address for the message.
	* @var string
	*/
	var $From = "root@localhost";
	/** 
	* Sets the From name of the message.
	* @var string
	*/
	var $FromName = "Root User";
	/** 
	* Sets the SMTP HELO of the message (Default is $Hostname).
	* @var string
	*/
	var $Helo = "";
	/** 
	* Sets the SMTP hosts.
	* @var string
	*/
	var $Host = "localhost";
	/** 
	* Sets the hostname to use in Message-Id and Received headers and as default HELO string. If empty, the value returned by SERVER_NAME is used or 'localhost.localdomain'.
	* @var string
	*/
	var $Hostname = "";
	/** 
	* Provides the ability to change the generic line ending NOTE: The default remains '\n'. We force CRLF where we KNOW it must be used via self::CRLF
	* @var string
	*/
	var $LE = "
";
	/** 
	* Method to send mail: ("mail", "sendmail", or "smtp").
	* @var string
	*/
	var $Mailer = "mail";
	/** 
	* Sets the message Date to be used in the Date header.
	* @var string
	*/
	var $MessageDate = "";
	/** 
	* Sets the message ID to be used in the Message-Id header.
	* @var string
	*/
	var $MessageID = "";
	/** 
	* Sets SMTP password.
	* @var string
	*/
	var $Password = "";
	/** 
	* Path to PHPMailer plugins. Useful if the SMTP class is in a different directory than the PHP include path.
	* @var string
	*/
	var $PluginDir = "";
	/** 
	* Sets the default SMTP server port.
	* @var int
	*/
	var $Port = "25";
	/** 
	* Email priority (1 = High, 3 = Normal, 5 = low).
	* @var int
	*/
	var $Priority = "3";
	/** 
	* Sets SMTP realm.
	*/
	var $Realm = "";
	/** 
	* Sets the Return-Path of the message. If empty, it will be set to either From or Sender.
	* @var string
	*/
	var $ReturnPath = "";
	/** 
	* Sets SMTP authentication. Utilizes the Username and Password variables.
	* @var bool
	*/
	var $SMTPAuth = false;
	/** 
	* Sets SMTP class debugging on or off.
	* @var bool
	*/
	var $SMTPDebug = false;
	/** 
	* Prevents the SMTP connection from being closed after each mail sending. If this is set to true then to close the connection requires an explicit call to SmtpClose().
	* @var bool
	*/
	var $SMTPKeepAlive = false;
	/** 
	* Sets connection prefix. Options are "", "ssl" or "tls"
	* @var string
	*/
	var $SMTPSecure = "";
	/** 
	* Sets the Sender email (Return-Path) of the message. If not empty, will be sent via -f to sendmail or as 'MAIL FROM' in smtp mode.
	* @var string
	*/
	var $Sender = "";
	/** 
	* Sets the path of the sendmail program.
	* @var string
	*/
	var $Sendmail = "/usr/sbin/sendmail";
	/** 
	* Provides the ability to have the TO field process individual emails, instead of sending to entire TO addresses
	* @var bool
	*/
	var $SingleTo = false;
	/** 
	* If SingleTo is true, this provides the array to hold the email addresses
	* @var bool
	*/
	var $SingleToArray = array();
	/** 
	* Sets the Subject of the message.
	* @var string
	*/
	var $Subject = "";
	/** 
	* Sets the SMTP server timeout in seconds.
	* @var int
	*/
	var $Timeout = "10";
	/** 
	* Determine if mail() uses a fully sendmail compatible MTA that supports sendmail's "-oi -f" options
	* @var boolean
	*/
	var $UseSendmailOptions = true;
	/** 
	* Sets SMTP username.
	* @var string
	*/
	var $Username = "";
	/** 
	* Sets the PHPMailer Version number
	* @var string
	*/
	var $Version = "5.2.6";
	/** 
	* Sets word wrapping on the body of the message to a given number of characters.
	* @var int
	*/
	var $WordWrap = "0";
	/** 
	* Sets SMTP workstation.
	*/
	var $Workstation = "";
	/** 
	* What to use in the X-Mailer header
	* @var string NULL for default, whitespace for None, or actual string to use
	*/
	var $XMailer = "";
	/** 
	* Callback Action function name.
	* @var string
	*/
	var $action_function = "";
	/** 
	* Should we generate VERP addresses when sending via SMTP?
	* @var bool
	*/
	var $do_verp = false;
	/**
	* Adds a "To" address.
	*
	* @param string $address
	* @param string $name
	*
	* @return boolean
	*/
	public function AddAddress($address, $name=""){}

	/**
	* Adds an attachment from a path on the filesystem.
	*
	* @param string $path
	* @param string $name
	* @param string $encoding
	* @param string $type
	*
	* @return bool
	*/
	public function AddAttachment($path, $name="", $encoding="base64", $type="application/octet-stream"){}

	/**
	* Adds a "Bcc" address.
	*
	* @param string $address
	* @param string $name
	*
	* @return boolean
	*/
	public function AddBCC($address, $name=""){}

	/**
	* Adds a "Cc" address.
	*
	* @param string $address
	* @param string $name
	*
	* @return boolean
	*/
	public function AddCC($address, $name=""){}

	/**
	* Adds a custom header. $name value can be overloaded to contain both header name and value (name:value)
	*
	* @param string $name
	* @param string $value
	*
	* @return void
	*/
	public function AddCustomHeader($name, $value=null){}

	/**
	* Add an embedded attachment from a file.
	*
	* @param string $path
	* @param string $cid
	* @param string $name
	* @param string $encoding
	* @param string $type
	*
	* @return bool
	*/
	public function AddEmbeddedImage($path, $cid, $name="", $encoding="base64", $type="application/octet-stream"){}

	/**
	* Adds a "Reply-to" address.
	*
	* @param string $address
	* @param string $name
	*
	* @return boolean
	*/
	public function AddReplyTo($address, $name=""){}

	/**
	* Adds a string or binary attachment (non-filesystem) to the list.
	*
	* @param string $string
	* @param string $filename
	* @param string $encoding
	* @param string $type
	*
	* @return void
	*/
	public function AddStringAttachment($string, $filename, $encoding="base64", $type="application/octet-stream"){}

	/**
	* Add an embedded stringified attachment.
	*
	* @param string $string
	* @param string $cid
	* @param string $name
	* @param string $encoding
	* @param string $type
	*
	* @return bool
	*/
	public function AddStringEmbeddedImage($string, $cid, $name="", $encoding="base64", $type="application/octet-stream"){}

	/**
	* Creates recipient headers.
	*
	* @param string $type
	* @param array $addr
	*
	* @return string
	*/
	public function AddrAppend($type, $addr){}

	/**
	* Formats an address correctly.
	*
	* @param string $addr
	*
	* @return string
	*/
	public function AddrFormat($addr){}

	/**
	* Does this message have an alternative body set?
	* @return bool
	*/
	public function AlternativeExists(){}

	/**
	* Returns true if an attachment (non-inline) is present.
	* @return bool
	*/
	public function AttachmentExists(){}

	/**
	* Correctly encodes and wraps long multibyte strings for mail headers without breaking lines within a character.
	*
	* @param string $str
	* @param string $lf
	*
	* @return string
	*/
	public function Base64EncodeWrapMB($str, $lf=null){}

	/**
	* Clears all recipients assigned in the TO array. Returns void.
	* @return void
	*/
	public function ClearAddresses(){}

	/**
	* Clears all recipients assigned in the TO, CC and BCC array. Returns void.
	* @return void
	*/
	public function ClearAllRecipients(){}

	/**
	* Clears all previously set filesystem, string, and binary attachments. Returns void.
	* @return void
	*/
	public function ClearAttachments(){}

	/**
	* Clears all recipients assigned in the BCC array. Returns void.
	* @return void
	*/
	public function ClearBCCs(){}

	/**
	* Clears all recipients assigned in the CC array. Returns void.
	* @return void
	*/
	public function ClearCCs(){}

	/**
	* Clears all custom headers. Returns void.
	* @return void
	*/
	public function ClearCustomHeaders(){}

	/**
	* Clears all recipients assigned in the ReplyTo array. Returns void.
	* @return void
	*/
	public function ClearReplyTos(){}

	/**
	* Assembles the message body. Returns an empty string on failure.
	* @return string
	*/
	public function CreateBody(){}

	/**
	* Assembles message header.
	* @return string
	*/
	public function CreateHeader(){}

	/**
	* Create the DKIM header, body, as new header
	*
	* @param string $headers_line
	* @param string $subject
	* @param string $body
	*
	* @return string
	*/
	public function DKIM_Add($headers_line, $subject, $body){}

	/**
	* Generate DKIM Canonicalization Body
	*
	* @param string $body
	*
	* @return string
	*/
	public function DKIM_BodyC($body){}

	/**
	* Generate DKIM Canonicalization Header
	*
	* @param string $s
	*
	* @return string
	*/
	public function DKIM_HeaderC($s){}

	/**
	* Set the private key file and password to sign the message.
	*
	* @param string $txt
	*
	* @return string
	*/
	public function DKIM_QP($txt){}

	/**
	* Generate DKIM signature
	*
	* @param string $s
	*
	* @return string
	*/
	public function DKIM_Sign($s){}

	/**
	* Encode a header string to best (shortest) of Q, B, quoted or none.
	*
	* @param string $str
	* @param string $position
	*
	* @return string
	*/
	public function EncodeHeader($str, $position="text"){}

	/**
	* Encode string to q encoding.
	*
	* @param string $str
	* @param string $position
	*
	* @return string
	*/
	public function EncodeQ($str, $position="text"){}

	/**
	* Encode string to RFC2045 (6.7) quoted-printable format
	*
	* @param string $string
	* @param integer $line_max
	*
	* @return string
	*/
	public function EncodeQP($string, $line_max="76"){}

	/**
	* Wrapper to preserve BC for old QP encoding function that was removed
	*
	* @param string $string
	* @param integer $line_max
	* @param bool $space_conv
	*
	* @return string
	*/
	public function EncodeQPphp($string, $line_max="76", $space_conv=false){}

	/**
	* Encodes string to requested format.
	*
	* @param string $str
	* @param string $encoding
	*
	* @return string
	*/
	public function EncodeString($str, $encoding="base64"){}

	/**
	* Changes every end of line from CRLF, CR or LF to $this->LE.
	*
	* @param string $str
	*
	* @return string
	*/
	public function FixEOL($str){}

	/**
	* Return the current array of attachments
	* @return array
	*/
	public function GetAttachments(){}

	/**
	* Returns the message MIME.
	* @return string
	*/
	public function GetMailMIME(){}

	/**
	* Returns the MIME message (headers and body). Only really valid post PreSend().
	* @return string
	*/
	public function GetSentMIMEMessage(){}

	/**
	* Return the current array of language strings
	* @return array
	*/
	public function GetTranslations(){}

	/**
	* Checks if a string contains multibyte characters.
	*
	* @param string $str
	*
	* @return bool
	*/
	public function HasMultiBytes($str){}

	/**
	* Returns a formatted header line.
	*
	* @param string $name
	* @param string $value
	*
	* @return string
	*/
	public function HeaderLine($name, $value){}

	/**
	* Returns true if an inline attachment is present.
	* @return bool
	*/
	public function InlineImageExists(){}

	/**
	* Returns true if an error occurred.
	* @return bool
	*/
	public function IsError(){}

	/**
	* Sets message type to HTML.
	*
	* @param bool $ishtml
	*
	* @return void
	*/
	public function IsHTML($ishtml=true){}

	/**
	* Sets Mailer to send message using PHP mail() function.
	* @return void
	*/
	public function IsMail(){}

	/**
	* Sets Mailer to send message using the qmail MTA.
	* @return void
	*/
	public function IsQmail(){}

	/**
	* Sets Mailer to send message using SMTP.
	* @return void
	*/
	public function IsSMTP(){}

	/**
	* Sets Mailer to send message using the $Sendmail program.
	* @return void
	*/
	public function IsSendmail(){}

	/**
	* Creates a message from an HTML string, making modifications for inline images and backgrounds and creates a plain-text version by converting the HTML Overwrites any existing values in $this->Body and $this->AltBody
	*
	* @param string $message
	* @param string $basedir
	* @param bool $advanced
	*
	* @return string
	*/
	public function MsgHTML($message, $basedir="", $advanced=false){}

	/**
	* Actual Email transport function Send the email via the selected mechanism
	* @return bool
	*/
	public function PostSend(){}

	/**
	* Prep mail by constructing all message entities
	* @return bool
	*/
	public function PreSend(){}

	/**
	* Returns the proper RFC 822 formatted date.
	* @return string
	*/
	public function RFCDate(){}

	/**
	* Strips newlines to prevent header injection.
	*
	* @param string $str
	*
	* @return string
	*/
	public function SecureHeader($str){}

	/**
	* Creates message and assigns Mailer. If the message is not sent successfully then it returns false. Use the ErrorInfo variable to view description of the error.
	* @return bool
	*/
	public function Send(){}

	/**
	* Set the From and FromName properties
	*
	* @param string $address
	* @param string $name
	* @param int $auto
	*
	* @return boolean
	*/
	public function SetFrom($address, $name="", $auto="1"){}

	/**
	* Sets the language for all class error messages.
	*
	* @param string $langcode
	* @param string $lang_path
	*
	* @return bool
	*/
	public function SetLanguage($langcode="en", $lang_path="language/"){}

	/**
	* Set the body wrapping.
	* @return void
	*/
	public function SetWordWrap(){}

	/**
	* Set the private key file and password to sign the message.
	*
	* @param string $cert_filename
	* @param string $key_filename
	* @param string $key_pass
	*
	*/
	public function Sign($cert_filename, $key_filename, $key_pass){}

	/**
	* Closes the active SMTP session if one exists.
	* @return void
	*/
	public function SmtpClose(){}

	/**
	* Initiates a connection to an SMTP server.
	* @return bool
	*/
	public function SmtpConnect(){}

	/**
	* Returns a formatted mail line.
	*
	* @param string $value
	*
	* @return string
	*/
	public function TextLine($value){}

	/**
	* Finds last character boundary prior to maxLength in a utf-8 quoted (printable) encoded string.
	*
	* @param string $encodedText
	* @param int $maxLength
	*
	* @return int
	*/
	public function UTF8CharBoundary($encodedText, $maxLength){}

	/**
	* Check that a string looks roughly like an email address should Static so it can be used without instantiation, public so people can overload Conforms to RFC5322: Uses *correct* regex on which FILTER_VALIDATE_EMAIL is based; So why not use FILTER_VALIDATE_EMAIL? Because it was broken to not allow a@b type valid addresses :(
	*
	* @param string $address
	*
	* @return boolean
	*/
	public function ValidateAddress($address){}

	/**
	* Wraps message for use with mailers that do not automatically perform wrapping and for quoted-printable.
	*
	* @param string $message
	* @param integer $length
	* @param boolean $qp_mode
	*
	* @return string
	*/
	public function WrapText($message, $length, $qp_mode=false){}

	/**
	* Gets the MIME type of the embedded or inline image
	*
	* @param string $ext
	*
	* @return string
	*/
	public function _mime_types($ext=""){}

	/**
	* Convert an HTML string into a plain text version
	*
	* @param string $html
	* @param bool $advanced
	*
	* @return string
	*/
	public function html2text($html, $advanced=false){}

	/**
	* Set (or reset) Class Objects (variables)
	*
	* @param string $name
	* @param mixed $value
	*
	* @return bool
	*/
	public function set($name, $value=""){}

}
class PHPCOMPAT{
	public function PHPCOMPAT(){}

	public function htmlspecialchars($str, $flags="2"){}

}
class ContextMenu{
	var $id = null;
	public function ContextMenu($id="", $width="120", $visible=false){}

	public function addItem($text, $action="", $img="", $disabled="0"){}

	public function addSeparator(){}

	public function getClientScriptObject(){}

	public function render(){}

}
class DataGrid{
	var $altItemClass = null;
	var $altItemStyle = null;
	var $cellPadding = null;
	var $cellSpacing = null;
	var $colAligns = null;
	var $colColors = null;
	var $colTypes = null;
	var $colWidths = null;
	var $colWraps = null;
	var $columnHeaderClass = null;
	var $columnHeaderStyle = null;
	var $columns = null;
	var $cssClass = null;
	var $cssStyle = null;
	var $ds = null;
	var $fields = null;
	var $footer = null;
	var $header = null;
	var $id = null;
	var $itemClass = null;
	var $itemStyle = null;
	var $noRecordMsg = "No records found.";
	var $pageNumber = null;
	var $pageSize = null;
	var $pager = null;
	var $pagerClass = null;
	var $pagerLocation = null;
	var $pagerStyle = null;
	var $rowAlign = null;
	var $rowIdField = null;
	public function DataGrid($id, $ds, $pageSize="20", $pageNumber="-1"){}

	public function RenderRowFnc($n, $row){}

	public function formatColumnValue($row, $value, $type, $align){}

	public function render(){}

	public function setDataSource($ds){}

}
class DataSetPager{
	var $ds = null;
	var $id = null;
	var $pageClass = null;
	var $pageNumber = null;
	var $pageSize = null;
	var $pageStyle = null;
	var $pager = null;
	var $rows = null;
	var $selPageClass = null;
	var $selPageStyle = null;
	public function DataSetPager($id, $ds, $pageSize="10", $pageNumber="-1"){}

	public function getRenderedPager(){}

	public function getRenderedRows(){}

	public function render(){}

	public function setDataSource($ds){}

	public function setPageSize($ps){}

	public function setRenderPagerFnc($fncName, $args=""){}

	public function setRenderRowFnc($fncName, $args=""){}

}
class rc4crypt{
	public function endecrypt($pwd, $data, $case=""){}

}
class errorHandler{
	var $errorcode = null;
	var $errors = array();
	public function dumpError(){}

	public function errorHandler(){}

	public function getError(){}

	public function include_lang($context="common"){}

	public function setError($errorcode, $custommessage=""){}

}
class logHandler{
	var $entry = array();
	public function initAndWriteLog($msg="", $internalKey="", $username="", $action="", $itemid="", $itemname=""){}

	public function logError($msg){}

	public function writeToLog(){}

}
class Paging{
	var $int_cur_position = null;
	var $int_nbr_row = null;
	var $int_num_result = null;
	var $str_ext_argv = null;
	public function Paging($int_nbr_row, $int_cur_position, $int_num_result, $str_ext_argv=""){}

	public function getCurrentPage(){}

	public function getNumberOfPage(){}

	public function getPagingArray(){}

	public function getPagingRowArray(){}

}
class Snoopy{
	var $_fp_timeout = "30";
	var $_framedepth = "0";
	var $_frameurls = array();
	var $_httpmethod = "GET";
	var $_httpversion = "HTTP/1.0";
	var $_isproxy = false;
	var $_maxlinelen = "4096";
	var $_mime_boundary = "";
	var $_redirectaddr = false;
	var $_redirectdepth = "0";
	var $_submit_method = "POST";
	var $_submit_type = "application/x-www-form-urlencoded";
	var $accept = "image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */*";
	var $agent = "Snoopy v1.2.4";
	var $cookies = array();
	var $curl_path = "/usr/local/bin/curl";
	var $error = "";
	var $expandlinks = true;
	var $headers = array();
	var $host = "www.php.net";
	var $lastredirectaddr = "";
	var $maxframes = "0";
	var $maxlength = "500000";
	var $maxredirs = "5";
	var $offsiteok = true;
	var $pass = "";
	var $passcookies = true;
	var $port = "80";
	var $proxy_host = "";
	var $proxy_pass = "";
	var $proxy_port = "";
	var $proxy_user = "";
	var $rawheaders = array();
	var $read_timeout = "0";
	var $referer = "";
	var $response_code = "";
	var $results = "";
	var $status = "0";
	var $temp_dir = "/tmp";
	var $timed_out = false;
	var $user = "";
	public function _check_timeout($fp){}

	public function _connect($fp){}

	public function _disconnect($fp){}

	public function _expandlinks($links, $URI){}

	public function _httprequest($url, $fp, $URI, $http_method, $content_type="", $body=""){}

	public function _httpsrequest($url, $URI, $http_method, $content_type="", $body=""){}

	public function _prepare_post_body($formvars, $formfiles){}

	public function _stripform($document){}

	public function _striplinks($document){}

	public function _striptext($document){}

	public function fetch($URI){}

	public function fetchform($URI){}

	public function fetchlinks($URI){}

	public function fetchtext($URI){}

	public function set_submit_multipart(){}

	public function set_submit_normal(){}

	public function setcookies(){}

	public function submit($URI, $formvars="", $formfiles=""){}

	public function submitlinks($URI, $formvars="", $formfiles=""){}

	public function submittext($URI, $formvars="", $formfiles=""){}

}
class RSSCache{
	var $BASE_CACHE = "./cache";
	var $ERROR = "";
	var $MAX_AGE = "3600";
	public function RSSCache($base="", $age=""){}

	public function cache_age($cache_key){}

	public function check_cache($url){}

	public function debug($debugmsg, $lvl="1024"){}

	public function error($errormsg, $lvl="512"){}

	public function file_name($url){}

	public function get($url){}

	public function serialize($rss){}

	public function set($url, $rss){}

	public function unserialize($data){}

}
class MagpieRSS{
	var $ERROR = "";
	var $WARNING = "";
	var $_CONTENT_CONSTRUCTS = array('content', 'summary', 'info', 'title', 'tagline', 'copyright');
	var $_KNOWN_ENCODINGS = array('UTF-8', 'US-ASCII', 'ISO-8859-1');
	var $_source_encoding = "";
	var $channel = array();
	var $current_item = array();
	var $current_namespace = false;
	var $encoding = "";
	var $feed_type = null;
	var $feed_version = null;
	var $image = array();
	var $inchannel = false;
	var $incontent = false;
	var $inimage = false;
	var $initem = false;
	var $intextinput = false;
	var $items = array();
	var $parser = null;
	var $stack = array();
	var $textinput = array();
	/**
	* Set up XML parser, parse source, and return populated RSS object.
	*
	* @param string $source
	*
	*/
	public function MagpieRSS($source, $output_encoding="ISO-8859-1", $input_encoding=null, $detect_encoding=true){}

	public function append($el, $text){}

	public function append_content($text){}

	public function concat($str1, $str2=""){}

	/**
	* return XML parser, and possibly re-encoded source
	*/
	public function create_parser($source, $out_enc, $in_enc, $detect){}

	public function error($errormsg, $lvl="512"){}

	public function feed_cdata($p, $text){}

	public function feed_end_element($p, $el){}

	public function feed_start_element($p, $element, $attrs){}

	public function is_atom(){}

	public function is_rss(){}

	public function known_encoding($enc){}

	public function normalize(){}

	/**
	* Instaniate an XML parser under PHP4
	*/
	public function php4_create_parser($source, $in_enc, $detect){}

	/**
	* Instantiate an XML parser under PHP5
	*/
	public function php5_create_parser($in_enc, $detect){}

}
class OldFunctions{
	public function affectedRows($rs){}

	public function changePassword($o, $n){}

	public function dbClose(){}

	public function dbConnect(){}

	public function dbExtConnect($host, $user, $pass, $dbase){}

	public function dbQuery($sql){}

	public function fetchRow($rs, $mode="assoc"){}

	public function getDocGroups(){}

	public function getExtTableRows($host="", $user="", $pass="", $dbase="", $fields="*", $from="", $where="", $sort="", $dir="ASC", $limit=""){}

	public function getFormVars($method, $prefix, $trim, $REQUEST_METHOD){}

	public function getIntTableRows($fields="*", $from="", $where="", $sort="", $dir="ASC", $limit=""){}

	public function getKeywords($id="0"){}

	public function getMETATags($id="0"){}

	public function getUserData(){}

	public function insertId($rs){}

	public function insideManager(){}

	public function makeFriendlyURL($pre, $suff, $alias, $isfolder="0", $id="0"){}

	public function makeList($array, $ulroot="root", $ulprefix="sub_", $type="", $ordered=false, $tablevel="0"){}

	public function mergeDocumentMETATags($template){}

	public function putChunk($chunkName){}

	public function putExtTableRow($host="", $user="", $pass="", $dbase="", $fields="", $into=""){}

	public function putIntTableRow($fields="", $into=""){}

	public function recordCount($rs){}

	public function updExtTableRow($host="", $user="", $pass="", $dbase="", $fields="", $into="", $where="", $sort="", $dir="ASC", $limit=""){}

	public function updIntTableRow($fields="", $into="", $where="", $sort="", $dir="ASC", $limit=""){}

	public function userLoggedIn(){}

}
