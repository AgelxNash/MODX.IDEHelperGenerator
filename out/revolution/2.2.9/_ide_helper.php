<?php die("IDE Helper for MODX");

if (!defined('MODX_BASE_PATH')) define('MODX_BASE_PATH', 'base_path');
if (!defined('MODX_BASE_URL')) define('MODX_BASE_URL', '/');

if (!defined('MODX_CORE_PATH')) define('MODX_CORE_PATH', MODX_BASE_PATH . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
if (!defined('MODX_CONFIG_KEY')) define('MODX_CONFIG_KEY', 'config');

if (!defined('MODX_PROCESSORS_PATH')) define('MODX_PROCESSORS_PATH', MODX_CORE_PATH . DIRECTORY_SEPARATOR . 'model/modx/processors/' . DIRECTORY_SEPARATOR );

if (!defined('MODX_CONNECTORS_PATH')) define('MODX_CONNECTORS_PATH', MODX_BASE_PATH . DIRECTORY_SEPARATOR . 'connectors' . DIRECTORY_SEPARATOR);
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

$modx = new modX();

class xPDO{
	/** 
	* A global cache flag that can be used to enable/disable all xPDO caching.
	* @var boolean All caching is disabled by default.
	*/
	var $_cacheEnabled = false;
	/** 
	* Indicates the closing escape character used for a particular database engine.
	* @var string
	*/
	var $_escapeCharClose = "";
	/** 
	* Indicates the opening escape character used for a particular database engine.
	* @var string
	*/
	var $_escapeCharOpen = "";
	/** 
	* Represents the character used for quoting strings for a particular driver.
	* @var string
	*/
	var $_quoteChar = "'";
	/** 
	* @var xPDOCacheManager The cache service provider registered for this xPDO
instance.
	*/
	var $cacheManager = null;
	var $classMap = array();
	/** 
	* @var array Configuration options for the xPDO instance.
	*/
	var $config = null;
	/** 
	* @var xPDOConnection The current xPDOConnection for this xPDO instance.
	*/
	var $connection = null;
	/** 
	* @var xPDODriver An xPDODriver instance for the xPDOConnection instances to use.
	*/
	var $driver = null;
	/** 
	* @var int The number of direct DB queries executed during a request.
	*/
	var $executedQueries = "0";
	/** 
	* {@link xPDOManager} instance, loaded only if needed to manage datasource containers, data structures, etc.
	* @var xPDOManager
	*/
	var $manager = null;
	/** 
	* A map of data source meta data for all loaded classes.
	* @var array
	*/
	var $map = array();
	/** 
	* A default package for specifying classes by name.
	* @var string
	*/
	var $package = "";
	/** 
	* An array storing packages and package-specific information.
	* @var array
	*/
	var $packages = array();
	/** 
	* @var PDO A reference to the PDO instance used by the current xPDOConnection.
	*/
	var $pdo = null;
	/** 
	* @var int The amount of request handling time spent with DB queries.
	*/
	var $queryTime = "0";
	/** 
	* @var array An array of supplemental service classes for this xPDO instance.
	*/
	var $services = array();
	/** 
	* @var float Start time of the request, initialized when the constructor is
called.
	*/
	var $startTime = "0";
	/**
	* Add an xPDOConnection instance to the xPDO connection pool.
	*
	* @param string $dsn
	* @param string $username
	* @param string $password
	* @param array $options
	* @param null $driverOptions
	*
	* @return boolean
	*/
	public function addConnection($dsn, $username="", $password="", $options=array(), $driverOptions=null){}

	/**
	* Add criteria when requesting a derivative class row automatically.
	*
	* @param string $className
	* @param \xPDOQuery $criteria
	*
	* @return \xPDOQuery
	*/
	public function addDerivativeCriteria($className, $criteria){}

	/**
	* Adds a model package and base class path for including classes and/or maps from.
	*
	* @param string $pkg
	* @param string $path
	* @param string $prefix
	*
	* @return bool
	*/
	public function addPackage($pkg="", $path="", $prefix=null){}

	public function beginTransaction(){}

	/**
	* Call a static method from a valid package class with arguments.
	*
	* @param string $class
	* @param string $method
	* @param array $args
	* @param boolean $transient
	*
	* @return mixed|null
	*/
	public function call($class, $method, $args=array(), $transient=false){}

	public function commit(){}

	/**
	* Get or create a PDO connection to a database specified in the configuration.
	*
	* @param array $driverOptions
	* @param array $options
	*
	* @return boolean
	*/
	public function connect($driverOptions=array(), $options=array()){}

	public function errorCode(){}

	public function errorInfo(){}

	/**
	* Splits a string on a specified character, ignoring escaped content.
	*
	* @param string $char
	* @param string $str
	* @param string $escToken
	* @param integer $limit
	*
	* @return array
	*/
	public function escSplit($char, $str, $escToken="`", $limit="0"){}

	/**
	* Escapes the provided string using the platform-specific escape character.
	*
	* @param string $string
	*
	* @return string
	*/
	public function escape($string){}

	public function exec($query){}

	/**
	* Retrieves a result array from the object cache.
	*
	* @param string $signature
	* @param string $class
	* @param array $options
	*
	* @return array|string|null
	*/
	public function fromCache($signature, $class="", $options=array()){}

	/**
	* Converts a JSON source string into an equivalent PHP representation.
	*
	* @param string $src
	* @param boolean $asArray
	*
	* @return mixed
	*/
	public function fromJSON($src, $asArray=true){}

	/**
	* Gets a collection of aggregate foreign key relationship definitions.
	*
	* @param string $className
	*
	* @return array
	*/
	public function getAggregates($className){}

	/**
	* Retrieves the complete ancestry for a class.
	*
	* @param string $className
	* @param bool $includeSelf
	*
	* @return array
	*/
	public function getAncestry($className, $includeSelf=true){}

	public function getAttribute($attribute){}

	/**
	* Gets an xPDOCacheManager instance.
	*
	* @param string $class
	* @param array $options
	*
	* @return \xPDOCacheManager
	*/
	public function getCacheManager($class="cache.xPDOCacheManager", $options=array()){}

	/**
	* Gets the absolute path to the cache directory.
	* @return string
	*/
	public function getCachePath(){}

	/**
	* Retrieves a collection of xPDOObjects by the specified xPDOCriteria.
	*
	* @param string $className
	* @param object $criteria
	* @param mixed $cacheFlag
	*
	* @return array|null
	*/
	public function getCollection($className, $criteria=null, $cacheFlag=true){}

	/**
	* Retrieves a collection of xPDOObject instances with related objects.
	*
	* @param string $className
	* @param string $graph
	* @param mixed $criteria
	* @param boolean $cacheFlag
	*
	* @return array
	*/
	public function getCollectionGraph($className, $graph, $criteria=null, $cacheFlag=true){}

	/**
	* Gets a collection of composite foreign key relationship definitions.
	*
	* @param string $className
	*
	* @return array
	*/
	public function getComposites($className){}

	/**
	* Get an xPDOConnection from the xPDO connection pool.
	*
	* @param array $options
	*
	* @return \xPDOConnection|null
	*/
	public function getConnection($options=array()){}

	/**
	* Retrieves a count of xPDOObjects by the specified xPDOCriteria.
	*
	* @param string $className
	* @param mixed $criteria
	*
	* @return integer
	*/
	public function getCount($className, $criteria=null){}

	/**
	* Convert any valid criteria into an xPDOQuery instance.
	*
	* @param string $className
	* @param string $type
	* @param boolean $cacheFlag
	*
	* @return \xPDOCriteria
	*/
	public function getCriteria($className, $type=null, $cacheFlag=true){}

	/**
	* Validate and return the type of a specified criteria variable.
	*
	* @param mixed $criteria
	*
	* @return string|null
	*/
	public function getCriteriaType($criteria){}

	/**
	* Returns the debug state for the xPDO instance.
	* @return boolean
	*/
	public function getDebug(){}

	/**
	* Returns an abbreviated backtrace of debugging information.
	* @return array
	*/
	public function getDebugBacktrace(){}

	/**
	* Gets a list of derivative classes for the specified className.
	*
	* @param string $className
	*
	* @return array
	*/
	public function getDescendants($className){}

	/**
	* Gets the driver class for this xPDO connection.
	* @return \xPDODriver|null
	*/
	public function getDriver(){}

	/**
	* Gets an aggregate or composite relation definition from a class.
	*
	* @param string $parentClass
	* @param string $alias
	*
	* @return array
	*/
	public function getFKDefinition($parentClass, $alias){}

	/**
	* Gets a collection of field aliases for an object by class name.
	*
	* @param string $className
	*
	* @return array
	*/
	public function getFieldAliases($className){}

	/**
	* Gets a list of field (or column) definitions for an object by class name.
	*
	* @param string $className
	* @param boolean $includeExtended
	*
	* @return array
	*/
	public function getFieldMeta($className, $includeExtended=false){}

	/**
	* Gets a list of fields (or columns) for an object by class name.
	*
	* @param string $className
	*
	* @return array
	*/
	public function getFields($className){}

	/**
	* Get a complete relation graph for an xPDOObject class.
	*
	* @param string $className
	* @param int $depth
	*
	* @return array
	*/
	public function getGraph($className, $depth="3", $parents=array(), $visited=array()){}

	/**
	* Get indices defined for a table class.
	*
	* @param string $className
	*
	* @return array
	*/
	public function getIndexMeta($className){}

	/**
	* Indicates the inheritance model for the xPDOObject class specified.
	*
	* @param string $className
	*
	* @return string
	*/
	public function getInherit($className){}

	/**
	* Create, retrieve, or update specific xPDO instances.
	*
	* @param string $id
	* @param array $config
	* @param bool $forceNew
	*
	* @return \xPDO
	*/
	public function getInstance($id=null, $config=null, $forceNew=false){}

	/**
	* Retrieves an iterable representation of a collection of xPDOObjects.
	*
	* @param string $className
	* @param mixed $criteria
	* @param bool $cacheFlag
	*
	* @return \xPDOIterator
	*/
	public function getIterator($className, $criteria=null, $cacheFlag=true){}

	/**
	* @return integer
	*/
	public function getLogLevel(){}

	/**
	* @return integer
	*/
	public function getLogTarget(){}

	/**
	* Gets the manager class for this xPDO connection.
	* @return \xPDOManager|null
	*/
	public function getManager(){}

	/**
	* Convert current microtime() result into seconds.
	* @return float
	*/
	public function getMicroTime(){}

	/**
	* Gets the version string of the schema the specified class was generated from.
	*
	* @param string $className
	*
	* @return string
	*/
	public function getModelVersion($className){}

	/**
	* Retrieves a single object instance by the specified criteria.
	*
	* @param string $className
	* @param mixed $criteria
	* @param mixed $cacheFlag
	*
	* @return object|null
	*/
	public function getObject($className, $criteria=null, $cacheFlag=true){}

	/**
	* Retrieves an xPDOObject instance with specified related objects.
	*
	* @param string $className
	* @param string $graph
	* @param mixed $criteria
	* @param boolean $cacheFlag
	*
	* @return object
	*/
	public function getObjectGraph($className, $graph, $criteria=null, $cacheFlag=true){}

	/**
	* Finds the class responsible for loading instances of the specified class.
	*
	* @param string $className
	* @param string $method
	*
	* @return callable
	*/
	public function getObjectLoader($className, $method){}

	/**
	* Get an xPDO configuration option value by key.
	*
	* @param string $key
	* @param array $options
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getOption($key, $options=null, $default=null, $skipEmpty=false){}

	/**
	* Get the appropriate PDO::PARAM_ type constant from a PHP value.
	*
	* @param mixed $value
	*
	* @return int|null
	*/
	public function getPDOType($value){}

	/**
	* Gets the primary key field(s) for a class.
	*
	* @param string $className
	*
	* @return mixed
	*/
	public function getPK($className){}

	/**
	* Gets the type of primary key field for a class.
	*
	* @param string $className
	* @param mixed $pk
	*
	* @return string
	*/
	public function getPKType($className, $pk=false){}

	/**
	* Gets the package name from a specified class name.
	*
	* @param string $className
	*
	* @return string
	*/
	public function getPackage($className){}

	/**
	* Gets select columns from a specific class for building a query.
	*
	* @param string $className
	* @param string $tableAlias
	* @param string $columnPrefix
	* @param array $columns
	* @param boolean $exclude
	*
	* @return string
	*/
	public function getSelectColumns($className, $tableAlias="", $columnPrefix="", $columns=array(), $exclude=false){}

	/**
	* Load and return a named service class instance.
	*
	* @param string $name
	* @param string $class
	* @param string $path
	* @param array $params
	*
	* @return object|null
	*/
	public function getService($name, $class="", $path="", $params=array()){}

	/**
	* Get the class which defines the table for a specified className.
	*
	* @param string $className
	*
	* @return null|string
	*/
	public function getTableClass($className){}

	/**
	* Gets the actual run-time table metadata from a specified class name.
	*
	* @param string $className
	*
	* @return string
	*/
	public function getTableMeta($className){}

	/**
	* Gets the actual run-time table name from a specified class name.
	*
	* @param string $className
	* @param boolean $includeDb
	*
	* @return string
	*/
	public function getTableName($className, $includeDb=false){}

	/**
	* Gets a set of validation rules defined for an object by class name.
	*
	* @param string $className
	*
	* @return array
	*/
	public function getValidationRules($className){}

	/**
	* Execute a PDOStatement and get a single column value from the first row of the result set.
	*
	* @param \PDOStatement $stmt
	* @param null $column
	*
	* @return mixed
	*/
	public function getValue($stmt, $column=null){}

	public function lastInsertId(){}

	/**
	* Use to insert a literal string into a SQL query without escaping or quoting.
	*
	* @param string $string
	*
	* @return string
	*/
	public function literal($string){}

	/**
	* Load a class by fully qualified name.
	*
	* @param string $fqn
	* @param string $path
	* @param bool $ignorePkg
	* @param bool $transient
	*
	* @return string|boolean
	*/
	public function loadClass($fqn, $path="", $ignorePkg=false, $transient=false){}

	/**
	* Log a message with details about where and when an event occurs.
	*
	* @param integer $level
	* @param string $msg
	* @param string $target
	* @param string $def
	* @param string $file
	* @param string $line
	*
	*/
	public function log($level, $msg, $target="", $def="", $file="", $line=""){}

	/**
	* Creates a new instance of a specified class.
	*
	* @param string $className
	* @param array $fields
	*
	* @return object|null
	*/
	public function newObject($className, $fields=array()){}

	/**
	* Creates an new xPDOQuery for a specified xPDOObject class.
	*
	* @param string $class
	* @param mixed $criteria
	* @param boolean $cacheFlag
	*
	* @return \xPDOQuery
	*/
	public function newQuery($class, $criteria=null, $cacheFlag=true){}

	/**
	* Parses parameter bindings in SQL prepared statements.
	*
	* @param string $sql
	* @param array $bindings
	*
	* @return string
	*/
	public function parseBindings($sql, $bindings){}

	/**
	* Parses a DSN and returns an array of the connection details.
	*
	* @param string $string
	*
	* @return array
	*/
	public function parseDSN($string){}

	public function prepare($statement, $driver_options=array()){}

	public function query($query){}

	public function quote($string, $parameter_type="2"){}

	/**
	* Remove a collection of instances by the supplied className and criteria.
	*
	* @param string $className
	* @param mixed $criteria
	*
	* @return boolean|integer
	*/
	public function removeCollection($className, $criteria){}

	/**
	* Remove an instance of the specified className by a supplied criteria.
	*
	* @param string $className
	* @param mixed $criteria
	*
	* @return boolean
	*/
	public function removeObject($className, $criteria){}

	public function rollBack(){}

	public function setAttribute($attribute, $value){}

	/**
	* Sets the debug state for the xPDO instance.
	*
	* @param boolean $v
	*
	*/
	public function setDebug($v=true){}

	/**
	* Sets the logging level state for the xPDO instance.
	*
	* @param integer $level
	*
	* @return integer
	*/
	public function setLogLevel($level="0"){}

	/**
	* Sets the log target for xPDO::_log() calls.
	*
	* @param string $target
	*
	* @return mixed
	*/
	public function setLogTarget($target="ECHO"){}

	/**
	* Sets an xPDO configuration option value.
	*
	* @param string $key
	* @param mixed $value
	*
	*/
	public function setOption($key, $value){}

	/**
	* Sets a specific model package to use when looking up classes.
	*
	* @param string $pkg
	* @param string $path
	* @param string $prefix
	*
	* @return bool
	*/
	public function setPackage($pkg="", $path="", $prefix=null){}

	/**
	* Adds metadata information about a package and loads the xPDO::$classMap.
	*
	* @param string $pkg
	* @param string $path
	*
	* @return bool
	*/
	public function setPackageMeta($pkg, $path=""){}

	/**
	* Places a result set in the object cache.
	*
	* @param string $signature
	* @param object $object
	* @param integer $lifetime
	* @param array $options
	*
	* @return boolean
	*/
	public function toCache($signature, $object, $lifetime="0", $options=array()){}

	/**
	* Converts a PHP array into a JSON encoded string.
	*
	* @param array $array
	*
	* @return string
	*/
	public function toJSON($array){}

	/**
	* Update field values across a collection of xPDOObjects.
	*
	* @param string $className
	* @param array $set
	* @param mixed $criteria
	*
	* @return bool|int
	*/
	public function updateCollection($className, $set, $criteria=null){}

}
class xPDOCriteria{
	var $bindings = array();
	var $cacheFlag = false;
	var $sql = "";
	var $stmt = null;
	/**
	* Binds an array of key/value pairs to the xPDOCriteria prepared statement.
	*
	* @param array $bindings
	* @param boolean $byValue
	* @param boolean $cacheFlag
	*
	*/
	public function bind($bindings=array(), $byValue=true, $cacheFlag=false){}

	/**
	* Compares to see if two xPDOCriteria instances are the same.
	*
	* @param object $obj
	*
	* @return boolean
	*/
	public function equals($obj){}

	/**
	* Prepares the sql and bindings of this instance into a PDOStatement.
	*
	* @param array $bindings
	* @param boolean $byValue
	* @param boolean $cacheFlag
	*
	* @return \PDOStatement
	*/
	public function prepare($bindings=array(), $byValue=true, $cacheFlag=null){}

	/**
	* Converts the current xPDOQuery to parsed SQL.
	* @return string
	*/
	public function toSQL(){}

}
class xPDOConnection{
	/** 
	* @var array An array of configuration options for this connection.
	*/
	var $config = array();
	/** 
	* @var PDO The PDO object represented by the xPDOConnection instance.
	*/
	var $pdo = null;
	/** 
	* @var xPDO A reference to a valid xPDO instance.
	*/
	var $xpdo = null;
	/**
	* Actually make a connection for this instance via PDO.
	*
	* @param array $driverOptions
	*
	* @return bool
	*/
	public function connect($driverOptions=array()){}

	/**
	* Get an option set for this xPDOConnection instance.
	*
	* @param string $key
	* @param array $options
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getOption($key, $options=null, $default=null){}

	/**
	* Indicates if the connection can be written to, e.g. INSERT/UPDATE/DELETE.
	* @return bool
	*/
	public function isMutable(){}

}
class xPDOException extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class xPDOIterator implements Iterator,Traversable{
	public function current(){}

	public function key(){}

	public function next(){}

	public function rewind(){}

	public function valid(){}

}
class xPDOValidator{
	var $messages = array();
	var $object = null;
	var $results = array();
	/**
	* Add a validation message to the stack.
	*
	* @param string $field
	* @param string $name
	* @param mixed $message
	*
	*/
	public function addMessage($field, $name, $message=null){}

	/**
	* Get the validation messages generated by validate().
	* @return array
	*/
	public function getMessages(){}

	/**
	* Get the validation results generated by validate().
	* @return array
	*/
	public function getResults(){}

	/**
	* Indicates validation messages were generated by validate().
	* @return boolean
	*/
	public function hasMessages(){}

	/**
	* Reset the validation results and messages.
	*/
	public function reset(){}

	/**
	* Executes validation against the object attached to this validator.
	*
	* @param array $parameters
	*
	* @return boolean
	*/
	public function validate($parameters=array()){}

}
class xPDOValidationRule{
	var $field = "";
	var $message = "";
	var $name = "";
	var $validator = null;
	/**
	* The public method for executing a validation rule.
	*
	* @param mixed $value
	* @param array $options
	*
	* @return boolean
	*/
	public function isValid($value, $options=array()){}

	/**
	* Set the failure message for the rule.
	*
	* @param string $message
	*
	*/
	public function setMessage($message=""){}

}
class xPDOMinLengthValidationRule extends xPDOValidationRule{
}
class xPDOMaxLengthValidationRule extends xPDOValidationRule{
}
class xPDOMinValueValidationRule extends xPDOValidationRule{
}
class xPDOMaxValueValidationRule extends xPDOValidationRule{
}
class xPDOObjectExistsValidationRule extends xPDOValidationRule{
}
class xPDOForeignKeyConstraint extends xPDOValidationRule{
}
class xPDOObject{
	/** 
	* An array of aggregate foreign key relationships for the class.
	* @var array
	*/
	var $_aggregates = array();
	/** 
	* An alias for this instance of the class.
	* @var string
	*/
	var $_alias = null;
	/** 
	* Indicates the cacheability of the instance.
	* @var boolean
	*/
	var $_cacheFlag = true;
	/** 
	* The actual class name of an instance.
	* @var string
	*/
	var $_class = null;
	/** 
	* An array of composite foreign key relationships for the class.
	* @var array
	*/
	var $_composites = array();
	/** 
	* An array of field names that have been modified.
	* @var array
	*/
	var $_dirty = array();
	/** 
	* An optional array of field aliases.
	* @var array
	*/
	var $_fieldAliases = array();
	/** 
	* An array of metadata definitions for each field in the class.
	* @var array
	*/
	var $_fieldMeta = array();
	/** 
	* An array of key-value pairs representing the fields of the instance.
	* @var array
	*/
	var $_fields = array();
	/** 
	* An array of field names that have not been loaded from the source.
	* @var array
	*/
	var $_lazy = array();
	/** 
	* Indicates if the instance is transient (and thus new).
	* @var boolean
	*/
	var $_new = true;
	/** 
	* A collection of various options that can be used on the instance.
	* @var array
	*/
	var $_options = array();
	/** 
	* The package the class is a part of.
	* @var string
	*/
	var $_package = null;
	/** 
	* The primary key field (or an array of primary key fields) for this object.
	* @var string|array
	*/
	var $_pk = null;
	/** 
	* The php native type of the primary key field.
	* @var string|array
	*/
	var $_pktype = null;
	/** 
	* An array of object instances related to this object instance.
	* @var array
	*/
	var $_relatedObjects = array();
	/** 
	* Name of the actual table representing this class.
	* @var string
	*/
	var $_table = null;
	/** 
	* An array of meta data for the table.
	* @var string
	*/
	var $_tableMeta = null;
	/** 
	* An array of field names that have been already validated.
	* @var array
	*/
	var $_validated = array();
	/** 
	* Indicates if the validation map has been loaded.
	* @var boolean
	*/
	var $_validationLoaded = false;
	/** 
	* An array of validation rules for this object instance.
	* @var array
	*/
	var $_validationRules = array();
	/** 
	* A validator object responsible for this object instance.
	* @var xPDOValidator
	*/
	var $_validator = null;
	/** 
	* Name of the data source container the object belongs to.
	* @var string
	*/
	var $container = null;
	/** 
	* Names of the fields in the data table, fully-qualified with a table name.
	* @var array
	*/
	var $fieldNames = null;
	/** 
	* A convenience reference to the xPDO object.
	* @var xPDO
	*/
	var $xpdo = null;
	/**
	* Responsible for loading an instance into a collection.
	*
	* @param xPDO $xpdo
	* @param string $className
	* @param mixed $criteria
	* @param array $row
	* @param bool $fromCache
	* @param bool $cacheFlag
	*
	* @return bool
	*/
	public function _loadCollectionInstance($xpdo, $objCollection, $className, $criteria, $row, $fromCache, $cacheFlag=true){}

	/**
	* Loads an instance from an associative array.
	*
	* @param string $className
	* @param \xPDOQuery $criteria
	* @param array $row
	*
	* @return \xPDOObject
	*/
	public function _loadInstance($xpdo, $className, $criteria, $row){}

	/**
	* Responsible for loading a result set from the database.
	*
	* @param string $className
	* @param \xPDOCriteria $criteria
	*
	* @return \PDOStatement
	*/
	public function _loadRows($xpdo, $className, $criteria){}

	/**
	* Used to load validation from the object map.
	*
	* @param boolean $reload
	*
	*/
	public function _loadValidation($reload=false){}

	/**
	* Add an alias as a reference to an actual field of the object.
	*
	* @param string $field
	* @param string $alias
	*
	* @return bool
	*/
	public function addFieldAlias($field, $alias){}

	/**
	* Adds an object or collection of objects related to this class.
	*
	* @param string $alias
	*
	* @return boolean
	*/
	public function addMany($obj, $alias=""){}

	/**
	* Adds an object related to this instance by a foreign key relationship.
	*
	* @param string $alias
	*
	* @return boolean
	*/
	public function addOne($obj, $alias=""){}

	/**
	* Add a validation rule to an object field for this instance.
	*
	* @param string $field
	* @param string $name
	* @param string $type
	* @param string $rule
	* @param array $parameters
	*
	*/
	public function addValidationRule($field, $name, $type, $rule, $parameters=array()){}

	/**
	* Encodes a string using the specified algorithm.
	*
	* @param string $source
	* @param string $type
	*
	* @return string
	*/
	public function encode($source, $type="md5"){}

	/**
	* Sets object fields from an associative array of key => value pairs.
	*
	* @param array $fldarray
	* @param string $keyPrefix
	* @param boolean $setPrimaryKeys
	* @param boolean $rawValues
	* @param boolean $adhocValues
	*
	*/
	public function fromArray($fldarray, $keyPrefix="", $setPrimaryKeys=false, $rawValues=false, $adhocValues=false){}

	/**
	* Sets the object fields from a JSON object string.
	*
	* @param string $jsonSource
	* @param string $keyPrefix
	* @param boolean $setPrimaryKeys
	* @param boolean $rawValues
	* @param boolean $adhocValues
	*
	*/
	public function fromJSON($jsonSource, $keyPrefix="", $setPrimaryKeys=false, $rawValues=false, $adhocValues=false){}

	/**
	* Get a field value (or a set of values) by the field key(s) or name(s).
	*
	* @param string $k
	* @param string $format
	* @param mixed $formatTemplate
	*
	* @return mixed
	*/
	public function get($k, $format=null, $formatTemplate=null){}

	/**
	* Get the name of a class related by foreign key to a specified field key.
	*
	* @param string $k
	*
	*/
	public function getFKClass($k){}

	/**
	* Get a foreign key definition for a specific classname.
	*
	* @param string $alias
	*
	* @return array
	*/
	public function getFKDefinition($alias){}

	/**
	* Get a field name, looking up any by alias if not an actual field.
	*
	* @param string $key
	* @param bool $validate
	*
	* @return string|bool
	*/
	public function getField($key, $validate=false){}

	/**
	* Gets a field name as represented in the database container.
	*
	* @param string $k
	* @param string $alias
	*
	* @return string
	*/
	public function getFieldName($k, $alias=null){}

	/**
	* Load a graph of related objects to the current object.
	*
	* @param boolean $graph
	* @param \xPDOCriteria $criteria
	* @param boolean $cacheFlag
	*
	* @return array|boolean
	*/
	public function getGraph($graph=true, $criteria=null, $cacheFlag=true){}

	/**
	* Get an xPDOIterator for a collection of objects related by aggregate or composite relations.
	*
	* @param string $alias
	* @param null $criteria
	* @param bool $cacheFlag
	*
	* @return bool|\xPDOIterator
	*/
	public function getIterator($alias, $criteria=null, $cacheFlag=true){}

	/**
	* Gets a collection of objects related by aggregate or composite relations.
	*
	* @param string $alias
	* @param object $criteria
	* @param boolean $cacheFlag
	*
	* @return array
	*/
	public function getMany($alias, $criteria=null, $cacheFlag=true){}

	/**
	* Gets an object related to this instance by a foreign key relationship.
	*
	* @param string $alias
	* @param object $criteria
	* @param boolean $cacheFlag
	*
	* @return \xPDOObject|null
	*/
	public function getOne($alias, $criteria=null, $cacheFlag=true){}

	/**
	* Get an option value for this instance.
	*
	* @param string $key
	* @param array $options
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getOption($key, $options=null, $default=null){}

	/**
	* Gets the name (or names) of the primary key field(s) for the object.
	* @return mixed
	*/
	public function getPK(){}

	/**
	* Gets the type of the primary key field for the object.
	* @return string
	*/
	public function getPKType(){}

	/**
	* Gets the value (or values) of the primary key field(s) for the object.
	*
	* @param boolean $validateCompound
	*
	* @return mixed
	*/
	public function getPrimaryKey($validateCompound=true){}

	/**
	* Get a set of column names from an xPDOObject for use in SQL queries.
	*
	* @param xPDO $xpdo
	* @param string $className
	* @param string $tableAlias
	* @param string $columnPrefix
	* @param array $columns
	* @param boolean $exclude
	*
	* @return string
	*/
	public function getSelectColumns($xpdo, $className, $tableAlias="", $columnPrefix="", $columns=array(), $exclude=false){}

	/**
	* Get the xPDOValidator class configured for this instance.
	* @return string|boolean
	*/
	public function getValidator(){}

	/**
	* Indicates if an object field has been modified (or never saved).
	*
	* @param string $key
	*
	* @return boolean
	*/
	public function isDirty($key){}

	/**
	* Indicates if the object or specified field is lazy.
	*
	* @param string $key
	*
	* @return boolean
	*/
	public function isLazy($key=""){}

	/**
	* Indicates if the instance is new, and has not yet been persisted.
	* @return boolean
	*/
	public function isNew(){}

	/**
	* Indicates if the object or specified field has been validated.
	*
	* @param string $key
	*
	* @return boolean
	*/
	public function isValidated($key=""){}

	/**
	* Load an instance of an xPDOObject or derivative class.
	*
	* @param xPDO $xpdo
	* @param string $className
	* @param mixed $criteria
	* @param boolean $cacheFlag
	*
	* @return object|null
	*/
	public function load($xpdo, $className, $criteria, $cacheFlag=true){}

	/**
	* Load a collection of xPDOObject instances.
	*
	* @param xPDO $xpdo
	* @param string $className
	* @param mixed $criteria
	* @param boolean $cacheFlag
	*
	* @return array
	*/
	public function loadCollection($xpdo, $className, $criteria=null, $cacheFlag=true){}

	/**
	* Load a collection of xPDOObject instances and a graph of related objects.
	*
	* @param xPDO $xpdo
	* @param string $className
	* @param string $graph
	* @param mixed $criteria
	* @param boolean $cacheFlag
	*
	* @return array
	*/
	public function loadCollectionGraph($xpdo, $className, $graph, $criteria, $cacheFlag){}

	/**
	* Remove the persistent instance of an object permanently.
	*
	* @param array $ancestors
	*
	* @return boolean
	*/
	public function remove($ancestors=array()){}

	/**
	* Remove one or more validation rules from this instance.
	*
	* @param string $field
	* @param array $rules
	*
	*/
	public function removeValidationRules($field=null, $rules=array()){}

	/**
	* Persist new or changed objects to the database container.
	*
	* @param boolean $cacheFlag
	*
	* @return boolean
	*/
	public function save($cacheFlag=null){}

	/**
	* Set a field value by the field key or name.
	*
	* @param string $k
	* @param mixed $v
	* @param string $vType
	*
	* @return boolean
	*/
	public function set($k, $v=null, $vType=""){}

	/**
	* Add the field to a collection of field keys that have been modified.
	*
	* @param string $key
	*
	*/
	public function setDirty($key=""){}

	/**
	* Set an option value for this instance.
	*
	* @param string $key
	* @param mixed $value
	*
	*/
	public function setOption($key, $value){}

	/**
	* Copies the object fields and corresponding values to an associative array.
	*
	* @param string $keyPrefix
	* @param boolean $rawValues
	* @param boolean $excludeLazy
	* @param boolean $includeRelated
	*
	* @return array
	*/
	public function toArray($keyPrefix="", $rawValues=false, $excludeLazy=false, $includeRelated=false){}

	/**
	* Returns a JSON representation of the object.
	*
	* @param string $keyPrefix
	* @param boolean $rawValues
	*
	* @return string
	*/
	public function toJSON($keyPrefix="", $rawValues=false){}

	/**
	* Validate the field values using an xPDOValidator.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function validate($options=array()){}

}
class xPDOSimpleObject extends xPDOObject{
}
abstract class xPDOQuery extends xPDOCriteria{
	var $graph = array();
	var $query = array();
	public function andCondition($conditions, $binding=null, $group="0"){}

	/**
	* Bind an object graph to the query.
	*
	* @param mixed $graph
	*
	* @return \xPDOQuery
	*/
	public function bindGraph($graph){}

	/**
	* Bind the node of an object graph to the query.
	*
	* @param string $parentClass
	* @param string $parentAlias
	* @param string $classAlias
	* @param array $relations
	*
	*/
	public function bindGraphNode($parentClass, $parentAlias, $classAlias, $relations){}

	/**
	* Builds conditional clauses from xPDO condition expressions.
	*
	* @param array $conditions
	* @param string $conjunction
	* @param boolean $isFirst
	*
	* @return string
	*/
	public function buildConditionalClause($conditions, $conjunction="AND", $isFirst=true){}

	/**
	* Set the type of SQL command you want to build.
	*
	* @param string $command
	*
	* @return \xPDOQuery
	*/
	public function command($command="SELECT"){}

	/**
	* Add a condition to the query.
	*
	* @param string $target
	* @param mixed $conditions
	* @param string $conjunction
	* @param mixed $binding
	* @param integer $condGroup
	*
	* @return \xPDOQuery
	*/
	public function condition($target, $conditions="1", $conjunction="AND", $binding=null, $condGroup="0"){}

	/**
	* Constructs the SQL query from the xPDOQuery definition.
	* @return boolean
	*/
	public function construct(){}

	/**
	* Set the DISTINCT attribute of the query.
	*
	* @param null $on
	*
	* @return \xPDOQuery
	*/
	public function distinct($on=null){}

	/**
	* Add a FROM clause to the query.
	*
	* @param string $class
	* @param string $alias
	*
	* @return \xPDOQuery
	*/
	public function from($class, $alias=""){}

	public function getAlias(){}

	public function getClass(){}

	public function getTableClass(){}

	/**
	* Add an GROUP BY clause to the query.
	*
	* @param string $column
	* @param string $direction
	*
	* @return \xPDOQuery
	*/
	public function groupby($column, $direction=""){}

	public function having($conditions){}

	/**
	* Hydrates a graph of related objects from a single result set.
	*
	* @param array $rows
	* @param bool $cacheFlag
	*
	* @return array
	*/
	public function hydrateGraph($rows, $cacheFlag=true){}

	/**
	* Hydrates a node of the object graph.
	*
	* @param array $row
	* @param \xPDOObject $instance
	* @param string $alias
	* @param array $relations
	*
	*/
	public function hydrateGraphNode($row, $instance, $alias, $relations){}

	public function hydrateGraphParent($instances, $row){}

	public function innerJoin($class, $alias="", $conditions=array(), $conjunction="AND", $binding=null, $condGroup="0"){}

	/**
	* Determines if a string contains a conditional operator.
	*
	* @param string $string
	*
	* @return boolean
	*/
	public function isConditionalClause($string){}

	/**
	* Join a table represented by the specified class.
	*
	* @param string $class
	* @param string $alias
	* @param string $type
	* @param mixed $conditions
	* @param string $conjunction
	* @param array $binding
	* @param int $condGroup
	*
	* @return \xPDOQuery
	*/
	public function join($class, $alias="", $type="JOIN", $conditions=array(), $conjunction="AND", $binding=null, $condGroup="0"){}

	public function leftJoin($class, $alias="", $conditions=array(), $conjunction="AND", $binding=null, $condGroup="0"){}

	/**
	* Add a LIMIT/OFFSET clause to the query.
	*
	* @param integer $limit
	* @param integer $offset
	*
	* @return \xPDOQuery
	*/
	public function limit($limit, $offset="0"){}

	public function orCondition($conditions, $binding=null, $group="0"){}

	/**
	* Parses an xPDO condition expression into one or more xPDOQueryConditions.
	*
	* @param mixed $conditions
	* @param string $conjunction
	*
	* @return array|\xPDOQueryCondition
	*/
	public function parseConditions($conditions, $conjunction="AND"){}

	public function rightJoin($class, $alias="", $conditions=array(), $conjunction="AND", $binding=null, $condGroup="0"){}

	/**
	* Specify columns to return from the SQL query.
	*
	* @param string $columns
	*
	* @return \xPDOQuery
	*/
	public function select($columns="*"){}

	/**
	* Specify the SET clause(s) for a SQL UPDATE query.
	*
	* @param array $values
	*
	* @return \xPDOQuery
	*/
	public function set($values){}

	/**
	* Sets a SQL alias for the table represented by the main class.
	*
	* @param string $alias
	*
	* @return \xPDOQuery
	*/
	public function setClassAlias($alias=""){}

	/**
	* Add an ORDER BY clause to the query.
	*
	* @param string $column
	* @param string $direction
	*
	* @return \xPDOQuery
	*/
	public function sortby($column, $direction="ASC"){}

	/**
	* Add a WHERE condition to the query.
	*
	* @param mixed $conditions
	* @param string $conjunction
	* @param mixed $binding
	* @param integer $condGroup
	*
	* @return \xPDOQuery
	*/
	public function where($conditions="", $conjunction="AND", $binding=null, $condGroup="0"){}

	/**
	* Wrap an existing xPDOCriteria into this xPDOQuery instance.
	*
	* @param \xPDOCriteria $criteria
	*
	*/
	public function wrap($criteria){}

}
class xPDOQueryCondition{
	/** 
	* @var array An array of value/parameter bindings for the condition.
	*/
	var $binding = array();
	/** 
	* @var string The conjunction identifying how the condition is related to the previous condition(s).
	*/
	var $conjunction = "AND";
	/** 
	* @var string The SQL string for the condition.
	*/
	var $sql = "";
}
class modAccessibleObject extends xPDOObject{
	/**
	* Determine if the current user attributes satisfy the object policy.
	*
	* @param array $criteria
	* @param string $targets
	*
	* @return boolean
	*/
	public function checkPolicy($criteria, $targets=null){}

	/**
	* Find access policies applicable to this object in a specific context.
	*
	* @param string $context
	*
	* @return array
	*/
	public function findPolicy($context=""){}

	/**
	* Return the currently loaded array of policies.
	* @return array
	*/
	public function getPolicies(){}

	/**
	* Set the current object's policies.
	*
	* @param array $policies
	*
	* @return void
	*/
	public function setPolicies($policies=array()){}

}
class modAccessibleSimpleObject extends modAccessibleObject{
}
abstract class modProcessor{
	/** 
	* A reference to the modX object.
	* @var modX $modx
	*/
	var $modx = null;
	/** 
	* The absolute path to this processor
	* @var string $path
	*/
	var $path = "";
	/** 
	* The array of properties being passed to this processor
	* @var array $properties
	*/
	var $properties = array();
	/**
	* Add an error to the field
	*
	* @param string $key
	* @param string $message
	*
	* @return mixed
	*/
	public function addFieldError($key, $message=""){}

	/**
	* Return true here to allow access to this processor.
	* @return boolean
	*/
	public function checkPermissions(){}

	/**
	* Return a failure message from the processor.
	*
	* @param string $msg
	* @param mixed $object
	*
	* @return array|string
	*/
	public function failure($msg="", $object=null){}

	/**
	* Return the proper instance of the derived class. This can be used to override how MODX loads a processor class; for example, when handling derivative classes with class_key settings.
	*
	* @param \modX $modx
	* @param string $className
	* @param array $properties
	*
	* @return \The
	*/
	public function getInstance($modx, $className, $properties=array()){}

	/**
	* Load a collection of Language Topics for this processor.
	* @return array
	*/
	public function getLanguageTopics(){}

	/**
	* Get an array of properties for this processor
	* @return array
	*/
	public function getProperties(){}

	/**
	* Get a specific property.
	*
	* @param string $k
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getProperty($k, $default=null){}

	/**
	* Return whether or not the processor has errors
	* @return boolean
	*/
	public function hasErrors(){}

	/**
	* Can be used to provide custom methods prior to processing. Return true to tell MODX that the Processor initialized successfully. If you return anything else, MODX will output that return value as an error message.
	* @return boolean
	*/
	public function initialize(){}

	/**
	* Return arrays of objects (with count) converted to JSON.
	*
	* @param array $array
	* @param mixed $count
	*
	* @return string
	*/
	public function outputArray($array, $count=false){}

	/**
	* Run the processor and return the result. Override this in your derivative class to provide custom functionality.
	* @return mixed
	*/
	public function process(){}

	/**
	* Processes a response from a Plugin Event invocation
	*
	* @param array $response
	* @param string $separator
	*
	* @return string
	*/
	public function processEventResponse($response, $separator="
"){}

	/**
	* Run the processor, returning a modProcessorResponse object.
	* @return \modProcessorResponse
	*/
	public function run(){}

	/**
	* Special helper method for handling checkboxes. Only set value if passed or $force is true, and check for a not empty value or string 'false'.
	*
	* @param string $k
	* @param boolean $force
	*
	* @return int|null
	*/
	public function setCheckbox($k, $force=false){}

	/**
	* Sets default properties that only are set if they don't already exist in the request
	*
	* @param array $properties
	*
	* @return array
	*/
	public function setDefaultProperties($properties=array()){}

	/**
	* Set the path of the processor
	*
	* @param string $path
	*
	* @return void
	*/
	public function setPath($path){}

	/**
	* Set the runtime properties for the processor
	*
	* @param array $properties
	*
	* @return void
	*/
	public function setProperties($properties){}

	/**
	* Set a property value
	*
	* @param string $k
	* @param mixed $v
	*
	* @return void
	*/
	public function setProperty($k, $v){}

	/**
	* Return a success message from the processor.
	*
	* @param string $msg
	* @param mixed $object
	*
	* @return array|string
	*/
	public function success($msg="", $object=null){}

	/**
	* Converts PHP to JSON with JavaScript literals left in-tact.
	*
	* @param mixed $data
	*
	* @return string
	*/
	public function toJSON($data){}

	/**
	* Completely unset a property from the properties array
	*
	* @param string $key
	*
	* @return void
	*/
	public function unsetProperty($key){}

}
class modDeprecatedProcessor extends modProcessor{
}
abstract class modDriverSpecificProcessor extends modProcessor{
}
abstract class modObjectProcessor extends modProcessor{
	/** 
	* @var string $classKey The class key of the Object to iterate
	*/
	var $classKey = null;
	/** 
	* @var array $languageTopics An array of language topics to load
	*/
	var $languageTopics = array();
	/** 
	* @var xPDOObject|modAccessibleObject $object The object being grabbed
	*/
	var $object = null;
	/** 
	* @var string $objectType The object "type", this will be used in various lexicon error strings
	*/
	var $objectType = "object";
	/** 
	* @var string $permission The Permission to use when checking against
	*/
	var $permission = "";
	/** 
	* @var string $primaryKeyField The primary key field to grab the object by
	*/
	var $primaryKeyField = "id";
}
abstract class modObjectGetProcessor extends modObjectProcessor{
	/** 
	* @var boolean $checkViewPermission If set to true, will check the view permission on modAccessibleObjects
	*/
	var $checkViewPermission = true;
	/**
	* Used for adding custom data in derivative types
	* @return void
	*/
	public function beforeOutput(){}

	/**
	* Return the response
	* @return array
	*/
	public function cleanup(){}

}
abstract class modObjectGetListProcessor extends modObjectProcessor{
	/** 
	* @var boolean $checkListPermission If true and object is a modAccessibleObject, will check list permission
	*/
	var $checkListPermission = true;
	/** 
	* @var int $currentIndex The current index of successful iteration
	*/
	var $currentIndex = "0";
	/** 
	* @var string $defaultSortDirection The default direction to sort
	*/
	var $defaultSortDirection = "ASC";
	/** 
	* @var string $defaultSortField The default field to sort by
	*/
	var $defaultSortField = "name";
	/**
	* Can be used to insert a row after iteration
	*
	* @param array $list
	*
	* @return array
	*/
	public function afterIteration($list){}

	/**
	* Can be used to insert a row before iteration
	*
	* @param array $list
	*
	* @return array
	*/
	public function beforeIteration($list){}

	/**
	* Allow stoppage of process before the query
	* @return boolean
	*/
	public function beforeQuery(){}

	/**
	* Get the data of the query
	* @return array
	*/
	public function getData(){}

	/**
	* Can be used to provide a custom sorting class key for the default sorting columns
	* @return string
	*/
	public function getSortClassKey(){}

	/**
	* Iterate across the data
	*
	* @param array $data
	*
	* @return array
	*/
	public function iterate($data){}

	/**
	* Can be used to prepare the query after the COUNT statement
	*
	* @param \xPDOQuery $c
	*
	* @return \xPDOQuery
	*/
	public function prepareQueryAfterCount($c){}

	/**
	* Can be used to adjust the query prior to the COUNT statement
	*
	* @param \xPDOQuery $c
	*
	* @return \xPDOQuery
	*/
	public function prepareQueryBeforeCount($c){}

	/**
	* Prepare the row for iteration
	*
	* @param \xPDOObject $object
	*
	* @return array
	*/
	public function prepareRow($object){}

}
abstract class modObjectCreateProcessor extends modObjectProcessor{
	/** 
	* @var string $afterSaveEvent The name of the event to fire after saving
	*/
	var $afterSaveEvent = "";
	/** 
	* @var string $beforeSaveEvent The name of the event to fire before saving
	*/
	var $beforeSaveEvent = "";
	/**
	* Override in your derivative class to do functionality before save() is run
	* @return boolean
	*/
	public function afterSave(){}

	/**
	* Override in your derivative class to do functionality after save() is run
	* @return boolean
	*/
	public function beforeSave(){}

	/**
	* Override in your derivative class to do functionality before the fields are set on the object
	* @return boolean
	*/
	public function beforeSet(){}

	/**
	* Return the success message
	* @return array
	*/
	public function cleanup(){}

	/**
	*
	* @param array $criteria
	*
	* @return int
	*/
	public function doesAlreadyExist($criteria){}

	/**
	* Fire the after save event
	* @return void
	*/
	public function fireAfterSaveEvent(){}

	/**
	* Fire before save event. Return true to prevent saving.
	* @return boolean
	*/
	public function fireBeforeSaveEvent(){}

	/**
	* Log the removal manager action
	* @return void
	*/
	public function logManagerAction(){}

}
abstract class modObjectUpdateProcessor extends modObjectProcessor{
	/** 
	* @var string $afterSaveEvent The name of the event to fire after saving
	*/
	var $afterSaveEvent = "";
	/** 
	* @var string $beforeSaveEvent The name of the event to fire before saving
	*/
	var $beforeSaveEvent = "";
	var $checkSavePermission = true;
	/**
	* Override in your derivative class to do functionality after save() is run
	* @return boolean
	*/
	public function afterSave(){}

	/**
	* Override in your derivative class to do functionality before save() is run
	* @return boolean
	*/
	public function beforeSave(){}

	/**
	* Override in your derivative class to do functionality before the fields are set on the object
	* @return boolean
	*/
	public function beforeSet(){}

	/**
	* Return the success message
	* @return array
	*/
	public function cleanup(){}

	/**
	* Fire the after save event
	* @return void
	*/
	public function fireAfterSaveEvent(){}

	/**
	* Fire before save event. Return true to prevent saving.
	* @return boolean
	*/
	public function fireBeforeSaveEvent(){}

	/**
	* Log the removal manager action
	* @return void
	*/
	public function logManagerAction(){}

	/**
	* Abstract the saving of the object out to allow for transient and non-persistent object updating in derivative classes
	* @return boolean
	*/
	public function saveObject(){}

}
class modObjectDuplicateProcessor extends modObjectProcessor{
	/** 
	* @var boolean $checkSavePermission Whether or not to check the save permission on modAccessibleObjects
	*/
	var $checkSavePermission = true;
	var $nameField = "name";
	/** 
	* @var xPDOObject $newObject The newly duplicated object
	*/
	var $newObject = null;
	/**
	* Run any logic after the object has been duplicated
	* @return boolean
	*/
	public function afterSave(){}

	/**
	* Check to see if an object already exists with that name
	*
	* @param string $name
	*
	* @return boolean
	*/
	public function alreadyExists($name){}

	/**
	* Run any logic before the object has been duplicated. May return false to prevent duplication.
	* @return boolean
	*/
	public function beforeSave(){}

	/**
	* Override in your derivative class to do functionality before the fields are set on the object
	* @return boolean
	*/
	public function beforeSet(){}

	/**
	* Cleanup and return a response.
	* @return array
	*/
	public function cleanup(){}

	/**
	* Get the new name for the duplicate
	* @return string
	*/
	public function getNewName(){}

	/**
	* Log a manager action
	* @return void
	*/
	public function logManagerAction(){}

	/**
	* Set the new name to the new object
	*
	* @param string $name
	*
	* @return string
	*/
	public function setNewName($name){}

}
abstract class modObjectRemoveProcessor extends modObjectProcessor{
	/** 
	* @var string $afterRemoveEvent The name of the event to fire after removal
	*/
	var $afterRemoveEvent = "";
	/** 
	* @var string $beforeRemoveEvent The name of the event to fire before removal
	*/
	var $beforeRemoveEvent = "";
	/** 
	* @var boolean $checkRemovePermission If set to true, will check the remove permission on modAccessibleObjects
	*/
	var $checkRemovePermission = true;
	/**
	* Can contain post-removal logic.
	* @return bool
	*/
	public function afterRemove(){}

	/**
	* Can contain pre-removal logic; return false to prevent remove.
	* @return boolean
	*/
	public function beforeRemove(){}

	/**
	* After removal, manager action log, and event firing logic
	* @return void
	*/
	public function cleanup(){}

	/**
	* If specified, fire the after remove event
	* @return void
	*/
	public function fireAfterRemoveEvent(){}

	/**
	* If specified, fire the before remove event
	* @return boolean
	*/
	public function fireBeforeRemoveEvent(){}

	/**
	* Log the removal manager action
	* @return void
	*/
	public function logManagerAction(){}

}
abstract class modObjectExportProcessor extends modObjectGetProcessor{
	/** 
	* @var string $downloadProperty
	*/
	var $downloadProperty = "download";
	/** 
	* @var string $nameField
	*/
	var $nameField = "name";
	/** 
	* @var XMLWriter $xml
	*/
	var $xml = null;
	/**
	* Cache the data to an export file
	* @return array|string
	*/
	public function cache(){}

	/**
	* Attempt to download the exported file to the browser
	* @return mixed
	*/
	public function download(){}

	/**
	* Log the export manager action
	* @return void
	*/
	public function logManagerAction(){}

	/**
	* Must be declared in your derivative class. Used to prepare the data to export.
	*/
	public function prepareXml(){}

}
abstract class modObjectImportProcessor extends modObjectProcessor{
	/** 
	* @var string $fileProperty The property that contains the file data
	*/
	var $fileProperty = "file";
	/** 
	* @var string $nameField The name, or unique, field for the object
	*/
	var $nameField = "name";
	/** 
	* @var boolean $setName Whether or not to attempt to set the name field
	*/
	var $setName = true;
	/** 
	* @var string $xml The parsed XML from the file
	*/
	var $xml = "";
	/**
	* Do any after save logic
	* @return boolean
	*/
	public function afterSave(){}

	/**
	* Check to see if the object already exists with this name field
	*
	* @param string $name
	*
	* @return bool
	*/
	public function alreadyExists($name){}

	/**
	* Do any before save logic
	* @return boolean
	*/
	public function beforeSave(){}

	/**
	* Log the export manager action
	* @return void
	*/
	public function logManagerAction(){}

}
class modProcessorResponse{
	/** 
	* @var string The error type for this response
	*/
	var $error_type = "";
	/** 
	* @var array A collection of modProcessorResponseError objects for each field-specific error
	*/
	var $errors = array();
	/** 
	* @var modX A reference to the modX object
	*/
	var $modx = null;
	/** 
	* @var array|string A reference to the full response
	*/
	var $response = null;
	/**
	* Gets all errors and adds them all into an array.
	*
	* @param string $fieldErrorSeparator
	*
	* @return array
	*/
	public function getAllErrors($fieldErrorSeparator=": "){}

	/**
	* Returns the type of error for this response
	* @return string
	*/
	public function getErrorType(){}

	/**
	* An array of modProcessorResponseError objects for each field-specific error
	* @return array
	*/
	public function getFieldErrors(){}

	/**
	* Gets the general status message for the response.
	* @return string
	*/
	public function getMessage(){}

	/**
	* Returns the array object, if is sent in the response
	* @return array
	*/
	public function getObject(){}

	/**
	* Returns the entire response object in array form
	* @return array
	*/
	public function getResponse(){}

	/**
	* Checks to see if there are any field-specific errors in this response
	* @return boolean
	*/
	public function hasFieldErrors(){}

	/**
	* Returns true if there is a general status message for the response.
	* @return boolean
	*/
	public function hasMessage(){}

	/**
	* Returns true if an object was sent with this response.
	* @return boolean
	*/
	public function hasObject(){}

	/**
	* Checks to see if the response is an error
	* @return \Returns
	*/
	public function isError(){}

}
class modProcessorResponseError{
	/** 
	* @var array The error data itself
	*/
	var $error = null;
	/** 
	* @var string The field key that the error occurred on
	*/
	var $field = null;
	/** 
	* @var string The message that was sent for the field error
	*/
	var $message = "";
	/**
	* Returns the array data for the field-specific error
	* @return array
	*/
	public function getError(){}

	/**
	* Returns the field key for the field-specific error
	* @return string
	*/
	public function getField(){}

	/**
	* Returns the message for the field-specific error
	* @return string
	*/
	public function getMessage(){}

}
class modElement extends modAccessibleSimpleObject{
	/** 
	* @var boolean If the element is cacheable or not.
	*/
	var $_cacheable = true;
	/** 
	* The source content of the element.
	* @var string
	*/
	var $_content = "";
	/** 
	* @var array Optional filters that can be used during processing.
	*/
	var $_filters = array();
	/** 
	* The output of the element.
	* @var string
	*/
	var $_output = "";
	/** 
	* @var boolean Indicates if the element was processed already.
	*/
	var $_processed = false;
	/** 
	* The property value array for the element.
	* @var array
	*/
	var $_properties = null;
	/** 
	* The string representation of the element properties.
	* @var string
	*/
	var $_propertyString = "";
	/** 
	* The boolean result of the element.
	* @var boolean
	*/
	var $_result = true;
	/** 
	* The source of the element.
	* @var string
	*/
	var $_source = null;
	/** 
	* The tag signature of the element instance.
	* @var string
	*/
	var $_tag = null;
	/** 
	* The character token which helps identify the element class in tag string.
	* @var string
	*/
	var $_token = "";
	/**
	* Add a property set to this element, making it available for use.
	*
	* @param string $propertySet
	*
	* @return boolean
	*/
	public function addPropertySet($propertySet){}

	/**
	* Cache the current output of this element instance by tag signature.
	*/
	public function cache(){}

	/**
	* Apply an input filter to an element.
	*/
	public function filterInput(){}

	/**
	* Apply an output filter to an element.
	*/
	public function filterOutput(){}

	/**
	* Gets the raw, unprocessed source content for this element.
	*
	* @param array $options
	*
	* @return string
	*/
	public function getContent($options=array()){}

	/**
	* Get the content stored in an external file for this instance.
	*
	* @param array $options
	*
	* @return bool|string
	*/
	public function getFileContent($options=array()){}

	/**
	* Get an input filter instance configured for this Element.
	* @return \modInputFilter|null
	*/
	public function getInputFilter(){}

	/**
	* Get an output filter instance configured for this Element.
	* @return \modOutputFilter|null
	*/
	public function getOutputFilter(){}

	/**
	* Get the properties for this element instance for processing.
	*
	* @param array $properties
	*
	* @return array
	*/
	public function getProperties($properties=null){}

	/**
	* Gets a named property set related to this element instance.
	*
	* @param string $setName
	*
	* @return array|null
	*/
	public function getPropertySet($setName=null){}

	/**
	* Get the Source for this Element
	*
	* @param string $contextKey
	* @param boolean $fallbackToDefault
	*
	* @return \modMediaSource|null
	*/
	public function getSource($contextKey="", $fallbackToDefault=true){}

	/**
	* Get the stored sourceCache for a context
	*
	* @param string $contextKey
	* @param array $options
	*
	* @return array
	*/
	public function getSourceCache($contextKey="", $options=array()){}

	/**
	* Get the absolute path to the static source file for this instance.
	*
	* @param array $options
	*
	* @return string|boolean
	*/
	public function getSourceFile($options=array()){}

	/**
	* Get the absolute path location the source file is located relative to.
	*
	* @param array $options
	*
	* @return string
	*/
	public function getSourcePath($options=array()){}

	/**
	* Constructs a valid tag representation of the element.
	* @return string
	*/
	public function getTag(){}

	/**
	* Accessor method for the token class var.
	* @return string
	*/
	public function getToken(){}

	/**
	* Indicates if the element is cacheable.
	* @return boolean
	*/
	public function isCacheable(){}

	/**
	* Indicates if the instance has content in an external file.
	* @return boolean
	*/
	public function isStatic(){}

	/**
	* Return if the static source is mutable.
	* @return boolean
	*/
	public function isStaticSourceMutable(){}

	/**
	* Ensure the static source cannot browse the protected configuration directory
	* @return boolean
	*/
	public function isStaticSourceValidPath(){}

	/**
	* Process the element source content to produce a result.
	*
	* @param array $properties
	* @param string $content
	*
	* @return mixed
	*/
	public function process($properties=null, $content=null){}

	/**
	* Remove a property set from this element, making it unavailable for use.
	*
	* @param string $propertySet
	*
	* @return boolean
	*/
	public function removePropertySet($propertySet){}

	/**
	* Sets the runtime cacheability of the element.
	*
	* @param boolean $cacheable
	*
	*/
	public function setCacheable($cacheable=true){}

	/**
	* Set the raw source content for this element.
	*
	* @param mixed $content
	* @param array $options
	*
	* @return boolean
	*/
	public function setContent($content, $options=array()){}

	/**
	* Set external file content from this instance.
	*
	* @param string $content
	* @param array $options
	*
	* @return bool|int
	*/
	public function setFileContent($content, $options=array()){}

	/**
	* Set default properties for this element instance.
	*
	* @param array $properties
	* @param boolean $merge
	*
	* @return boolean
	*/
	public function setProperties($properties, $merge=false){}

	/**
	* Setter method for the source class var.
	*
	* @param string $source
	*
	*/
	public function setSource($source){}

	/**
	* Setter method for the tag class var.
	*
	* @param string $tag
	*
	*/
	public function setTag($tag){}

	/**
	* Setter method for the token class var.
	*
	* @param string $token
	*
	*/
	public function setToken($token){}

	/**
	* Indicates if the content has changed and the Element has a mutable static source.
	* @return boolean
	*/
	public function staticContentChanged(){}

	/**
	* Indicates if the static source has changed.
	* @return boolean
	*/
	public function staticSourceChanged(){}

}
class modAccessPolicyUpdateProcessor extends modObjectUpdateProcessor{
}
class modTemplateVar extends modElement{
	/** 
	* Supported bindings for MODX
	* @var array $bindings
	*/
	var $bindings = array(FILE);
	/**
	* Check for any Form Customization rules for this TV
	*
	* @param string $value
	* @param \modResource $resource
	*
	* @return mixed
	*/
	public function checkForFormCustomizationRules($value, $resource){}

	/**
	* Check for a registered TV render
	*
	* @param string $type
	* @param string $method
	*
	* @return bool
	*/
	public function checkForRegisteredRenderMethod($type, $method){}

	/**
	* Check to see if the
	*
	* @param \modUser $user
	* @param string $context
	*
	* @return bool
	*/
	public function checkResourceGroupAccess($user=null, $context=""){}

	/**
	* Decodes special function-based chars from a parameter value.
	*
	* @param string $s
	*
	* @return string
	*/
	public function decodeParamValue($s){}

	/**
	* Parses the binding data from a value
	*
	* @param mixed $value
	*
	* @return array
	*/
	public function getBindingDataFromValue($value){}

	/**
	* Returns an array of display params for this TV
	* @return array
	*/
	public function getDisplayParams(){}

	/**
	* Gets the correct render given paths and type of render
	*
	* @param array $params
	* @param mixed $value
	* @param array $paths
	* @param string $method
	* @param integer $resourceId
	* @param string $type
	*
	* @return string
	*/
	public function getRender($params, $value, $paths, $method, $resourceId="0", $type="text"){}

	/**
	* Finds the correct directories for renders
	*
	* @param string $event
	* @param string $subdir
	*
	* @return array
	*/
	public function getRenderDirectories($event, $subdir){}

	/**
	* Get the value of a template variable for a resource.
	*
	* @param integer $resourceId
	*
	* @return mixed
	*/
	public function getValue($resourceId="0"){}

	/**
	* Check to see if the TV has access to a Template
	*
	* @param mixed $templatePk
	*
	* @return boolean
	*/
	public function hasTemplate($templatePk){}

	/**
	* Parses bindings to an appropriate format.
	*
	* @param string $binding_string
	*
	* @return array
	*/
	public function parseBinding($binding_string){}

	/**
	* Returns an string if a delimiter is present. Returns array if is a recordset is present.
	*
	* @param mixed $src
	* @param string $delim
	* @param string $type
	*
	* @return string|array
	*/
	public function parseInput($src, $delim="||", $type="string"){}

	/**
	* Parses input options sent through postback.
	*
	* @param mixed $v
	*
	* @return mixed
	*/
	public function parseInputOptions($v){}

	/**
	* Prepare the output in this method to allow processing of this without depending on the actual render of the output
	*
	* @param string $value
	*
	* @return string
	*/
	public function prepareOutput($value){}

	/**
	* Process bindings assigned to a template variable.
	*
	* @param string $value
	* @param integer $resourceId
	* @param boolean $preProcess
	*
	* @return string
	*/
	public function processBindings($value="", $resourceId="0", $preProcess=true){}

	/**
	* Special parsing for file bindings.
	*
	* @param string $file
	*
	* @return string
	*/
	public function processFileBinding($file){}

	/**
	* Parse inherit binding
	*
	* @param string $default
	* @param int $resourceId
	*
	* @return string
	*/
	public function processInheritBinding($default="", $resourceId=null){}

	/**
	* Register a render method to the array cache to prevent double loading of the class
	*
	* @param string $type
	* @param string $method
	* @param string $className
	*
	* @return mixed
	*/
	public function registerRenderMethod($type, $method, $className){}

	/**
	* Renders input forms for the template variable.
	*
	* @param \modResource $resource
	* @param mixed $options
	*
	* @return mixed
	*/
	public function renderInput($resource=null, $options=array()){}

	/**
	* Returns the processed output of a template variable.
	*
	* @param integer $resourceId
	*
	* @return mixed
	*/
	public function renderOutput($resourceId="0"){}

	/**
	* Set the value of a template variable for a resource.
	*
	* @param integer $resourceId
	* @param mixed $value
	*
	*/
	public function setValue($resourceId="0", $value=null){}

}
abstract class modTemplateVarRender{
	/** 
	* @var array $config
	*/
	var $config = array();
	/** 
	* @var modX $modx
	*/
	var $modx = null;
	/** 
	* @var modTemplateVar $tv
	*/
	var $tv = null;
	/**
	* Get any lexicon topics for your render. You may override this method in your render to provide an array of lexicon topics to load.
	* @return array
	*/
	public function getLexiconTopics(){}

	/**
	*
	* @param string $value
	* @param array $params
	*
	* @return void|mixed
	*/
	public function process($value, $params=array()){}

	/**
	* Render the TV render.
	*
	* @param string $value
	* @param array $params
	*
	* @return mixed|void
	*/
	public function render($value, $params=array()){}

}
abstract class modTemplateVarOutputRender extends modTemplateVarRender{
}
abstract class modTemplateVarInputRender extends modTemplateVarRender{
	/**
	* Return the input options parsed for the TV
	* @return mixed
	*/
	public function getInputOptions(){}

	/**
	* Return the template path to load
	* @return string
	*/
	public function getTemplate(){}

	/**
	* Set a placeholder to be used in the template
	*
	* @param string $k
	* @param mixed $v
	*
	*/
	public function setPlaceholder($k, $v){}

}
class modTemplateVarOutputRenderDeprecated extends modTemplateVarOutputRender{
	/** 
	* @var modX $xpdo
	*/
	var $xpdo = null;
	public function get($k){}

	public function set($k, $v){}

}
class modTemplateVarInputRenderDeprecated extends modTemplateVarInputRender{
	/** 
	* @var modX $xpdo
	*/
	var $xpdo = null;
	public function get($k){}

	public function set($k, $v){}

}
class modResource extends modAccessibleSimpleObject implements modResourceInterface{
	/** 
	* The cache filename for the resource in the context.
	* @var string
	*/
	var $_cacheKey = null;
	/** 
	* Represents the cacheable content for a resource.
	* @var string
	*/
	var $_content = "";
	/** 
	* The context the resource is requested from.
	* @var string
	*/
	var $_contextKey = null;
	/** 
	* Indicates if this Resource was generated from a forward.
	* @var boolean
	*/
	var $_isForward = false;
	/** 
	* An array of Javascript/CSS to be appended to the footer of this Resource
	* @var array $_jscripts
	*/
	var $_jscripts = array();
	/** 
	* All loaded Javascript/CSS that has been calculated to be loaded
	* @var array
	*/
	var $_loadedjscripts = array();
	/** 
	* Represents the output the resource produces.
	* @var string
	*/
	var $_output = "";
	/** 
	* An array of Javascript/CSS to be appended to the HEAD of this Resource
	* @var array $_sjscripts
	*/
	var $_sjscripts = array();
	/** 
	* Whether or not to allow creation of children resources in tree. Can be overridden in a derivative Resource class.
	* @var boolean
	*/
	var $allowChildrenResources = true;
	/** 
	* Use if extending modResource to state whether or not the derivative class can be listed in the class_key dropdown users can change when editing a resource.
	* @var boolean
	*/
	var $allowListingInClassKeyDropdown = true;
	/** 
	* Use if extending modResource to state whether or not to show the extended class in the tree context menu
	* @var boolean
	*/
	var $showInContextMenu = false;
	/**
	* Adds a lock on the Resource
	*
	* @param integer $user
	* @param array $options
	*
	* @return boolean
	*/
	public function addLock($user="0", $options=array()){}

	/**
	* Transforms a string to form a valid URL representation.
	*
	* @param string $alias
	* @param array $options
	*
	* @return string
	*/
	public function cleanAlias($alias, $options=array()){}

	/**
	* Duplicate the Resource.
	*
	* @param array $options
	*
	* @return mixed
	*/
	public function duplicate($options=array()){}

	/**
	* Get the Resource's full alias path.
	*
	* @param string $alias
	* @param array $fields
	*
	* @return string
	*/
	public function getAliasPath($alias="", $fields=array()){}

	/**
	* Returns the cache key for this instance in the current context.
	* @return string
	*/
	public function getCacheKey(){}

	/**
	* Gets the raw, unprocessed source content for a resource.
	*
	* @param array $options
	*
	* @return string
	*/
	public function getContent($options=array()){}

	/**
	* Use this in your extended Resource class to display the text for the context menu item, if showInContextMenu is set to true.
	* @return array
	*/
	public function getContextMenuText(){}

	/**
	* Determine the controller path for this Resource class
	*
	* @param \xPDO $modx
	*
	* @return string
	*/
	public function getControllerPath($modx){}

	/**
	* Gets a sortable, limitable collection (and total count) of Resource Groups for the Resource.
	*
	* @param array $sort
	* @param int $limit
	* @param int $offset
	*
	* @return array
	*/
	public function getGroupsList($sort=array(), $limit="0", $offset="0"){}

	/**
	* Gets the lock on the Resource.
	* @return int
	*/
	public function getLock(){}

	/**
	* Return whether or not the resource has been processed.
	* @return boolean
	*/
	public function getProcessed(){}

	/**
	* Get the properties for the specific namespace for the Resource
	*
	* @param string $namespace
	*
	* @return array
	*/
	public function getProperties($namespace="core"){}

	/**
	* Get a namespaced property for the Resource
	*
	* @param string $key
	* @param string $namespace
	* @param null $default
	*
	* @return null
	*/
	public function getProperty($key, $namespace="core", $default=null){}

	/**
	* Use this in your extended Resource class to return a translatable name for the Resource Type.
	* @return string
	*/
	public function getResourceTypeName(){}

	/**
	* Gets the value of a TV for the Resource.
	*
	* @param mixed $pk
	*
	* @return \null/mixed
	*/
	public function getTVValue($pk){}

	/**
	* Retrieve a collection of Template Variables for a Resource.
	*
	* @param modResource $resource
	*
	* @return \A
	*/
	public function getTemplateVarCollection($resource){}

	/**
	* Get a collection of the Template Variable values for the Resource.
	* @return array
	*/
	public function getTemplateVars(){}

	/**
	* Checks to see if the Resource has children or not. Returns the number of children.
	* @return integer
	*/
	public function hasChildren(){}

	/**
	* Tests to see if an alias is a duplicate.
	*
	* @param string $aliasPath
	* @param string $contextKey
	*
	* @return mixed
	*/
	public function isDuplicateAlias($aliasPath="", $contextKey=""){}

	/**
	* Joins a Resource to a Resource Group
	*
	* @param mixed $resourceGroupPk
	*
	* @return boolean
	*/
	public function joinGroup($resourceGroupPk){}

	/**
	* Removes a Resource from a Resource Group
	*
	* @param int $resourceGroupPk
	*
	* @return boolean
	*/
	public function leaveGroup($resourceGroupPk){}

	/**
	* Get a sortable, limitable collection (and total count) of Resource Groups for a given Resource.
	*
	* @param modResource $resource
	* @param array $sort
	* @param int $limit
	* @param int $offset
	*
	* @return array
	*/
	public function listGroups($resource, $sort=array(), $limit="0", $offset="0"){}

	/**
	* Use this in your extended Resource class to modify the tree node contents
	*
	* @param array $node
	*
	* @return array
	*/
	public function prepareTreeNode($node=array()){}

	/**
	* Process a resource, transforming source content to output.
	* @return string
	*/
	public function process(){}

	/**
	* Refresh Resource URI fields for children of the specified parent.
	*
	* @param modX $modx
	* @param int $parent
	* @param array $options
	*
	* @return void
	*/
	public function refreshURIs($modx, $parent="0", $options=array()){}

	/**
	* Removes all locks on a Resource.
	*
	* @param int $user
	*
	* @return boolean
	*/
	public function removeLock($user="0"){}

	/**
	* Set the raw source content for this element.
	*
	* @param mixed $content
	* @param array $options
	*
	* @return boolean
	*/
	public function setContent($content, $options=array()){}

	/**
	* Set the field indicating the resource has been processed.
	*
	* @param boolean $processed
	*
	*/
	public function setProcessed($processed){}

	/**
	* Set properties for a namespace on the Resource, optionally merging them with existing ones.
	*
	* @param array $newProperties
	* @param string $namespace
	* @param bool $merge
	*
	* @return boolean
	*/
	public function setProperties($newProperties, $namespace="core", $merge=true){}

	/**
	* Set a namespaced property for the Resource
	*
	* @param string $key
	* @param mixed $value
	* @param string $namespace
	*
	* @return bool
	*/
	public function setProperty($key, $value, $namespace="core"){}

	/**
	* Sets a value for a TV for this Resource
	*
	* @param mixed $pk
	* @param string $value
	*
	* @return bool
	*/
	public function setTVValue($pk, $value){}

	/**
	* Updates the Context of all Children recursively to that of the parent.
	*
	* @param modX $modx
	* @param \modResource $parent
	* @param array $options
	*
	* @return int
	*/
	public function updateContextOfChildren($modx, $parent, $options=array()){}

}
class modScript extends modElement{
	/** 
	* The cache key of the script
	* @var string $_scriptCacheKey
	*/
	var $_scriptCacheKey = null;
	/** 
	* The name of the script
	* @var string $_scriptName
	*/
	var $_scriptName = null;
	/**
	* Get the name of the script source file, written to the cache file system
	* @return string
	*/
	public function getScriptCacheKey(){}

	/**
	* Get the name of the function the script has been given.
	* @return string
	*/
	public function getScriptName(){}

	/**
	* Loads and evaluates the script, returning the result.
	* @return boolean
	*/
	public function loadScript(){}

}
class xPDOCacheManager{
	/**
	* Add a key-value pair to a cache provider if it does not already exist.
	*
	* @param string $key
	* @param integer $lifetime
	* @param array $options
	*
	*/
	public function add($key, $var, $lifetime="0", $options=array()){}

	/**
	* Flush the contents of a cache provider.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function clean($options=array()){}

	/**
	* Copies a file from a source file to a target directory.
	*
	* @param string $source
	* @param string $target
	* @param array $options
	*
	* @return boolean|array
	*/
	public function copyFile($source, $target, $options=array()){}

	/**
	* Recursively copies a directory tree from a source directory to a target directory.
	*
	* @param string $source
	* @param string $target
	* @param array $options
	*
	* @return array|boolean
	*/
	public function copyTree($source, $target, $options=array()){}

	/**
	* Delete a key-value pair from a cache provider.
	*
	* @param string $key
	* @param array $options
	*
	* @return boolean
	*/
	public function delete($key, $options=array()){}

	/**
	* Recursively deletes a directory tree of files.
	*
	* @param string $dirname
	* @param array $options
	*
	* @return boolean
	*/
	public function deleteTree($dirname, $options=array()){}

	/**
	* Sees if a string ends with a specific pattern or set of patterns.
	*
	* @param string $string
	* @param string $pattern
	*
	* @return boolean
	*/
	public function endsWith($string, $pattern){}

	/**
	* Escapes all single quotes in a string
	*
	* @param string $s
	*
	* @return string
	*/
	public function escapeSingleQuotes($s){}

	/**
	* Generate a PHP executable representation of an xPDOObject.
	*
	* @param \xPDOObject $obj
	* @param string $objName
	* @param boolean $generateObjVars
	* @param boolean $generateRelated
	* @param string $objRef
	* @param boolean $format
	*
	* @return string
	*/
	public function generateObject($obj, $objName, $generateObjVars=false, $generateRelated=false, $objRef="this->xpdo", $format="0"){}

	/**
	* Get a value from a cache provider by key.
	*
	* @param string $key
	* @param array $options
	*
	* @return mixed
	*/
	public function get($key, $options=array()){}

	/**
	* Get the absolute path to a writable directory for storing files.
	* @return string
	*/
	public function getCachePath(){}

	/**
	* Get an instance of a provider which implements the xPDOCache interface.
	*/
	public function getCacheProvider($key="", $options=array()){}

	/**
	* Get default file permissions based on umask
	* @return integer
	*/
	public function getFilePermissions(){}

	/**
	* Get default folder permissions based on umask
	* @return integer
	*/
	public function getFolderPermissions(){}

	/**
	* Get an option from supplied options, the cacheManager options, or xpdo itself.
	*
	* @param string $key
	* @param array $options
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getOption($key, $options=array(), $default=null){}

	/**
	* Add an exclusive lock to a file for atomic write operations in multi-threaded environments.
	*
	* @param string $file
	* @param array $options
	*
	* @return boolean
	*/
	public function lockFile($file, $options=array()){}

	/**
	* Sees if a string matches a specific pattern or set of patterns.
	*
	* @param string $string
	* @param string $pattern
	*
	* @return boolean
	*/
	public function matches($string, $pattern){}

	/**
	* Refresh specific or all cache providers.
	*
	* @param array $providers
	*
	* @return array
	*/
	public function refresh($providers=array(), $results=array()){}

	/**
	* Replace a key-value pair in in a cache provider.
	*
	* @param string $key
	* @param integer $lifetime
	* @param array $options
	*
	* @return boolean
	*/
	public function replace($key, $var, $lifetime="0", $options=array()){}

	/**
	* Set a key-value pair in a cache provider.
	*
	* @param string $key
	* @param integer $lifetime
	* @param array $options
	*
	* @return boolean
	*/
	public function set($key, $var, $lifetime="0", $options=array()){}

	/**
	* Release an exclusive lock on a file created by lockFile().
	*
	* @param string $file
	* @param array $options
	*
	*/
	public function unlockFile($file, $options=array()){}

	/**
	* Writes a file to the filesystem.
	*
	* @param string $filename
	* @param string $content
	* @param string $mode
	* @param array $options
	*
	* @return int|bool
	*/
	public function writeFile($filename, $content, $mode="wb", $options=array()){}

	/**
	* Recursively writes a directory tree of files to the filesystem
	*
	* @param string $dirname
	* @param array $options
	*
	* @return boolean
	*/
	public function writeTree($dirname, $options=array()){}

}
abstract class xPDOCache{
	var $xpdo = null;
	/**
	* Adds a value to the cache.
	*
	* @param string $key
	* @param string $var
	* @param integer $expire
	* @param array $options
	*
	* @return boolean
	*/
	public function add($key, $var, $expire="0", $options=array()){}

	/**
	* Deletes a value from the cache.
	*
	* @param string $key
	* @param array $options
	*
	* @return boolean
	*/
	public function delete($key, $options=array()){}

	/**
	* Flush all values from the cache.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function flush($options=array()){}

	/**
	* Gets a value from the cache.
	*
	* @param string $key
	* @param array $options
	*
	* @return mixed
	*/
	public function get($key, $options=array()){}

	/**
	* Get the actual cache key the implementation will use.
	*
	* @param string $key
	* @param array $options
	*
	* @return string
	*/
	public function getCacheKey($key, $options=array()){}

	/**
	* Get an option from supplied options, the cache options, or the xpdo config.
	*
	* @param string $key
	* @param array $options
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getOption($key, $options=array(), $default=null){}

	/**
	* Indicates if this xPDOCache instance has been properly initialized.
	* @return boolean
	*/
	public function isInitialized(){}

	/**
	* Replaces a value in the cache.
	*
	* @param string $key
	* @param string $var
	* @param integer $expire
	* @param array $options
	*
	* @return boolean
	*/
	public function replace($key, $var, $expire="0", $options=array()){}

	/**
	* Sets a value in the cache.
	*
	* @param string $key
	* @param string $var
	* @param integer $expire
	* @param array $options
	*
	* @return boolean
	*/
	public function set($key, $var, $expire="0", $options=array()){}

}
class xPDOFileCache extends xPDOCache{
}
class CFRuntime_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class CFRuntime{
	/** 
	* The Amazon Account ID, without hyphens.
	*/
	var $account_id = null;
	/** 
	* The number of seconds to adjust the request timestamp by (defaults to 0).
	*/
	var $adjust_offset = "0";
	/** 
	* The supported API version.
	*/
	var $api_version = null;
	/** 
	* The Amazon Associates ID.
	*/
	var $assoc_id = null;
	/** 
	* The Amazon Authentication Token.
	*/
	var $auth_token = null;
	/** 
	* The default class to use for handling batch requests (defaults to <CFBatchRequest>).
	*/
	var $batch_class = "CFBatchRequest";
	/** 
	* The current instantiated batch request object.
	*/
	var $batch_object = null;
	/** 
	* The caching class to use.
	*/
	var $cache_class = null;
	/** 
	* The state of cache compression.
	*/
	var $cache_compress = null;
	/** 
	* When the cache should be considered stale.
	*/
	var $cache_expires = null;
	/** 
	* The caching location to use.
	*/
	var $cache_location = null;
	/** 
	* The current instantiated cache object.
	*/
	var $cache_object = null;
	/** 
	* The state of the debug mode setting.
	*/
	var $debug_mode = false;
	/** 
	* The state of the cache deletion setting.
	*/
	var $delete_cache = false;
	/** 
	* The alternate hostname to use, if any.
	*/
	var $hostname = null;
	/** 
	* The internally instantiated batch request object.
	*/
	var $internal_batch_object = null;
	/** 
	* The Amazon API Key.
	*/
	var $key = null;
	/** 
	* The number of times to retry failed requests.
	*/
	var $max_retries = "3";
	/** 
	* The state of the capability to override the hostname with <set_hostname()>.
	*/
	var $override_hostname = true;
	/** 
	* The default class to use for parsing XML (defaults to <CFSimpleXML>).
	*/
	var $parser_class = "CFSimpleXML";
	/** 
	* The alternate port number to use, if any.
	*/
	var $port_number = null;
	/** 
	* The proxy to use for connecting.
	*/
	var $proxy = null;
	/** 
	* The user-defined callback function to call when a stream is read from.
	*/
	var $registered_streaming_read_callback = null;
	/** 
	* The user-defined callback function to call when a stream is written to.
	*/
	var $registered_streaming_write_callback = null;
	/** 
	* The default class to use for HTTP requests (defaults to <CFRequest>).
	*/
	var $request_class = "CFRequest";
	/** 
	* The alternate resource prefix to use, if any.
	*/
	var $resource_prefix = null;
	/** 
	* The default class to use for HTTP responses (defaults to <CFResponse>).
	*/
	var $response_class = "CFResponse";
	/** 
	* The Amazon API Secret Key.
	*/
	var $secret_key = null;
	/** 
	* An identifier for the current AWS service.
	*/
	var $service = null;
	/** 
	* The state of SSL certificate verification.
	*/
	var $ssl_verification = true;
	/** 
	* The state of whether auth should be handled as AWS Query.
	*/
	var $use_aws_query = true;
	/** 
	* The state of batch flow usage.
	*/
	var $use_batch_flow = false;
	/** 
	* The state of cache flow usage.
	*/
	var $use_cache_flow = false;
	/** 
	* The state of SSL/HTTPS use.
	*/
	var $use_ssl = true;
	/** 
	* Handle for the utility functions.
	*/
	var $util = null;
	/** 
	* The default class to use for utilities (defaults to <CFUtilities>).
	*/
	var $utilities_class = "CFUtilities";
	/**
	* Adjusts the current time. Use this method for occasions when a server is out of sync with Amazon servers.
	*
	* @param integer $seconds
	*
	* @return $this
	*/
	public function adjust_offset($seconds){}

	/**
	* Disables any subsequent use of the <set_hostname()> method.
	*
	* @param boolean $override
	*
	* @return $this
	*/
	public function allow_hostname_override($override=true){}

	/**
	* Default, shared method for authenticating a connection to AWS. Overridden on a class-by-class basis as necessary.
	*
	* @param string $action
	* @param array $opt
	* @param string $domain
	* @param integer $signature_version
	* @param integer $redirects
	*
	* @return \CFResponse
	*/
	public function authenticate($action, $opt=null, $domain=null, $signature_version="2", $redirects="0"){}

	/**
	* Specifies that the intended request should be queued for a later batch request.
	*
	* @param \CFBatchRequest $queue
	*
	* @return $this
	*/
	public function batch($queue=null){}

	/**
	* Specifies that the resulting <CFResponse> object should be cached according to the settings from <set_cache_config()>.
	*
	* @param string $expires
	*
	* @return $this
	*/
	public function cache($expires, $this){}

	/**
	* The callback function that is executed when the cache doesn't exist or has expired. The response of this method is cached. Accepts identical parameters as the <authenticate()> method. Never call this method directly -- it is used internally by the caching system.
	*
	* @param string $action
	* @param array $opt
	* @param string $domain
	* @param integer $signature_version
	*
	* @return \CFResponse
	*/
	public function cache_callback($action, $opt=null, $domain=null, $signature_version="2"){}

	/**
	* Used for caching the results of a batch request. Never call this method directly; it is used internally by the caching system.
	*
	* @param \CFBatchRequest $batch
	*
	* @return \CFResponse
	*/
	public function cache_callback_batch($batch){}

	/**
	* The callback function that is executed while caching the session credentials.
	*
	* @param string $key
	* @param string $secret_key
	*
	* @return mixed
	*/
	public function cache_token($key, $secret_key){}

	/**
	* Deletes a cached <CFResponse> object using the specified cache storage type.
	* @return boolean
	*/
	public function delete_cache(){}

	/**
	* Disables SSL/HTTPS connections for hosts that don't support them. Some services, however, still require SSL support.
	* @return $this
	*/
	public function disable_ssl(){}

	/**
	* Disables the verification of the SSL Certificate Authority. Doing so can enable an attacker to carry out a man-in-the-middle attack.
	* @return $this
	*/
	public function disable_ssl_verification($ssl_verification=false){}

	/**
	* Enables HTTP request/response header logging to `STDERR`.
	*
	* @param boolean $enabled
	*
	* @return $this
	*/
	public function enable_debug_mode($enabled=true){}

	/**
	* Alternate approach to constructing a new instance. Supports chaining.
	*
	* @param string $key
	* @param string $secret_key
	* @param string $token
	*
	* @return boolean
	*/
	public function init($key=null, $secret_key=null, $token=null){}

	/**
	* Parses a response body into a PHP object if appropriate.
	*
	* @param \CFResponse $response
	* @param string $content_type
	*
	* @return \CFResponse|string
	*/
	public function parse_callback($response, $headers=null, $content_type){}

	/**
	* Register a callback function to execute whenever a data stream is read from using <CFRequest::streaming_read_callback()>.
	*
	* @param string $callback
	*
	* @return $this
	*/
	public function register_streaming_read_callback($callback){}

	/**
	* Register a callback function to execute whenever a data stream is written to using <CFRequest::streaming_write_callback()>.
	*
	* @param string $callback
	*
	* @return $this
	*/
	public function register_streaming_write_callback($callback){}

	/**
	* Executes the batch request queue by sending all queued requests.
	*
	* @param boolean $clear_after_send
	*
	* @return array
	*/
	public function send($clear_after_send=true){}

	/**
	* Handle session-based authentication for services that support it.
	*
	* @param string $key
	* @param string $secret_key
	* @param string $token
	*
	* @return boolean
	*/
	public function session_based_auth($key=null, $secret_key=null, $token=null){}

	/**
	* Set a custom class for this functionality. Use this method when extending/overriding existing classes with new functionality.
	*
	* @param string $class
	*
	* @return $this
	*/
	public function set_batch_class($class="CFBatchRequest"){}

	/**
	* Set the caching configuration to use for response caching.
	*
	* @param string $location
	* @param boolean $gzip
	*
	* @return $this
	*/
	public function set_cache_config($location, $gzip=true){}

	/**
	* Set the hostname to connect to. This is useful for alternate services that are API-compatible with AWS, but run from a different hostname.
	*
	* @param string $hostname
	* @param integer $port_number
	*
	* @return $this
	*/
	public function set_hostname($hostname, $port_number=null){}

	/**
	* Sets the maximum number of times to retry failed requests.
	*
	* @param integer $retries
	*
	* @return $this
	*/
	public function set_max_retries($retries="3"){}

	/**
	* Set a custom class for this functionality. Use this method when extending/overriding existing classes with new functionality.
	*
	* @param string $class
	*
	* @return $this
	*/
	public function set_parser_class($class="CFSimpleXML"){}

	/**
	* Set the proxy settings to use.
	*
	* @param string $proxy
	*
	* @return $this
	*/
	public function set_proxy($proxy){}

	/**
	* Set a custom class for this functionality. Use this method when extending/overriding existing classes with new functionality.
	*
	* @param string $class
	*
	*/
	public function set_request_class($class="CFRequest", $this){}

	/**
	* Set the resource prefix to use. This method is useful for alternate services that are API-compatible with AWS.
	*
	* @param string $prefix
	*
	* @return $this
	*/
	public function set_resource_prefix($prefix){}

	/**
	* Set a custom class for this functionality. Use this method when extending/overriding existing classes with new functionality.
	*
	* @param string $class
	*
	* @return $this
	*/
	public function set_response_class($class="CFResponse"){}

	/**
	* Set a custom class for this functionality. Use this method when extending/overriding existing classes with new functionality.
	*
	* @param string $class
	*
	* @return $this
	*/
	public function set_utilities_class($class="CFUtilities"){}

}
class CFLoader{
	/**
	* Automatically load classes that aren't included.
	*
	* @param string $class
	*
	* @return void
	*/
	public function autoloader($class){}

}
class Config_File{
	var $_config_data = array();
	var $_config_path = "";
	/** 
	* Controls whether config values of on/true/yes and off/false/no get converted to boolean values automatically.
	*/
	var $booleanize = true;
	/** 
	* Controls whether or not to fix mac or dos formatted newlines.
	*/
	var $fix_newlines = true;
	/** 
	* Controls whether variables with the same name overwrite each other.
	*/
	var $overwrite = true;
	/** 
	* Controls whether hidden config sections/vars are read from the file.
	*/
	var $read_hidden = true;
	/**
	* Constructs a new config file class.
	*
	* @param string $config_path
	*
	*/
	public function Config_File($config_path=null){}

	/**
	*
	* @param string $var_name
	* @param mixed $var_value
	* @param boolean $booleanize
	*
	*/
	public function _set_config_var($container, $var_name, $var_value, $booleanize){}

	/**
	*
	* @param string $error_msg
	* @param integer $error_type
	*
	*/
	public function _trigger_error_msg($error_msg, $error_type="512"){}

	/**
	* Clear loaded config data for a certain file or all files.
	*
	* @param string $file_name
	*
	*/
	public function clear($file_name=null){}

	/**
	* Retrieves config info based on the file, section, and variable name.
	*
	* @param string $file_name
	* @param string $section_name
	* @param string $var_name
	*
	* @return string|array
	*/
	public function get($file_name, $section_name=null, $var_name=null){}

	/**
	* Get all loaded config file names.
	* @return array
	*/
	public function get_file_names(){}

	/**
	* Retrieves config info based on the key.
	* @return string|array
	*/
	public function get_key($config_key, $file_name){}

	/**
	* Get all section names from a loaded file.
	*
	* @param string $file_name
	*
	* @return array
	*/
	public function get_section_names($file_name){}

	/**
	* Get all global or section variable names.
	*
	* @param string $file_name
	* @param string $section_name
	*
	* @return array
	*/
	public function get_var_names($file_name, $section=null, $section_name){}

	/**
	* Load a configuration file manually.
	*
	* @param string $file_name
	* @param boolean $prepend_path
	*
	*/
	public function load_file($file_name, $prepend_path=true){}

	/**
	* parse the source of a configuration file manually.
	*
	* @param string $contents
	*
	*/
	public function parse_contents($contents){}

	/**
	* Store the contents of a file manually.
	*
	* @param string $config_file
	* @param string $contents
	*
	*/
	public function set_file_contents($config_file, $contents){}

	/**
	* Set the path where configuration files can be found.
	*
	* @param string $config_path
	*
	*/
	public function set_path($config_path){}

}
class SmartyException extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class SmartyCompilerException extends SmartyException{
}
class Smarty_Internal_Data{
	var $template_class = "Smarty_Internal_Template";
	/**
	* appends values to template variables
	*
	* @param mixed $value
	* @param boolean $merge
	* @param boolean $nocache
	* @param array $
	*
	*/
	public function append($tpl_var, $value=null, $merge=false, $nocache=false, $){}

	/**
	* appends values to template variables by reference
	*
	* @param string $tpl_var
	* @param boolean $merge
	* @param mixed $
	*
	*/
	public function appendByRef($tpl_var, $value, $merge=false, $){}

	/**
	*
	* @param string $tpl_var
	* @param boolean $merge
	* @param mixed $
	*
	*/
	public function append_by_ref($tpl_var, $value, $merge=false, $){}

	/**
	* assigns a Smarty variable
	*
	* @param mixed $value
	* @param boolean $nocache
	* @param array $
	* @param boolean $scope
	*
	*/
	public function assign($tpl_var, $value=null, $nocache=false, $, $scope){}

	/**
	* assigns values to template variables by reference
	*
	* @param string $tpl_var
	* @param boolean $nocache
	* @param mixed $
	*
	*/
	public function assignByRef($tpl_var, $value, $nocache=false, $){}

	/**
	* assigns a global Smarty variable
	*
	* @param string $varname
	* @param mixed $value
	* @param boolean $nocache
	*
	*/
	public function assignGlobal($varname, $value=null, $nocache=false){}

	/**
	* wrapper function for Smarty 2 BC
	*
	* @param string $tpl_var
	* @param mixed $
	*
	*/
	public function assign_by_ref($tpl_var, $value, $){}

	/**
	* clear all the assigned template variables.
	*/
	public function clearAllAssign(){}

	/**
	* clear the given assigned template variable.
	*
	* @param string $
	*
	*/
	public function clearAssign($tpl_var, $){}

	/**
	* Deassigns a single or all config variables
	*
	* @param string $varname
	*
	*/
	public function clearConfig($varname=null){}

	/**
	* load a config file, optionally load just selected sections
	*
	* @param string $config_file
	* @param mixed $sections
	*
	*/
	public function configLoad($config_file, $sections=null){}

	/**
	* gets a config variable
	*
	* @param string $variable
	*
	* @return mixed
	*/
	public function getConfigVariable($variable){}

	/**
	* Returns a single or all config variables
	*
	* @param string $varname
	*
	* @return string
	*/
	public function getConfigVars($varname=null){}

	/**
	* gets a stream variable
	*
	* @param string $variable
	*
	* @return mixed
	*/
	public function getStreamVariable($variable){}

	/**
	* Returns a single or all template variables
	*
	* @param string $varname
	*
	* @return string
	*/
	public function getTemplateVars($varname=null, $_ptr=null, $search_parents=true){}

	/**
	* gets the object of a Smarty variable
	*
	* @param string $variable
	* @param object $_ptr
	* @param boolean $search_parents
	*
	* @return object
	*/
	public function getVariable($variable, $_ptr=null, $search_parents=true, $error_enable=true){}

}
class Smarty_Data extends Smarty_Internal_Data{
	var $config_vars = array();
	var $parent = null;
	var $smarty = null;
	var $tpl_vars = array();
}
class Smarty_Variable{
	var $nocache = null;
	var $scope = null;
	var $value = null;
}
class Undefined_Smarty_Variable{
}
class Smarty extends Smarty_Internal_Data{
	var $_dir_perms = "505";
	var $_file_perms = "420";
	var $_smarty_vars = array();
	var $_tag_stack = array();
	var $_version = "Smarty-3.0.4";
	var $allow_php_tag = false;
	var $allow_php_templates = false;
	/** 
	* variables
	*/
	var $auto_literal = true;
	var $autoload_filters = array();
	var $cache_dir = null;
	var $cache_id = null;
	var $cache_lifetime = "3600";
	var $cache_modified_check = false;
	var $cache_resource_types = array(file);
	var $caching = false;
	var $caching_type = "file";
	var $compile_check = true;
	var $compile_dir = null;
	var $compile_error = false;
	var $compile_id = null;
	var $compile_locking = true;
	var $config_booleanize = true;
	var $config_dir = null;
	var $config_overwrite = true;
	var $config_read_hidden = true;
	var $config_vars = array();
	var $debug_tpl = null;
	var $debugging = false;
	var $debugging_ctrl = "NONE";
	var $default_config_type = "file";
	var $default_modifiers = array();
	var $default_resource_type = "file";
	var $default_template_handler_func = null;
	var $deprecation_notices = true;
	var $direct_access_security = true;
	var $error_reporting = null;
	var $error_unassigned = false;
	var $force_cache = false;
	var $force_compile = false;
	/** 
	* static variables
	*/
	var $global_tpl_vars = array();
	var $inheritance = false;
	var $left_delimiter = "{";
	var $merge_compiled_includes = false;
	var $parent = null;
	var $php_handling = "0";
	var $plugin_search_order = array(function);
	var $plugins_dir = null;
	var $properties = array();
	var $registered_classes = array();
	var $registered_filters = array();
	var $registered_objects = array();
	var $registered_plugins = array();
	var $registered_resources = array();
	var $right_delimiter = "}";
	var $security_class = "Smarty_Security";
	var $security_policy = null;
	var $smarty_debug_id = "SMARTY_DEBUG";
	var $start_time = "0";
	var $template_dir = null;
	var $template_functions = array();
	var $template_objects = null;
	var $tpl_vars = array();
	var $trusted_dir = array();
	var $use_sub_dirs = false;
	var $variable_filter = true;
	/**
	* Adds directory of plugin files
	*
	* @param object $smarty
	* @param string $
	*
	*/
	public function addPluginsDir($plugins_dir, $smarty, $){}

	/**
	* Adds template directory(s) to existing ones
	*
	* @param string $
	*
	*/
	public function addTemplateDir($template_dir, $){}

	/**
	* Empty cache folder
	*
	* @param integer $exp_time
	* @param string $type
	*
	* @return integer
	*/
	public function clearAllCache($exp_time=null, $type=null){}

	/**
	* Empty cache for a specific template
	*
	* @param string $template_name
	* @param string $cache_id
	* @param string $compile_id
	* @param integer $exp_time
	* @param string $type
	*
	* @return integer
	*/
	public function clearCache($template_name, $cache_id=null, $compile_id=null, $exp_time=null, $type=null){}

	/**
	* creates a data object
	*
	* @param object $parent
	*
	*/
	public function createData($parent=null){}

	/**
	* creates a template object
	*
	* @param string $template
	* @param mixed $cache_id
	* @param mixed $compile_id
	* @param object $parent
	*
	*/
	public function createTemplate($template, $cache_id=null, $compile_id=null, $parent=null){}

	/**
	* Disable security
	*/
	public function disableSecurity(){}

	/**
	* displays a Smarty template
	*
	* @param mixed $cache_id
	* @param mixed $compile_id
	* @param object $parent
	* @param string $
	*
	*/
	public function display($template, $cache_id=null, $compile_id=null, $parent=null, $){}

	/**
	* Loads security class and enables security
	*/
	public function enableSecurity($security_class=null){}

	/**
	* fetches a rendered Smarty template
	*
	* @param string $template
	* @param mixed $cache_id
	* @param mixed $compile_id
	* @param object $
	*
	* @return string
	*/
	public function fetch($template, $cache_id=null, $compile_id=null, $parent=null, $display=false, $){}

	/**
	* return name of debugging template
	* @return string
	*/
	public function getDebugTemplate(){}

	/**
	* Returns a single or all global variables
	*
	* @param string $varname
	* @param object $smarty
	*
	* @return string
	*/
	public function getGlobal($varname=null, $smarty){}

	/**
	* return a reference to a registered object
	*
	* @param string $name
	*
	* @return object
	*/
	public function getRegisteredObject($name){}

	/**
	* test if cache i valid
	*
	* @param mixed $cache_id
	* @param mixed $compile_id
	* @param object $parent
	* @param string $
	*
	* @return boolean
	*/
	public function isCached($template, $cache_id=null, $compile_id=null, $parent=null, $){}

	/**
	* Loads cache resource.
	*
	* @param string $type
	*
	* @return object
	*/
	public function loadCacheResource($type=null){}

	/**
	* Takes unknown classes and loads plugin files for them class name format: Smarty_PluginType_PluginName plugin filename format: plugintype.pluginname.php
	*
	* @param string $plugin_name
	*
	* @return string
	*/
	public function loadPlugin($plugin_name, $check=true){}

	/**
	* set the debug template
	*
	* @param string $tpl_name
	*
	* @return bool
	*/
	public function setDebugTemplate($tpl_name){}

	/**
	* Set template directory
	*
	* @param string $
	*
	*/
	public function setTemplateDir($template_dir, $){}

	/**
	* Check if a template resource exists
	*
	* @param string $resource_name
	*
	* @return boolean
	*/
	public function templateExists($resource_name){}

}
class Smarty_Compiler extends Smarty{
	var $_additional_newline = "
";
	var $_avar_regexp = null;
	var $_cache_attrs_count = "0";
	var $_cache_include = null;
	var $_cache_serial = null;
	var $_cacheable_state = "0";
	var $_capture_stack = array();
	var $_current_file = null;
	var $_current_line_no = "1";
	var $_cvar_regexp = null;
	var $_db_qstr_regexp = null;
	var $_dvar_guts_regexp = null;
	var $_dvar_regexp = null;
	var $_folded_blocks = array();
	var $_func_call_regexp = null;
	var $_func_regexp = null;
	var $_init_smarty_vars = false;
	var $_mod_regexp = null;
	var $_nocache_count = "0";
	var $_num_const_regexp = null;
	var $_obj_call_regexp = null;
	var $_obj_ext_regexp = null;
	var $_obj_params_regexp = null;
	var $_obj_start_regexp = null;
	var $_parenth_param_regexp = null;
	var $_permitted_tokens = array(true);
	var $_plugin_info = array();
	var $_qstr_regexp = null;
	var $_reg_obj_regexp = null;
	var $_si_qstr_regexp = null;
	var $_strip_depth = "0";
	var $_svar_regexp = null;
	var $_var_bracket_regexp = null;
	var $_var_regexp = null;
	/**
	* The class constructor.
	*/
	public function Smarty_Compiler(){}

	/**
	* add plugin
	*
	* @param string $type
	* @param string $name
	* @param \boolean? $delayed_loading
	*
	*/
	public function _add_plugin($type, $name, $delayed_loading=null){}

	public function _compile_arg_list($type, $name, $attrs, $cache_code){}

	/**
	* compile block function tag
	*
	* @param string $tag_command
	* @param string $tag_args
	* @param string $tag_modifier
	* @param string $output
	*
	* @return boolean
	*/
	public function _compile_block_tag($tag_command, $tag_args, $tag_modifier, $output){}

	/**
	* Compile {capture} .
	*
	* @param boolean $start
	* @param string $tag_args
	*
	* @return string
	*/
	public function _compile_capture_tag($start, $tag_args=""){}

	/**
	* compile the custom compiler tag
	*
	* @param string $tag_command
	* @param string $tag_args
	* @param string $output
	*
	* @return boolean
	*/
	public function _compile_compiler_tag($tag_command, $tag_args, $output){}

	/**
	* compile custom function tag
	*
	* @param string $tag_command
	* @param string $tag_args
	* @param string $tag_modifier
	*
	* @return string
	*/
	public function _compile_custom_tag($tag_command, $tag_args, $tag_modifier, $output){}

	/**
	* compile a resource
	*
	* @param string $resource_name
	* @param string $source_content
	* @param string $compiled_content
	*
	* @return true
	*/
	public function _compile_file($resource_name, $source_content, $compiled_content){}

	/**
	* Compile {foreach .
	*
	* @param string $tag_args
	*
	* @return string
	*/
	public function _compile_foreach_start($tag_args){}

	/**
	* Compile {if .
	*
	* @param string $tag_args
	* @param boolean $elseif
	*
	* @return string
	*/
	public function _compile_if_tag($tag_args, $elseif=false){}

	/**
	* Compile {include .
	*
	* @param string $tag_args
	*
	* @return string
	*/
	public function _compile_include_php_tag($tag_args){}

	/**
	* Compile {include .
	*
	* @param string $tag_args
	*
	* @return string
	*/
	public function _compile_include_tag($tag_args){}

	/**
	* Compile {insert .
	*
	* @param string $tag_args
	*
	* @return string
	*/
	public function _compile_insert_tag($tag_args){}

	/**
	* compiles call to plugin of type $type with name $name returns a string containing the function-name or method call without the paramter-list that would have follow to make the call valid php-syntax
	*
	* @param string $type
	* @param string $name
	*
	* @return string
	*/
	public function _compile_plugin_call($type, $name){}

	/**
	* compile a registered object tag
	*
	* @param string $tag_command
	* @param array $attrs
	* @param string $tag_modifier
	*
	* @return string
	*/
	public function _compile_registered_object_tag($tag_command, $attrs, $tag_modifier){}

	/**
	* Compile {section .
	*
	* @param string $tag_args
	*
	* @return string
	*/
	public function _compile_section_start($tag_args){}

	/**
	* Compiles references of type $smarty.foo
	*
	* @param string $indexes
	*
	* @return string
	*/
	public function _compile_smarty_ref($indexes){}

	/**
	* Compile a template tag
	*
	* @param string $template_tag
	*
	* @return string
	*/
	public function _compile_tag($template_tag){}

	/**
	* expand quoted text with embedded variables
	*
	* @param string $var_expr
	*
	* @return string
	*/
	public function _expand_quoted_text($var_expr){}

	/**
	* load pre- and post-filters
	*/
	public function _load_filters(){}

	/**
	* Parse attribute string
	*
	* @param string $tag_args
	*
	* @return array
	*/
	public function _parse_attrs($tag_args){}

	/**
	* parse configuration variable expression into PHP code
	*
	* @param string $conf_var_expr
	*
	*/
	public function _parse_conf_var($conf_var_expr){}

	/**
	* Parse is expression
	*
	* @param string $is_arg
	* @param array $tokens
	*
	* @return array
	*/
	public function _parse_is_expr($is_arg, $tokens){}

	/**
	* parse modifier chain into PHP code
	*
	* @param string $output
	* @param string $modifier_string
	*
	*/
	public function _parse_modifiers($output, $modifier_string){}

	/**
	* parse arguments in function call parenthesis
	*
	* @param string $parenth_args
	*
	* @return string
	*/
	public function _parse_parenth_args($parenth_args){}

	/**
	* parse section property expression into PHP code
	*
	* @param string $section_prop_expr
	*
	* @return string
	*/
	public function _parse_section_prop($section_prop_expr){}

	/**
	* parse variable expression into PHP code
	*
	* @param string $var_expr
	* @param string $output
	*
	* @return string
	*/
	public function _parse_var($var_expr, $output){}

	/**
	* compile single variable and section properties token into PHP code
	*
	* @param string $val
	* @param string $tag_attrs
	*
	* @return string
	*/
	public function _parse_var_props($val, $tag_attrs){}

	/**
	* compile multiple variables and section properties tokens into PHP code
	*
	* @param array $tokens
	*
	*/
	public function _parse_vars_props($tokens){}

	/**
	* check if the compilation changes from non-cacheable to cacheable state with the end of the current plugin return php-code to reflect the transition.
	* @return string
	*/
	public function _pop_cacheable_state($type, $name){}

	/**
	* pop closing tag-name raise an error if this stack-top doesn't match with the closing tag
	* @return string
	*/
	public function _pop_tag($close_tag){}

	/**
	* check if the compilation changes from cacheable to non-cacheable state with the beginning of the current plugin. return php-code to reflect the transition.
	* @return string
	*/
	public function _push_cacheable_state($type, $name){}

	/**
	* push opening tag-name, file-name and line-number on the tag-stack
	*/
	public function _push_tag($open_tag){}

	/**
	* Quote subpattern references
	*
	* @param string $string
	*
	* @return string
	*/
	public function _quote_replace($string){}

	/**
	* display Smarty syntax error
	*
	* @param string $error_msg
	* @param integer $error_type
	* @param string $file
	* @param integer $line
	*
	*/
	public function _syntax_error($error_msg, $error_type="256", $file=null, $line=null){}

}
class phpthumb{
	var $AlphaCapableFormats = array(png);
	var $IMresizedData = null;
	var $allow_local_http_src = false;
	var $aoe = null;
	var $ar = null;
	var $bc = null;
	var $bg = null;
	var $cache_filename = null;
	var $config_allow_parameter_file = false;
	var $config_allow_parameter_goto = false;
	var $config_allow_src_above_docroot = false;
	var $config_allow_src_above_phpthumb = true;
	var $config_background_hexcolor = "FFFFFF";
	var $config_border_hexcolor = "000000";
	var $config_cache_default_only_suffix = false;
	var $config_cache_directory = null;
	var $config_cache_directory_depth = "0";
	var $config_cache_disable_warning = true;
	var $config_cache_force_passthru = true;
	var $config_cache_maxage = null;
	var $config_cache_maxfiles = null;
	var $config_cache_maxsize = null;
	var $config_cache_prefix = "";
	var $config_cache_source_directory = null;
	var $config_cache_source_enabled = false;
	var $config_cache_source_filemtime_ignore_local = false;
	var $config_cache_source_filemtime_ignore_remote = true;
	var $config_disable_debug = false;
	var $config_disable_imagecopyresampled = false;
	var $config_disable_onlycreateable_passthru = false;
	var $config_disable_pathinfo_parsing = false;
	var $config_document_root = null;
	var $config_error_bgcolor = "CCCCFF";
	var $config_error_die_on_error = false;
	var $config_error_die_on_source_failure = true;
	var $config_error_fontsize = "1";
	var $config_error_image_height = "100";
	var $config_error_image_width = "400";
	var $config_error_message_image_default = "";
	var $config_error_silent_die_on_error = false;
	var $config_error_textcolor = "FF0000";
	var $config_high_security_enabled = false;
	var $config_high_security_password = null;
	var $config_http_follow_redirect = true;
	var $config_http_fopen_timeout = "10";
	var $config_http_user_agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7";
	var $config_imagemagick_path = null;
	var $config_imagemagick_use_thumbnail = true;
	var $config_max_source_pixels = null;
	var $config_mysql_database = null;
	var $config_mysql_hostname = null;
	var $config_mysql_password = null;
	var $config_mysql_query = null;
	var $config_mysql_username = null;
	var $config_nohotlink_enabled = true;
	var $config_nohotlink_erase_image = true;
	var $config_nohotlink_text_message = "Off-server thumbnailing is not allowed";
	var $config_nohotlink_valid_domains = array();
	var $config_nooffsitelink_enabled = false;
	var $config_nooffsitelink_erase_image = true;
	var $config_nooffsitelink_require_refer = false;
	var $config_nooffsitelink_text_message = "Off-server linking is not allowed";
	var $config_nooffsitelink_valid_domains = array();
	var $config_nooffsitelink_watermark_src = "";
	var $config_output_format = "jpeg";
	var $config_output_interlace = true;
	var $config_output_maxheight = "0";
	var $config_output_maxwidth = "0";
	var $config_prefer_imagemagick = true;
	var $config_temp_directory = null;
	var $config_ttf_directory = "./fonts";
	var $config_use_exif_thumbnail_for_speed = false;
	var $debugmessages = array();
	var $debugtiming = array();
	var $down = null;
	var $dpi = "150";
	var $err = null;
	var $exif_raw_data = null;
	var $exif_thumbnail_data = null;
	var $exif_thumbnail_height = null;
	var $exif_thumbnail_type = null;
	var $exif_thumbnail_width = null;
	var $f = null;
	var $far = null;
	var $fatalerror = null;
	var $file = null;
	var $fltr = array();
	var $gdimg_output = null;
	var $gdimg_source = null;
	var $getimagesizeinfo = null;
	var $goto = null;
	var $h = null;
	var $hl = null;
	var $hp = null;
	var $hs = null;
	var $iar = null;
	var $is_alpha = false;
	var $iswindows = null;
	var $maxb = null;
	var $md5s = null;
	var $new = null;
	var $outputImageData = null;
	var $phpThumbDebug = null;
	var $phpthumb_version = "1.7.9-200712090829";
	var $q = "75";
	var $ra = null;
	var $rawImageData = null;
	var $sfn = "0";
	var $sh = null;
	var $sia = null;
	var $sourceFilename = null;
	var $source_height = null;
	var $source_width = null;
	var $src = null;
	var $sw = null;
	var $sx = null;
	var $sy = null;
	var $thumbnailCropH = null;
	var $thumbnailCropW = null;
	var $thumbnailCropX = null;
	var $thumbnailCropY = null;
	var $thumbnailFormat = null;
	var $thumbnailQuality = "75";
	var $thumbnail_height = null;
	var $thumbnail_image_height = null;
	var $thumbnail_image_width = null;
	var $thumbnail_width = null;
	var $useRawIMoutput = false;
	var $w = null;
	var $wl = null;
	var $wp = null;
	var $ws = null;
	var $xto = null;
	var $zc = null;
	public function AlphaChannelFlatten(){}

	public function AntiOffsiteLinking(){}

	public function ApplyFilters(){}

	public function CalculateThumbnailDimensions(){}

	public function CleanUpCacheDirectory(){}

	public function CreateGDoutput(){}

	public function DebugMessage($message, $file="", $line=""){}

	public function DebugTimingMessage($message, $file="", $line="", $timestamp="0"){}

	public function ErrorImage($text, $width="0", $height="0", $forcedisplay=false){}

	public function ExtractEXIFgetImageSize(){}

	public function FatalError($text){}

	public function FixedAspectRatio(){}

	public function GenerateThumbnail(){}

	public function ImageCreateFromFilename($filename){}

	public function ImageCreateFromStringReplacement($RawImageData, $DieOnErrors=false){}

	public function ImageMagickCommandlineBase(){}

	public function ImageMagickFormatsList(){}

	public function ImageMagickSwitchAvailable($switchname){}

	public function ImageMagickThumbnailToGD(){}

	public function ImageMagickVersion($returnRAW=false){}

	public function ImageMagickWhichConvert(){}

	public function ImageResizeFunction($dst_im, $src_im, $dstX, $dstY, $srcX, $srcY, $dstW, $dstH, $srcW, $srcH){}

	public function InitializeTempDirSetting(){}

	public function MaxFileSize(){}

	public function OffsiteDomainIsAllowed($hostname, $allowed_domains){}

	public function OutputThumbnail(){}

	public function RenderOutput(){}

	public function RenderToFile($filename){}

	public function ResolveFilenameToAbsolute($filename){}

	public function ResolveSource(){}

	public function Rotate(){}

	public function SetCacheFilename(){}

	public function SetOrientationDependantWidthHeight(){}

	public function SourceImageIsTooLarge($width, $height){}

	public function SourceImageToGD(){}

	public function getParameter($param){}

	public function phpThumbDebug($level=""){}

	public function phpThumbDebugVarDump($var){}

	public function phpThumb_tempnam(){}

	public function resetObject(){}

	public function setCacheDirectory(){}

	public function setOutputFormat(){}

	public function setParameter($param, $value){}

	public function setSourceData($rawImageData, $sourceFilename=""){}

	public function setSourceFilename($sourceFilename){}

	public function setSourceImageResource($gdimg){}

}
class phpthumb_functions{
	public function ApacheLookupURIarray($filename){}

	public function CaseInsensitiveInArray($needle, $haystack){}

	public function CleanUpURLencoding($url, $queryseperator="&"){}

	public function EnsureDirectoryExists($dirname){}

	public function FunctionIsDisabled($function){}

	public function GetAllFilesInSubfolders($dirname){}

	public function GetPixelColor($img, $x, $y){}

	public function GrayscalePixel($OriginalPixel){}

	public function GrayscalePixelRGB($rgb){}

	public function GrayscaleValue($r, $g, $b){}

	public function HexCharDisplay($string){}

	public function HexColorXOR($hexcolor){}

	public function ImageColorAllocateAlphaSafe($gdimg_hexcolorallocate, $R, $G, $B, $alpha=false){}

	public function ImageCopyResampleBicubic($dst_img, $src_img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h){}

	public function ImageCopyRespectAlpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $opacity_pct="100"){}

	public function ImageCreateFunction($x_size, $y_size){}

	public function ImageHexColorAllocate($gdimg_hexcolorallocate, $HexColorString, $dieOnInvalid=false, $alpha=false){}

	public function ImageTypeToMIMEtype($imagetype){}

	public function IsHexColor($HexColorString){}

	public function LittleEndian2String($number, $minbytes="1"){}

	public function OneOfThese(){}

	public function ParseURLbetter($url){}

	public function PixelColorDifferencePercent($currentPixel, $targetPixel){}

	public function ProportionalResize($old_width, $old_height, $new_width=false, $new_height=false){}

	public function SafeExec($command){}

	public function SafeURLread($url, $error, $timeout="10", $followredirects=true){}

	public function SanitizeFilename($filename){}

	public function ScaleToFitInBox($width, $height, $maxwidth=null, $maxheight=null, $allow_enlarge=true, $allow_reduce=true){}

	public function TranslateWHbyAngle($width, $height, $angle){}

	public function URLreadFsock($host, $file, $errstr, $successonly=true, $port="80", $timeout="10"){}

	public function builtin_function_exists($functionname){}

	public function exif_info(){}

	public function filedate_remote($remotefile, $timeout="10"){}

	public function filesize_remote($remotefile, $timeout="10"){}

	public function gd_is_bundled(){}

	public function gd_version($fullstring=false){}

	public function md5_file_safe($filename){}

	public function nonempty_min(){}

	public function phpinfo_array(){}

	public function user_function_exists($functionname){}

	public function version_compare_replacement($version1, $version2, $operator=""){}

	public function version_compare_replacement_sub($version1, $version2, $operator=""){}

}
class modPhpThumb extends phpthumb{
	/**
	* PHPTHUMB HELPER METHODS *
	*/
	public function RedirectToCachedFile(){}

	public function SendSaveAsFileHeaderIfNeeded(){}

	/**
	* Cache the generated thumbnail.
	*/
	public function cache(){}

	/**
	* Check to see if cached file already exists
	*/
	public function checkForCachedFile(){}

	/**
	* Generate a thumbnail
	*/
	public function generate(){}

	/**
	* Setup some site-wide phpthumb options from modx config
	*/
	public function initialize(){}

	/**
	* Load cached file
	*/
	public function loadCache(){}

	/**
	* Output a thumbnail.
	*/
	public function output(){}

	/**
	* Sets the source image
	*/
	public function set($src){}

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
	var $agent = "Snoopy v1.0";
	var $cookies = array();
	var $curl_path = "/usr/bin/curl";
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
	var $proxy_port = "";
	var $rawheaders = array();
	var $read_timeout = "0";
	var $referer = "";
	var $response_code = "";
	var $results = "";
	var $status = "0";
	var $timed_out = false;
	var $use_gzip = true;
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

	public function setcookies(){}

}
class MagpieRSS{
	var $ERROR = "";
	var $WARNING = "";
	var $_CONTENT_CONSTRUCTS = array(content);
	var $_KNOWN_ENCODINGS = array(UTF-8);
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
class modRSSParser{
	/**
	* Parses and interprets an RSS or Atom URL
	*
	* @param string $url
	*
	* @return array
	*/
	public function parse($url){}

}
class RSSCache{
	var $BASE_CACHE = "./cache";
	var $ERROR = "";
	var $MAX_AGE = "3600";
	public function cache_age($url){}

	public function check_cache($url){}

	public function debug($debugmsg, $lvl="1024"){}

	public function error($errormsg, $lvl="512"){}

	public function file_name($url){}

	public function get($url){}

	public function serialize($rss){}

	public function set($url, $rss){}

	public function unserialize($data){}

}
class xmlrpc_client{
	var $accepted_charset_encodings = array();
	/** 
	* List of http compression methods accepted by the client for responses.
	*/
	var $accepted_compression = array();
	var $authtype = "1";
	var $cacert = "";
	var $cacertdir = "";
	var $cert = "";
	var $certpass = "";
	var $cookies = array();
	var $debug = "0";
	var $errno = null;
	var $errstr = null;
	var $keepalive = false;
	var $key = "";
	var $keypass = "";
	var $method = "http";
	var $no_multicall = false;
	var $password = "";
	var $path = null;
	var $port = "0";
	var $proxy = "";
	var $proxy_authtype = "1";
	var $proxy_pass = "";
	var $proxy_user = "";
	var $proxyport = "0";
	var $request_charset_encoding = "";
	/** 
	* Name of compression scheme to be used for sending requests.
	*/
	var $request_compression = "";
	/** 
	* Decides the content of xmlrpcresp objects returned by calls to send() valid strings are 'xmlrpcvals', 'phpvals' or 'xml'
	*/
	var $return_type = "xmlrpcvals";
	var $server = null;
	var $username = "";
	var $verifyhost = "1";
	var $verifypeer = true;
	/** 
	* CURL handle: used for keep-alive connections (PHP 4.3.8 up, see: http://curl.haxx.se/docs/faq.html#7.3)
	*/
	var $xmlrpc_curl_handle = null;
	/**
	* Attempt to boxcar $msgs via system.multicall.
	*/
	public function _try_multicall($msgs, $timeout, $method){}

	/**
	* Send an array of request messages and return an array of responses.
	*
	* @param array $msgs
	* @param integer $timeout
	* @param string $method
	*
	* @return array
	*/
	public function multicall($msgs, $timeout="0", $method="", $fallback=true){}

	/**
	* Send an xmlrpc request
	*
	* @param mixed $msg
	* @param integer $timeout
	* @param string $method
	*
	* @return \xmlrpcresp
	*/
	public function send($msg, $timeout="0", $method=""){}

	/**
	* Contributed by Justin Miller <justin@voxel.net> Requires curl to be built into PHP NB: CURL versions before 7.11.10 cannot use proxy to talk to https servers!
	*/
	public function sendPayloadCURL($msg, $server, $port, $timeout="0", $username="", $password="", $authtype="1", $cert="", $certpass="", $cacert="", $cacertdir="", $proxyhost="", $proxyport="0", $proxyusername="", $proxypassword="", $proxyauthtype="1", $method="https", $keepalive=false, $key="", $keypass=""){}

	public function sendPayloadHTTP10($msg, $server, $port, $timeout="0", $username="", $password="", $authtype="1", $proxyhost="", $proxyport="0", $proxyusername="", $proxypassword="", $proxyauthtype="1"){}

	public function sendPayloadHTTPS($msg, $server, $port, $timeout="0", $username="", $password="", $authtype="1", $cert="", $certpass="", $cacert="", $cacertdir="", $proxyhost="", $proxyport="0", $proxyusername="", $proxypassword="", $proxyauthtype="1", $keepalive=false, $key="", $keypass=""){}

	/**
	* Enables/disables reception of compressed xmlrpc responses.
	*
	* @param string $compmethod
	*
	*/
	public function setAcceptedCompression($compmethod){}

	/**
	* Add a CA certificate to verify server with (see man page about CURLOPT_CAINFO for more details
	*
	* @param string $cacert
	* @param bool $is_dir
	*
	*/
	public function setCaCertificate($cacert, $is_dir=false){}

	/**
	* Add a client-side https certificate
	*
	* @param string $cert
	* @param string $certpass
	*
	*/
	public function setCertificate($cert, $certpass){}

	/**
	* Adds a cookie to list of cookies that will be sent to server.
	*
	* @param string $name
	* @param string $value
	* @param string $path
	* @param string $domain
	* @param int $port
	*
	*/
	public function setCookie($name, $value="", $path="", $domain="", $port=null){}

	/**
	* Add some http BASIC AUTH credentials, used by the client to authenticate
	*
	* @param string $u
	* @param string $p
	* @param integer $t
	*
	*/
	public function setCredentials($u, $p, $t="1"){}

	/**
	* Enables/disables the echoing to screen of the xmlrpc responses received
	*
	* @param integer $debug
	*
	*/
	public function setDebug($in, $debug){}

	/**
	* Set attributes for SSL communication: private SSL key NB: does not work in older php/curl installs Thanks to Daniel Convissor
	*
	* @param string $key
	* @param string $keypass
	*
	*/
	public function setKey($key, $keypass){}

	/**
	* Set proxy info
	*
	* @param string $proxyhost
	* @param string $proxyport
	* @param string $proxyusername
	* @param string $proxypassword
	* @param int $proxyauthtype
	*
	*/
	public function setProxy($proxyhost, $proxyport, $proxyusername="", $proxypassword="", $proxyauthtype="1"){}

	/**
	* Enables/disables http compression of xmlrpc request.
	*
	* @param string $compmethod
	*
	*/
	public function setRequestCompression($compmethod){}

	/**
	* Set attributes for SSL communication: verify match of server cert w. hostname
	*
	* @param int $i
	*
	*/
	public function setSSLVerifyHost($i){}

	/**
	* Set attributes for SSL communication: verify server certificate
	*
	* @param bool $i
	*
	*/
	public function setSSLVerifyPeer($i){}

	/**
	*
	* @param string $path
	* @param string $server
	* @param integer $port
	* @param string $method
	*
	*/
	public function xmlrpc_client($path, $server="", $port="", $method=""){}

}
class xmlrpcresp{
	var $_cookies = array();
	var $content_type = "text/xml";
	var $errno = "0";
	var $errstr = "";
	var $hdrs = array();
	var $payload = null;
	var $raw_data = "";
	var $val = "0";
	var $valtyp = null;
	/**
	* Returns an array with the cookies received from the server.
	* @return array
	*/
	public function cookies(){}

	/**
	* Returns the error code of the response.
	* @return integer
	*/
	public function faultCode(){}

	/**
	* Returns the error code of the response.
	* @return string
	*/
	public function faultString(){}

	/**
	* Returns xml representation of the response. XML prologue not included
	*
	* @param string $charset_encoding
	*
	* @return string
	*/
	public function serialize($charset_encoding=""){}

	/**
	* Returns the value received by the server.
	* @return mixed
	*/
	public function value(){}

	/**
	*
	* @param mixed $val
	* @param integer $fcode
	* @param string $fstr
	* @param string $valtyp
	*
	*/
	public function xmlrpcresp($val, $fcode="0", $fstr="", $valtyp=""){}

}
class xmlrpcmsg{
	var $content_type = "text/xml";
	var $debug = "0";
	var $methodname = null;
	var $params = array();
	var $payload = null;
	/**
	* Add a parameter to the list of parameters to be used upon method invocation
	*
	* @param \xmlrpcval $par
	*
	* @return boolean
	*/
	public function addParam($par){}

	public function createPayload($charset_encoding=""){}

	/**
	* Returns the number of parameters in the messge.
	* @return integer
	*/
	public function getNumParams(){}

	/**
	* Returns the nth parameter in the message. The index zero-based.
	*
	* @param integer $i
	*
	* @return \xmlrpcval
	*/
	public function getParam($i){}

	public function kindOf(){}

	/**
	* Gets/sets the xmlrpc method to be invoked
	*
	* @param string $meth
	*
	* @return string
	*/
	public function method($meth=""){}

	/**
	* Parse the xmlrpc response contained in the string $data and return an xmlrpcresp object.
	*
	* @param string $data
	* @param bool $headers_processed
	* @param string $return_type
	*
	* @return \xmlrpcresp
	*/
	public function parseResponse($data="", $headers_processed=false, $return_type="xmlrpcvals"){}

	/**
	* Given an open file handle, read all data available and parse it as axmlrpc response.
	* @return \xmlrpcresp
	*/
	public function parseResponseFile($fp){}

	/**
	* Parses HTTP headers and separates them from data.
	*/
	public function parseResponseHeaders($data, $headers_processed=false){}

	/**
	* Returns xml representation of the message. XML prologue included
	* @return string
	*/
	public function serialize($charset_encoding=""){}

	public function xml_footer(){}

	public function xml_header($charset_encoding=""){}

	/**
	*
	* @param string $meth
	* @param array $pars
	*
	*/
	public function xmlrpcmsg($meth, $pars="0"){}

}
class xmlrpcval{
	var $_php_class = null;
	var $me = array();
	var $mytype = "0";
	/**
	* Add an array of xmlrpcval objects to an xmlrpcval
	*
	* @param array $vals
	*
	* @return int
	*/
	public function addArray($vals){}

	/**
	* Add a single php value to an (unitialized) xmlrpcval
	*
	* @param mixed $val
	* @param string $type
	*
	* @return int
	*/
	public function addScalar($val, $type="string"){}

	/**
	* Add an array of named xmlrpcval objects to an xmlrpcval
	*
	* @param array $vals
	*
	* @return int
	*/
	public function addStruct($vals){}

	/**
	* Returns the m-th member of an xmlrpcval of struct type
	*
	* @param integer $m
	*
	* @return \xmlrpcval
	*/
	public function arraymem($m){}

	/**
	* Returns the number of members in an xmlrpcval of array type
	* @return integer
	*/
	public function arraysize(){}

	public function dump($ar){}

	public function getval(){}

	/**
	* Returns a string containing "struct", "array" or "scalar" describing the base type of the value
	* @return string
	*/
	public function kindOf(){}

	/**
	* Returns the type of the xmlrpcval.
	* @return string
	*/
	public function scalartyp(){}

	/**
	* Returns the value of a scalar xmlrpcval
	* @return mixed
	*/
	public function scalarval(){}

	/**
	* Returns xml representation of the value. XML prologue not included
	*
	* @param string $charset_encoding
	*
	* @return string
	*/
	public function serialize($charset_encoding=""){}

	public function serializedata($typ, $val, $charset_encoding=""){}

	public function serializeval($o){}

	/**
	* Return next member element for xmlrpcvals of type struct.
	* @return \xmlrpcval
	*/
	public function structeach(){}

	/**
	* Returns the value of a given struct member (an xmlrpcval object in itself).
	*
	* @param string $m
	*
	* @return \xmlrpcval
	*/
	public function structmem($m){}

	/**
	* Checks wheter a struct member with a given name is present.
	*
	* @param string $m
	*
	* @return boolean
	*/
	public function structmemexists($m){}

	/**
	* Reset internal pointer for xmlrpcvals of type struct.
	*/
	public function structreset(){}

	/**
	* Returns the number of members in an xmlrpcval of struct type
	* @return integer
	*/
	public function structsize(){}

	/**
	*
	* @param mixed $val
	* @param string $type
	*
	*/
	public function xmlrpcval($val="-1", $type=""){}

}
class xmlrpc_server{
	var $accepted_charset_encodings = array();
	/** 
	* List of http compression methods accepted by the server for requests.
	*/
	var $accepted_compression = array();
	var $allow_system_funcs = true;
	/** 
	* When set to true, it will enable HTTP compression of the response, in case the client has declared its support for compression in the request.
	*/
	var $compress_response = false;
	var $debug = "1";
	var $debug_info = "";
	var $dmap = array();
	/** 
	* Defines how functions in dmap will be invokde: either using an xmlrpc msg object or plain php values.
	*/
	var $functions_parameters_type = "xmlrpcvals";
	/** 
	* charset encoding to be used for response.
	*/
	var $response_charset_encoding = "";
	var $user_data = null;
	/**
	* Add a method to the dispatch map
	*
	* @param string $methodname
	* @param string $function
	* @param array $sig
	* @param string $doc
	*
	*/
	public function add_to_map($methodname, $function, $sig=null, $doc=""){}

	/**
	* add a string to the 'internal debug message' (separate from 'user debug message')
	*
	* @param string $strings
	*
	*/
	public function debugmsg($string, $strings){}

	/**
	* A debugging routine: just echoes back the input packet as a string value DEPRECATED!
	*/
	public function echoInput(){}

	/**
	* Execute a method invoked by the client, checking parameters used
	*
	* @param mixed $m
	* @param array $params
	* @param array $paramtypes
	*
	* @return \xmlrpcresp
	*/
	public function execute($m, $params=null, $paramtypes=null){}

	/**
	* Parse an xml chunk containing an xmlrpc request and execute the corresponding php function registered with the server
	*
	* @param string $data
	* @param string $req_encoding
	*
	* @return \xmlrpcresp
	*/
	public function parseRequest($data, $req_encoding=""){}

	/**
	* Parse http headers received along with xmlrpc request. If needed, inflate request
	* @return null
	*/
	public function parseRequestHeaders($data, $req_encoding, $resp_encoding, $resp_compression){}

	/**
	* Return a string with the serialized representation of all debug info
	*
	* @param string $charset_encoding
	*
	* @return string
	*/
	public function serializeDebug($charset_encoding=""){}

	/**
	* Execute the xmlrpc request, printing the response
	*
	* @param string $data
	*
	* @return \xmlrpcresp
	*/
	public function service($data=null, $return_payload=false){}

	/**
	* Set debug level of server.
	*
	* @param integer $in
	*
	*/
	public function setDebug($in){}

	/**
	* Verify type and number of parameters received against a list of known signatures
	*
	* @param array $in
	* @param array $sig
	*
	*/
	public function verifySignature($in, $sig){}

	public function xml_header($charset_encoding=""){}

	/**
	*
	* @param array $dispmap
	* @param boolean $servicenow
	*
	*/
	public function xmlrpc_server($dispMap=null, $serviceNow=true, $dispmap, $servicenow){}

}
class modResponse{
	/** 
	* The body of this response
	* @var string $body
	*/
	var $body = null;
	/** 
	* The current content type on the resource
	* @var modContentType $contentType
	*/
	var $contentType = null;
	/** 
	* The HTTP header for this Response
	* @var string $header
	*/
	var $header = null;
	/** 
	* A reference to the modX instance
	* @var modX $modx
	*/
	var $modx = null;
	/**
	* Checks to see if the preview parameter is set.
	* @return boolean
	*/
	public function checkPreview(){}

	/**
	* Prepare the final response after the resource has been processed.
	*
	* @param array $options
	*
	*/
	public function outputContent($options=array()){}

	/**
	* Sends a redirect to the specified URL using the specified method.
	*
	* @param string $url
	* @param array $options
	* @param string $type
	* @param string $responseCode
	*
	* @return void|boolean
	*/
	public function sendRedirect($url, $options=false, $type="", $responseCode=""){}

}
class modXMLRPCResponse extends modResponse{
	/** 
	* The XML-RPC server attached to this response
	* @var xmlrpc_server
	*/
	var $server = null;
	/** 
	* A collection of services attached to this response
	* @var array
	*/
	var $services = array();
	/**
	* Gets the XML-RPC server for this response
	*
	* @param boolean $execute
	*
	* @return boolean
	*/
	public function getServer($execute=false){}

	/**
	* Registers a service to this response
	*
	* @param string $key
	* @param string $signature
	*
	*/
	public function registerService($key, $signature){}

	/**
	* Unregisters a service from this response
	*
	* @param string $key
	*
	*/
	public function unregisterService($key){}

}
class modValidator extends xPDOValidator{
}
class modTransportPackage extends xPDOObject{
	/** 
	* @var string The unique identifier of a package.
	*/
	var $identifier = null;
	/** 
	* @var mixed The package to transport.
	*/
	var $package = null;
	/** 
	* @var string The release number of a package; eg, pl, beta, alpha, dev
	*/
	var $release = null;
	/** 
	* @var string The version number of a package.
	*/
	var $version = null;
	/**
	* Compares this version of the package to another
	*
	* @param string $version
	* @param string $direction
	*
	* @return boolean
	*/
	public function compareVersion($version, $direction="<="){}

	/**
	* Gets a version string able to be used by version_compare for checking
	* @return string
	*/
	public function getComparableVersion(){}

	/**
	* Gets the package's transport mechanism.
	*
	* @param integer $state
	*
	* @return mixed
	*/
	public function getTransport($state="-1"){}

	/**
	* Installs or upgrades the package.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function install($options=array()){}

	/**
	* List the packages from this transport package
	*
	* @param \modX $modx
	* @param int $limit
	* @param int $offset
	* @param string $search
	*
	* @return array
	*/
	public function listPackages($modx, $workspace, $limit="0", $offset="0", $search=""){}

	/**
	* Parses the signature.
	* @return boolean
	*/
	public function parseSignature(){}

	/**
	* Indicates if a previous version of the package is installed.
	* @return boolean
	*/
	public function previousVersionInstalled(){}

	/**
	* Removes and uninstalls the package.
	*
	* @param boolean $force
	* @param boolean $uninstall
	*
	* @return boolean
	*/
	public function removePackage($force=false, $uninstall=true){}

	/**
	* Transfers the package from one directory to another.
	*
	* @param string $sourceFile
	* @param string $targetDir
	*
	* @return boolean
	*/
	public function transferPackage($sourceFile, $targetDir){}

	/**
	* Uninstalls the package.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function uninstall($options=array()){}

}
class modTransportPackage_sqlsrv extends modTransportPackage{
	/**
	*
	* @param modX $modx
	*
	*/
	public function listPackageVersions($modx, $criteria, $limit="0", $offset="0"){}

}
class modTransportProvider extends xPDOSimpleObject{
	/**
	* Get the client responsible for communicating with the provider.
	* @return \jsonrpc_client
	*/
	public function getClient(){}

	/**
	* Handles the response from the provider. Returns response in array format.
	*
	* @param \jsonrpcresp $response
	*
	* @return array
	*/
	public function handleResponse($response){}

	/**
	* Sends a REST request to the provider
	*
	* @param string $path
	* @param string $method
	* @param array $params
	*
	* @return mixed
	*/
	public function request($path, $method="GET", $params=array()){}

	/**
	* Verifies the authenticity of the provider
	* @return boolean
	*/
	public function verify(){}

}
class modTransportProvider_sqlsrv extends modTransportProvider{
}
class modTransportPackage_mysql extends modTransportPackage{
	/**
	*
	* @param modX $modx
	*
	*/
	public function listPackageVersions($modx, $criteria, $limit="0", $offset="0"){}

}
class modTransportProvider_mysql extends modTransportProvider{
}
class modPackageBuilder{
	/** 
	* @var array An array of classnames to automatically select by namespace
	*/
	var $autoselects = null;
	/** 
	* @var string The directory in which the package file is located.
	*/
	var $directory = null;
	/** 
	* @var string The filename of the actual package.
	*/
	var $filename = null;
	/** 
	* @var string The modNamespace that the package is associated with.
	*/
	var $namespace = null;
	/** 
	* @var string The xPDOTransport package object.
	*/
	var $package = null;
	/** 
	* @var string The unique signature for the package.
	*/
	var $signature = null;
	/**
	* Generates the model from a schema.
	*
	* @param string $model
	* @param string $schema
	*
	* @return boolean
	*/
	public function buildSchema($model, $schema){}

	/**
	*
	* @param string $name
	* @param string $version
	* @param string $release
	*
	*/
	public function create($name, $version, $release=""){}

	/**
	* Creates a new xPDOTransport package.
	*
	* @param string $name
	* @param string $version
	* @param string $release
	*
	* @return \xPDOTransport
	*/
	public function createPackage($name, $version, $release=""){}

	/**
	* Creates the modTransportVehicle for the specified object.
	*
	* @param \xPDOObject $obj
	* @param array $attr
	*
	* @return \modTransportVehicle
	*/
	public function createVehicle($obj, $attr){}

	/**
	* Retrieves the package signature.
	* @return string
	*/
	public function getSignature(){}

	/**
	* Packs the package.
	* @return boolean
	*/
	public function pack(){}

	/**
	* Puts the vehicle into the package.
	*
	* @param \modTransportVehicle $vehicle
	*
	* @return boolean
	*/
	public function putVehicle($vehicle){}

	/**
	* Registers a namespace to the transport package. If no namespace is found, will create a namespace.
	*
	* @param string $ns
	* @param boolean $autoincludes
	* @param boolean $packageNamespace
	* @param string $path
	*
	* @return boolean
	*/
	public function registerNamespace($ns="core", $autoincludes=true, $packageNamespace=true, $path="", $assetsPath=""){}

	/**
	* Sets the classes that are to automatically be included and built into the package.
	*
	* @param array $classes
	*
	* @return void
	*/
	public function setAutoSelects($classes=array()){}

	/**
	* Set an array of attributes into the xPDOTransport manifest.
	*
	* @param array $attributes
	*
	* @return null
	*/
	public function setPackageAttributes($attributes=array()){}

	/**
	* Allows for customization of the package workspace.
	*
	* @param integer $workspace_id
	*
	* @return \modWorkspace
	*/
	public function setWorkspace($workspace_id){}

}
class modTranslate095{
	/** 
	* A reference to the modX instance
	* @var modX $modx
	*/
	var $modx = null;
	/** 
	* The parsing engine for interpreting Evolution-style tags
	* @var modParser095
	*/
	var $parser = null;
	/**
	* Gets the parsing engine
	* @return \modParser095
	*/
	public function getParser(){}

	/**
	* Translate specific files
	*
	* @param boolean $save
	* @param array $files
	*
	* @return string
	*/
	public function translateFiles($save=false, $files=array()){}

	/**
	* Translate the site into Revolution-style tags
	*
	* @param boolean $save
	* @param null $classes
	* @param array $files
	* @param boolean $toFile
	*
	* @return void
	*/
	public function translateSite($save=false, $classes=null, $files=array(), $toFile=false){}

}
class modTranslator extends modTranslate095{
	/** 
	* @var array Can either be an array of array of classname => fields to translate,
 empty to skip classes or null to process all standard content
 fields for MODX (use processAllFields())
	*/
	var $classes = null;
	/** 
	* @var array An array of files (with full paths) to be translated
	*/
	var $files = null;
	/** 
	* @var array Paths of files, according to the patterns, to be translated (recursive)
	*/
	var $paths = null;
	/** 
	* @var string File patterns to limit the file types to be included for translation in the paths
	*/
	var $patterns = null;
	/** 
	* @var boolean If true, paths added will be recursively translated.
	*/
	var $recursive = null;
	/**
	* Adds a class to be translated.
	*/
	public function addClass(){}

	/**
	* Adds a file to be translated.
	*/
	public function addFile(){}

	/**
	* Adds a path to be translated.
	*/
	public function addPath(){}

	/**
	* Adds a pattern to be translated.
	*/
	public function addPattern(){}

	/**
	* Recursively adds all subdirs of a directory.
	*
	* @param string $path
	*
	*/
	public function getAllSubdirs($path){}

	/**
	* Sets the translator to process all standard MODX fields.
	*
	* @param boolean $b
	*
	*/
	public function processAllFields($b=true){}

}
class modTransportManager{
	/** 
	* @var array The configuration array for the TransportManager.
	*/
	var $config = array();
	/** 
	* @var MODX A reference to the MODX object.
	*/
	var $modx = null;
	/** 
	* @var array An array of active providers.
	*/
	var $providers = array();
	/** 
	* @var modWorkspace The active MODX workspace.
	*/
	var $workspace = null;
	/**
	* Change the active workspace in MODX.
	*
	* @param integer $workspaceId
	*
	* @return \modWorkspace
	*/
	public function changeActiveWorkspace($workspaceId){}

	/**
	* Get the active workspace for the MODX installation.
	* @return \modWorkspace
	*/
	public function getActiveWorkspace(){}

	/**
	* Get a list of providers for the transports.
	*
	* @param boolean $refresh
	*
	* @return array
	*/
	public function getProviders($refresh=false){}

	/**
	* Scans all providers for a list of packages.
	* @return array
	*/
	public function scanForPackages(){}

	/**
	* Scans all providers for a list of updates for all packages.
	* @return array
	*/
	public function scanForUpdates(){}

}
class modTransportVehicle{
	/** 
	* @var array The collection of attributes to attach to the vehicle.
	*/
	var $attributes = null;
	/** 
	* @var mixed The actual object or artifact payload that the vehicle represents.
	*/
	var $obj = null;
	/** 
	* @var array The collection of dependencies to resolve post-install/upgrade.
	*/
	var $resolvers = null;
	/** 
	* @var string The collection of dependences to validate against pre-install/upgrade.
	*/
	var $validators = null;
	/**
	* Compiles the attributes array to pass on to the modPackageBuilder instance.
	* @return array
	*/
	public function compile(){}

	/**
	* Returns the artifact payload associated with the vehicle.
	* @return mixed
	*/
	public function fetch(){}

	/**
	* Adds a post-save resolver to the vehicle.
	*
	* @param string $type
	* @param array $options
	*
	* @return array
	*/
	public function resolve($type, $options){}

	/**
	* Adds a pre-creation validator to the vehicle.
	*
	* @param string $type
	* @param array $options
	*
	* @return array
	*/
	public function validate($type, $options){}

}
class modXMLPackageBuilder extends modPackageBuilder{
	/**
	* Build the package from a specific XML file
	*
	* @param string $fileName
	*
	* @return bool
	*/
	public function build($fileName){}

	/**
	* Parse the XML file
	*
	* @param string $fileName
	*
	* @return bool
	*/
	public function parseXML($fileName){}

}
class modAccess extends xPDOSimpleObject{
}
class modAccess_sqlsrv extends modAccess{
}
class modAccessAction extends modAccess{
}
class modAccessAction_sqlsrv extends modAccessAction{
}
class modAccessActionDom extends modAccess{
}
class modAccessActionDom_sqlsrv extends modAccessActionDom{
}
class modAccessCategory extends modAccess{
	/**
	* Load the attributes for the ACLs for the category
	*
	* @param \modX $modx
	* @param string $context
	* @param int $userId
	*
	* @return array
	*/
	public function loadAttributes($modx, $context="", $userId="0"){}

}
class modAccessCategory_sqlsrv extends modAccessCategory{
}
class modAccessContext extends modAccess{
	/**
	* Load the attributes for the ACLs for the context
	*
	* @param \modX $modx
	* @param string $context
	* @param int $userId
	*
	* @return array
	*/
	public function loadAttributes($modx, $context="", $userId="0"){}

}
class modAccessContext_sqlsrv extends modAccessContext{
}
class modAccessElement extends modAccess{
}
class modAccessElement_sqlsrv extends modAccessElement{
}
class modAccessibleObject_sqlsrv extends modAccessibleObject{
}
class modAccessibleSimpleObject_sqlsrv extends modAccessibleSimpleObject{
}
class modAccessMenu extends modAccess{
}
class modAccessMenu_sqlsrv extends modAccessMenu{
}
class modAccessPermission extends xPDOSimpleObject{
}
class modAccessPermission_sqlsrv extends modAccessPermission{
}
class modAccessPolicy extends xPDOSimpleObject{
	/**
	* Get the permissions for this access policy, in array format.
	* @return array
	*/
	public function getPermissions(){}

}
class modAccessPolicy_sqlsrv extends modAccessPolicy{
}
class modAccessPolicyTemplate extends xPDOSimpleObject{
}
class modAccessPolicyTemplate_sqlsrv extends modAccessPolicyTemplate{
}
class modAccessPolicyTemplateGroup extends xPDOSimpleObject{
}
class modAccessPolicyTemplateGroup_sqlsrv extends modAccessPolicyTemplateGroup{
}
class modAccessResource extends modAccess{
}
class modAccessResource_sqlsrv extends modAccessResource{
}
class modAccessResourceGroup extends modAccess{
	/**
	* Load the attributes for the ACLs for the Resource Group
	*
	* @param \modX $modx
	* @param string $context
	* @param int $userId
	*
	* @return array
	*/
	public function loadAttributes($modx, $context="", $userId="0"){}

}
class modAccessResourceGroup_sqlsrv extends modAccessResourceGroup{
}
class modAccessTemplateVar extends modAccessElement{
}
class modAccessTemplateVar_sqlsrv extends modAccessTemplateVar{
}
class modAction extends modAccessibleSimpleObject{
	/**
	* Rebuilds the action map cache.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function rebuildCache($options=array()){}

}
class modAction_sqlsrv extends modAction{
}
class modActionDom extends modAccessibleSimpleObject{
	/**
	* Apply the rule to the current page.
	*
	* @param int $objId
	*
	* @return string
	*/
	public function apply($objId=""){}

}
class modActionDom_sqlsrv extends modActionDom{
}
class modActionField extends xPDOSimpleObject{
}
class modActionField_sqlsrv extends modActionField{
}
class modActiveUser extends xPDOObject{
}
class modActiveUser_sqlsrv extends modActiveUser{
}
class modCategory extends modAccessibleSimpleObject{
	/**
	* Build the closure table for this instance.
	* @return boolean
	*/
	public function buildClosure(){}

	/**
	* Rebuild closure table records for this instance, i.e. parent changed.
	*/
	public function rebuildClosure(){}

}
class modCategory_sqlsrv extends modCategory{
}
class modCategoryClosure extends xPDOObject{
}
class modCategoryClosure_sqlsrv extends modCategoryClosure{
}
class modChunk extends modElement{
}
class modChunk_sqlsrv extends modChunk{
}
class modClassMap extends xPDOSimpleObject{
}
class modClassMap_sqlsrv extends modClassMap{
}
class modContentType extends xPDOSimpleObject{
	/**
	* Returns the first extension of this Content Type.
	* @return string
	*/
	public function getExtension(){}

}
class modContentType_sqlsrv extends modContentType{
}
class modContext extends modAccessibleObject{
	/** 
	* The alias map for this context
	* @var array $aliasMap
	*/
	var $aliasMap = null;
	/** 
	* An array of configuration options for this context
	* @var array $config
	*/
	var $config = null;
	/** 
	* The event map for all events being executed in this context
	* @var array $eventMap
	*/
	var $eventMap = null;
	/** 
	* The plugin cache array for all plugins being fired in this context
	* @var array $pluginCache
	*/
	var $pluginCache = null;
	/** 
	* The resource map for all resources in this context
	* @var array $resourceMap
	*/
	var $resourceMap = null;
	/** 
	* A map of WebLink Resources with their target URLs
	* @var array $webLinkMap
	*/
	var $webLinkMap = null;
	/**
	* Returns the file name representing this context in the cache.
	* @return string
	*/
	public function getCacheKey(){}

	/**
	* Get and execute a PDOStatement representing data for the aliasMap and resourceMap.
	* @return \PDOStatement|null
	*/
	public function getResourceCacheMap(){}

	/**
	* Prepare and execute a PDOStatement to retrieve data needed for $aliasMap and $resourceMap.
	* @return \PDOStatement|bool
	*/
	public function getResourceCacheMapStmt($context){}

	/**
	* Get a Resource URI in this Context by id.
	*
	* @param string $id
	*
	* @return string|bool
	*/
	public function getResourceURI($id){}

	/**
	* Get and execute a PDOStatement representing data for the webLinkMap.
	* @return \PDOStatement|null
	*/
	public function getWebLinkCacheMap(){}

	/**
	* Prepare and execute a PDOStatement to retrieve data needed for $webLinkMap.
	* @return \PDOStatement|bool
	*/
	public function getWebLinkCacheMapStmt($context){}

	/**
	* Generates a URL representing a specified resource in this context.
	*
	* @param integer $id
	* @param string $args
	* @param mixed $scheme
	* @param array $options
	*
	* @return string
	*/
	public function makeUrl($id, $args="", $scheme="-1", $options=array()){}

	/**
	* Prepare a context for use.
	*
	* @param boolean $regenerate
	*
	* @return boolean
	*/
	public function prepare($regenerate=false, $options=array()){}

}
class modContext_sqlsrv extends modContext{
}
class modContextResource extends xPDOObject{
}
class modContextResource_sqlsrv extends modContextResource{
}
class modContextSetting extends xPDOObject{
	/**
	* Updates the Lexicon Entry translation for this Context Setting
	*
	* @param string $key
	* @param string $value
	* @param array $options
	*
	* @return bool
	*/
	public function updateTranslation($key, $value="", $options=array()){}

}
class modContextSetting_sqlsrv extends modContextSetting{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listSettings($xpdo, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modDashboard extends xPDOSimpleObject{
	/**
	* Get the default MODX dashboard
	*
	* @param \xPDO $xpdo
	*
	* @return \An|null|object
	*/
	public function getDefaultDashboard($xpdo){}

	/**
	* Render the Dashboard
	*
	* @param \modManagerController $controller
	*
	* @return string
	*/
	public function render($controller){}

}
class modDashboard_sqlsrv extends modDashboard{
}
class modDashboardWidget extends xPDOSimpleObject{
	/**
	* Return the output for the widget, processed by type
	*
	* @param \modManagerController $controller
	*
	* @return mixed
	*/
	public function getContent($controller){}

}
abstract class modDashboardWidgetInterface{
	/** 
	* @var string
	*/
	var $content = "";
	/** 
	* A reference to the currently loaded manager controller
	* @var modManagerController $controller
	*/
	var $controller = null;
	/** 
	* Allows widgets to specify a CSS class to attach to the block
	* @var string
	*/
	var $cssBlockClass = "";
	/** 
	* A reference to the modX|xPDO instance
	* @var xPDO|modX $modx
	*/
	var $modx = null;
	/** 
	* A reference to the Namespace that this widget is executing in
	* @var modNamespace $namespace
	*/
	var $namespace = null;
	/** 
	* A reference to this class's widget
	* @var modDashboardWidget $widget
	*/
	var $widget = null;
	/**
	*
	* @param string $tpl
	* @param array $placeholders
	*
	* @return string
	*/
	public function getFileChunk($tpl, $placeholders=array()){}

	/**
	* Renders the content of the block in the appropriate size
	* @return string
	*/
	public function process(){}

	/**
	* Must be declared in your derivative class. Must return the processed output of the widget.
	* @return string
	*/
	public function render(){}

	/**
	* Render the widget content as if it were a Snippet
	*
	* @param string $content
	*
	* @return string
	*/
	public function renderAsSnippet($content=""){}

	/**
	* Set the widget content
	*
	* @param string $content
	*
	* @return void
	*/
	public function setContent($content){}

	/**
	* Sets the Namespace that this widget will execute in
	*
	* @param \modNamespace $namespace
	*
	* @return void
	*/
	public function setNamespace($namespace){}

	/**
	* Returns an array of placeholders for the block from the widget class. Override to add or change placeholders.
	* @return array
	*/
	public function toArray(){}

}
class modDashboardFileWidget extends modDashboardWidgetInterface{
}
class modDashboardHtmlWidget extends modDashboardWidgetInterface{
}
class modDashboardPhpWidget extends modDashboardWidgetInterface{
}
class modDashboardSnippetWidget extends modDashboardWidgetInterface{
}
class modDashboardWidget_sqlsrv extends modDashboardWidget{
}
class modDashboardWidgetPlacement extends xPDOObject{
}
class modDashboardWidgetPlacement_sqlsrv extends modDashboardWidgetPlacement{
}
class modDocument extends modResource implements modResourceInterface{
}
class modDocument_sqlsrv extends modDocument implements modResourceInterface{
}
class modElement_sqlsrv extends modElement{
}
class modElementPropertySet extends xPDOObject{
}
class modElementPropertySet_sqlsrv extends modElementPropertySet{
}
class modEvent extends xPDOObject{
}
class modEvent_sqlsrv extends modEvent{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listEvents($xpdo, $plugin, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modFormCustomizationProfile extends xPDOSimpleObject{
}
class modFormCustomizationProfile_sqlsrv extends modFormCustomizationProfile{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listProfiles($xpdo, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modFormCustomizationProfileUserGroup extends xPDOObject{
}
class modFormCustomizationProfileUserGroup_sqlsrv extends modFormCustomizationProfileUserGroup{
}
class modFormCustomizationSet extends xPDOSimpleObject{
	/**
	* Get the formatted data for the FC Set
	* @return array
	*/
	public function getData(){}

}
class modFormCustomizationSet_sqlsrv extends modFormCustomizationSet{
}
class modJSONRPCResource extends modResource implements modResourceInterface{
}
class modJSONRPCResource_sqlsrv extends modJSONRPCResource implements modResourceInterface{
}
class modLexiconEntry extends xPDOSimpleObject{
	/**
	* Clears the cache for the entry
	* @return boolean
	*/
	public function clearCache(){}

}
class modLexiconEntry_sqlsrv extends modLexiconEntry{
}
class modManagerLog extends xPDOSimpleObject{
}
class modManagerLog_sqlsrv extends modManagerLog{
}
class modMenu extends modAccessibleObject{
	/**
	* Gets all submenus from a start menu.
	*
	* @param string $start
	*
	* @return array
	*/
	public function getSubMenus($start=""){}

	/**
	* Rebuilds the menu map cache.
	*
	* @param string $start
	*
	* @return array
	*/
	public function rebuildCache($start=""){}

}
class modMenu_sqlsrv extends modMenu{
}
class modNamespace extends xPDOObject{
	public function getAssetsPath(){}

	public function getCorePath(){}

	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function translatePath($xpdo, $path){}

}
class modNamespace_sqlsrv extends modNamespace{
}
class modPlugin extends modScript{
	/**
	* Grabs a list of groups for the plugin.
	*
	* @param \modResource $resource
	* @param array $sort
	* @param int $limit
	* @param int $offset
	*
	* @return void
	*/
	public function listGroups($resource, $sort=array(), $limit="0", $offset="0"){}

}
class modPlugin_sqlsrv extends modPlugin{
}
class modPluginEvent extends xPDOObject{
}
class modPluginEvent_sqlsrv extends modPluginEvent{
}
class modPrincipal extends xPDOSimpleObject{
	/**
	* Get the attributes for this principal.
	*
	* @param array $targets
	* @param string $context
	* @param boolean $reload
	*
	* @return array
	*/
	public function getAttributes($targets=array(), $context="", $reload=false){}

	/**
	* Load attributes of the principal that define access to secured objects.
	*
	* @param string $target
	* @param string $context
	* @param boolean $reload
	*
	*/
	public function loadAttributes($target, $context="", $reload=false){}

}
class modPrincipal_sqlsrv extends modPrincipal{
}
class modPropertySet extends xPDOSimpleObject{
	/**
	* Get all the modElement instances this property set is available to.
	* @return array
	*/
	public function getElements(){}

	/**
	* Get the properties for this element instance for processing.
	*
	* @param array $properties
	*
	* @return array
	*/
	public function getProperties($properties=null){}

	/**
	* Set properties for this modPropertySet instance.
	*
	* @param array $properties
	* @param boolean $merge
	*
	* @return boolean
	*/
	public function setProperties($properties, $merge=false){}

}
class modPropertySet_sqlsrv extends modPropertySet{
}
class modResource_sqlsrv extends modResource implements modResourceInterface{
}
class modResourceGroup extends modAccessibleSimpleObject{
	/**
	* Get all Resources within this Resource Group
	* @return array|null
	*/
	public function getResources(){}

	/**
	* Get all User Groups attached to this Resource Group
	* @return array
	*/
	public function getUserGroups(){}

	/**
	* Check to see if the passed user (or current active user) has access to this Resource Group
	*
	* @param null $user
	* @param string $context
	*
	* @return boolean
	*/
	public function hasAccess($user=null, $context=""){}

}
class modResourceGroup_sqlsrv extends modResourceGroup{
}
class modResourceGroupResource extends xPDOSimpleObject{
}
class modResourceGroupResource_sqlsrv extends modResourceGroupResource{
}
class modScript_sqlsrv extends modScript{
}
class modSession extends xPDOObject{
}
class modSession_sqlsrv extends modSession{
}
class modSnippet extends modScript{
}
class modSnippet_sqlsrv extends modSnippet{
}
class modStaticResource extends modResource implements modResourceInterface{
	/**
	* Retrieve the resource content stored in a physical file.
	*
	* @param string $file
	* @param array $options
	*
	* @return string
	*/
	public function getFileContent($file, $options=array()){}

	/**
	* Get the absolute path to the static source file represented by this instance.
	*
	* @param array $options
	*
	* @return string
	*/
	public function getSourceFile($options=array()){}

	/**
	* Get the filesize of the static source file represented by this instance.
	*
	* @param array $options
	*
	* @return integer
	*/
	public function getSourceFileSize($options=array()){}

}
class modStaticResource_sqlsrv extends modStaticResource implements modResourceInterface{
}
class modSymLink extends modResource implements modResourceInterface{
}
class modSymLink_sqlsrv extends modSymLink implements modResourceInterface{
}
class modSystemSetting extends xPDOObject{
	public function clearCache(){}

	/**
	* Update the translation for the setting
	*
	* @param string $key
	* @param string $value
	* @param array $options
	*
	* @return bool
	*/
	public function updateTranslation($key, $value="", $options=array()){}

}
class modSystemSetting_sqlsrv extends modSystemSetting{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listSettings($xpdo, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modTemplate extends modElement{
	/**
	* Get a list of Template Variables and if they are currently associated to this template.
	*
	* @param array $sort
	* @param integer $limit
	* @param integer $offset
	* @param array $conditions
	*
	* @return array
	*/
	public function getTemplateVarList($sort=array(), $limit="0", $offset="0", $conditions=array()){}

	/**
	* Grabs an array of Template Variables associated with this Template, bypassing the many-to-many relationship.
	* @return array
	*/
	public function getTemplateVars(){}

	/**
	* Check to see if this Template is assigned the specified Template Var
	*
	* @param mixed $tvPk
	*
	* @return boolean
	*/
	public function hasTemplateVar($tvPk){}

	/**
	* Get a sortable, limitable list and total record count of Template Variables.
	*
	* @param modTemplate $template
	* @param array $sort
	* @param int $limit
	* @param int $offset
	* @param array $conditions
	*
	* @return array
	*/
	public function listTemplateVars($template, $sort=array(), $limit="0", $offset="0", $conditions=array()){}

}
class modTemplate_sqlsrv extends modTemplate{
}
class modTemplateVar_sqlsrv extends modTemplateVar{
}
class modTemplateVarResource extends xPDOSimpleObject{
}
class modTemplateVarResource_sqlsrv extends modTemplateVarResource{
}
class modTemplateVarResourceGroup extends xPDOSimpleObject{
}
class modTemplateVarResourceGroup_sqlsrv extends modTemplateVarResourceGroup{
}
class modTemplateVarTemplate extends xPDOObject{
}
class modTemplateVarTemplate_sqlsrv extends modTemplateVarTemplate{
}
class modUser extends modPrincipal{
	/** 
	* A collection of contexts which the current principal is authenticated in.
	* @var array
	*/
	var $sessionContexts = array();
	/**
	* Activate a reset user password if the proper activation key is provided.
	*
	* @param string $key
	*
	* @return boolean|integer
	*/
	public function activatePassword($key){}

	/**
	* Adds a new context to the user session context array.
	*
	* @param string $context
	*
	*/
	public function addSessionContext($context){}

	/**
	* Change the user password.
	*
	* @param string $newPassword
	* @param string $oldPassword
	*
	* @return boolean
	*/
	public function changePassword($newPassword, $oldPassword){}

	/**
	* Gets a count of {@link modUserMessage} objects ascribed to the user.
	*
	* @param mixed $read
	*
	* @return integer
	*/
	public function countMessages($read=""){}

	/**
	* Ends a user session completely, including all contexts.
	*/
	public function endSession(){}

	/**
	* Returns a randomly generated password
	*
	* @param integer $length
	* @param array $options
	*
	* @return string
	*/
	public function generatePassword($length="10", $options=array()){}

	/**
	* Generate a specific authentication token for this user for accessing the MODX manager
	*
	* @param string $salt
	*
	* @return string
	*/
	public function generateToken($salt){}

	/**
	* Get the dashboard for this user
	* @return \modDashboard
	*/
	public function getDashboard(){}

	/**
	* Return the Primary Group of this User
	* @return \modUserGroup|null
	*/
	public function getPrimaryGroup(){}

	/**
	* Gets all Resource Groups this user is assigned to. This may not work in the new model.
	*
	* @param string $ctx
	*
	* @return array
	*/
	public function getResourceGroups($ctx=""){}

	/**
	* Returns an array of user session context keys.
	* @return array
	*/
	public function getSessionContexts(){}

	/**
	* Gets all user settings in array format.
	* @return array
	*/
	public function getSettings(){}

	/**
	* Gets all the User Group names of the groups this user belongs to.
	* @return array
	*/
	public function getUserGroupNames(){}

	/**
	* Gets all the User Group IDs of the groups this user belongs to.
	* @return array
	*/
	public function getUserGroups(){}

	/**
	* Get the user token for the user
	*
	* @param string $ctx
	*
	* @return string
	*/
	public function getUserToken($ctx=""){}

	/**
	* Checks if the user has a specific session context.
	*
	* @param mixed $context
	*
	* @return boolean
	*/
	public function hasSessionContext($context){}

	/**
	* Determines if this user is authenticated in a specific context.
	*
	* @param string $sessionContext
	*
	* @return boolean
	*/
	public function isAuthenticated($sessionContext="web"){}

	/**
	* States whether a user is a member of a group or groups. You may specify either a string name of the group, or an array of names.
	*
	* @param string $groups
	* @param boolean $matchAll
	*
	* @return boolean
	*/
	public function isMember($groups, $matchAll=false){}

	/**
	* Join a User Group, and optionally assign a Role.
	*
	* @param mixed $groupId
	* @param mixed $roleId
	*
	* @return boolean
	*/
	public function joinGroup($groupId, $roleId=null){}

	/**
	* Removes the User from the specified User Group.
	*
	* @param mixed $groupId
	*
	* @return boolean
	*/
	public function leaveGroup($groupId){}

	/**
	* Determines if the provided password matches the hashed password stored for the user.
	*
	* @param string $password
	* @param array $options
	*
	* @return boolean
	*/
	public function passwordMatches($password, $options=array()){}

	/**
	* Remove any locks held by the user.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function removeLocks($options=array()){}

	/**
	* Removes a user session context.
	*
	* @param string $context
	*
	*/
	public function removeSessionContext($context){}

	/**
	* Removes the session vars associated with a specific context.
	*
	* @param string $context
	*
	*/
	public function removeSessionContextVars($context){}

	/**
	* Removes a session cookie for a user.
	*
	* @param string $context
	*
	*/
	public function removeSessionCookie($context){}

	/**
	* Send an email to the user
	*
	* @param string $message
	* @param array $options
	*
	* @return boolean
	*/
	public function sendEmail($message, $options=array()){}

	/**
	* Set the sudo field explicitly
	*
	* @param boolean $sudo
	*
	* @return bool
	*/
	public function setSudo($sudo){}

}
class modUser_sqlsrv extends modUser{
}
class modUserGroup extends xPDOSimpleObject{
	/**
	* Get all resource groups related to the user group.
	*
	* @param boolean $limit
	* @param int $start
	*
	* @return array
	*/
	public function getResourceGroups($limit=false, $start="0"){}

	/**
	* Get all users in a user group.
	*
	* @param array $criteria
	*
	* @return array
	*/
	public function getUsersIn($criteria=array()){}

}
class modUserGroup_sqlsrv extends modUserGroup{
}
class modUserGroupMember extends xPDOSimpleObject{
}
class modUserGroupMember_sqlsrv extends modUserGroupMember{
}
class modUserGroupRole extends xPDOSimpleObject{
}
class modUserGroupRole_sqlsrv extends modUserGroupRole{
}
class modUserMessage extends xPDOSimpleObject{
}
class modUserMessage_sqlsrv extends modUserMessage{
}
class modUserProfile extends xPDOSimpleObject{
}
class modUserProfile_sqlsrv extends modUserProfile{
}
class modUserSetting extends xPDOObject{
}
class modUserSetting_sqlsrv extends modUserSetting{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listSettings($xpdo, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modWebLink extends modResource implements modResourceInterface{
}
class modWebLink_sqlsrv extends modWebLink implements modResourceInterface{
}
class modWorkspace extends xPDOSimpleObject{
}
class modWorkspace_sqlsrv extends modWorkspace{
}
class modXMLRPCResource extends modResource implements modResourceInterface{
	/** 
	* @var array An array of services for this resource.
	*/
	var $services = array();
}
class modXMLRPCResource_sqlsrv extends modXMLRPCResource implements modResourceInterface{
}
class modAccessMediaSource extends modAccess{
	/**
	* Load the attributes for the ACLs for the context
	*
	* @param \modX $modx
	* @param string $context
	* @param int $userId
	*
	* @return array
	*/
	public function loadAttributes($modx, $context="", $userId="0"){}

}
class modAccessMediaSource_sqlsrv extends modAccessMediaSource{
}
class modMediaSource extends modAccessibleSimpleObject implements modMediaSourceInterface{
	/** 
	* @var modContext $ctx
	*/
	var $ctx = null;
	/** 
	* @var array $errors
	*/
	var $errors = array();
	/** 
	* @var array $permissions
	*/
	var $permissions = array();
	/** 
	* @var array $properties
	*/
	var $properties = array();
	/**
	* Add an error for an action occurring in the source
	*
	* @param string $field
	* @param string $message
	*
	* @return string
	*/
	public function addError($field, $message){}

	/**
	* Clear the caches of all sources
	*
	* @param array $options
	*
	* @return void
	*/
	public function clearCache($options=array()){}

	public function createContainer($name, $parentContainer){}

	public function createObject($objectPath, $name, $content){}

	public function getBasePath($object=""){}

	public function getBaseUrl($object=""){}

	public function getContainerList($path){}

	public function getDefaultProperties(){}

	/**
	* Get the default MODX filesystem source
	*
	* @param \xPDO $xpdo
	* @param int $defaultSourceId
	* @param boolean $fallbackToDefault
	*
	* @return \modMediaSource|null
	*/
	public function getDefaultSource($xpdo, $defaultSourceId=null, $fallbackToDefault=true){}

	/**
	* Get all errors that have occurred for this source
	* @return array
	*/
	public function getErrors(){}

	public function getObjectContents($objectPath){}

	public function getObjectUrl($object=""){}

	public function getObjectsInContainer($path){}

	/**
	* Get the openTo directory for this source, used with TV input types
	*
	* @param string $value
	* @param array $parameters
	*
	* @return string
	*/
	public function getOpenTo($value, $parameters=array()){}

	/**
	* Get a list of permissions for browsing and utilizing the source. May be overridden to provide a custom list of permissions.
	* @return array
	*/
	public function getPermissions(){}

	/**
	* Get the properties on this source
	*
	* @param boolean $parsed
	*
	* @return array
	*/
	public function getProperties($parsed=false){}

	/**
	* Get all properties in key => value format
	* @return array
	*/
	public function getPropertyList(){}

	/**
	* Get the description of this source type
	* @return string
	*/
	public function getTypeDescription(){}

	/**
	* Get the name of this source type
	* @return string
	*/
	public function getTypeName(){}

	/**
	* Get the current working context for the processor
	* @return bool|\modContext
	*/
	public function getWorkingContext(){}

	/**
	* See if the source has any errors
	* @return bool
	*/
	public function hasErrors(){}

	/**
	* See if the source is allowing a certain permission.
	*
	* @param string $key
	*
	* @return bool
	*/
	public function hasPermission($key){}

	/**
	* Initialize the source
	* @return boolean
	*/
	public function initialize(){}

	public function moveObject($from, $to, $point="append"){}

	/**
	* Parse any tags in the properties
	*
	* @param array $properties
	*
	* @return array
	*/
	public function parseProperties($properties){}

	/**
	* Prepares the output URL when the Source is being used in an Element. Can be overridden to provide prefixing/post- fixing functionality.
	*
	* @param string $value
	*
	* @return string
	*/
	public function prepareOutputUrl($value){}

	/**
	* Translate any needed properties
	*
	* @param array $properties
	*
	* @return array
	*/
	public function prepareProperties($properties=array()){}

	/**
	* Prepare the source path for phpThumb
	*
	* @param string $src
	*
	* @return string
	*/
	public function prepareSrcForThumb($src){}

	public function removeContainer($path){}

	public function removeObject($objectPath){}

	public function renameContainer($oldPath, $newName){}

	public function renameObject($oldPath, $newName){}

	/**
	* Set the properties for this Source
	*
	* @param array $properties
	* @param boolean $merge
	*
	* @return bool
	*/
	public function setProperties($properties, $merge=false){}

	/**
	* Setup the request properties for the source, determining any request-specific actions
	*
	* @param array $scriptProperties
	*
	* @return array
	*/
	public function setRequestProperties($scriptProperties=array()){}

	public function updateContainer(){}

	public function updateObject($objectPath, $content){}

	public function uploadObjectsToContainer($container, $objects=array()){}

}
class modFileMediaSource extends modMediaSource implements modMediaSourceInterface{
	/** 
	* @var modFileHandler
	*/
	var $fileHandler = null;
	/**
	* Chmod a specific folder
	*
	* @param string $directoryPath
	* @param string $mode
	*
	* @return boolean
	*/
	public function chmodContainer($directoryPath, $mode){}

	/**
	* Get base paths/urls and sanitize incoming paths
	*
	* @param string $path
	*
	* @return array
	*/
	public function getBases($path){}

	/**
	* Get the ID of the edit file action
	* @return boolean|int
	*/
	public function getEditActionId(){}

	/**
	* Get the context menu items for a specific object in the list view
	*
	* @param \DirectoryIterator $file
	* @param array $fileArray
	*
	* @return array
	*/
	public function getListContextMenu($file, $fileArray){}

}
class modFileMediaSource_sqlsrv extends modFileMediaSource implements modMediaSourceInterface{
}
class modMediaSource_sqlsrv extends modMediaSource implements modMediaSourceInterface{
}
class modMediaSourceContext extends xPDOObject{
}
class modMediaSourceContext_sqlsrv extends modMediaSourceContext{
}
class modMediaSourceElement extends xPDOObject{
}
class modMediaSourceElement_sqlsrv extends modMediaSourceElement{
}
class modS3MediaSource extends modMediaSource implements modMediaSourceInterface{
	/** 
	* @var string $bucket
	*/
	var $bucket = null;
	/** 
	* @var AmazonS3 $driver
	*/
	var $driver = null;
	/**
	* Gets the AmazonS3 class instance
	* @return \AmazonS3
	*/
	public function getDriver(){}

	/**
	* Get the ID of the edit file action
	* @return boolean|int
	*/
	public function getEditActionId(){}

	/**
	* Get the context menu for when viewing the source as a tree
	*
	* @param string $file
	* @param boolean $isDir
	* @param array $fileArray
	*
	* @return array
	*/
	public function getListContextMenu($file, $isDir, $fileArray){}

	public function getObjectFileSize($filename){}

	/**
	* Get a list of objects from within a bucket
	*
	* @param string $dir
	*
	* @return array
	*/
	public function getS3ObjectList($dir){}

	/**
	* Tells if a file is a binary file or not.
	*
	* @param string $file
	*
	* @return boolean
	*/
	public function isBinary($file, $isContent=false){}

	/**
	* Set the bucket for the connection to S3
	*
	* @param string $bucket
	*
	* @return void
	*/
	public function setBucket($bucket){}

}
class modS3MediaSource_sqlsrv extends modS3MediaSource implements modMediaSourceInterface{
}
class modAccessMediaSource_mysql extends modAccessMediaSource{
}
class modFileMediaSource_mysql extends modFileMediaSource implements modMediaSourceInterface{
}
class modMediaSource_mysql extends modMediaSource implements modMediaSourceInterface{
}
class modMediaSourceContext_mysql extends modMediaSourceContext{
}
class modMediaSourceElement_mysql extends modMediaSourceElement{
}
class modS3MediaSource_mysql extends modS3MediaSource implements modMediaSourceInterface{
}
class modSmarty extends Smarty{
	/** 
	* Any custom blocks loaded
	* @var array
	*/
	var $_blocks = null;
	/** 
	* The derived block loaded
	* @var mixed
	*/
	var $_derived = null;
	/** 
	* A reference to the modX instance
	* @var modX
	*/
	var $modx = null;
	/** 
	* A reference to the Smarty instance
	* @var Smarty
	*/
	var $smarty = null;
	/**
	* Sets the cache path for this Smarty instance
	*
	* @param string $path
	*
	*/
	public function setCachePath($path=""){}

	/**
	* Sets the template path for this Smarty instance
	*
	* @param string $path
	*
	* @return boolean
	*/
	public function setTemplatePath($path=""){}

}
class modRestClient{
	/** 
	* @var array $config The configuration array.
	*/
	var $config = array();
	/** 
	* @var modRestClient $conn The client connection instance to use.
	*/
	var $conn = null;
	/** 
	* The current host to connect to
	* @var string $host
	*/
	var $host = null;
	/** 
	* @var modX $modx A reference to the modX instance.
	*/
	var $modx = null;
	/** 
	* @var modRestResponse $response The response object after a request is
made.
	*/
	var $response = null;
	/** 
	* @var string The expected response type
	*/
	var $responseType = "xml";
	/**
	* Get the connection class for the client. Defaults to cURL, then fsockopen. If neither exists, returns false.
	* @return boolean
	*/
	public function getConnection(){}

	/**
	* Send a REST request
	*
	* @param string $host
	* @param string $path
	* @param string $method
	* @param array $params
	* @param array $options
	*
	* @return \modRestResponse
	*/
	public function request($host, $path, $method="GET", $params=array(), $options=array()){}

	/**
	* Sets the response type
	*
	* @param string $type
	*
	*/
	public function setResponseType($type){}

	/**
	* Translates a SimpleXMLElement object into an array.
	*
	* @param \SimpleXMLElement $obj
	*
	* @return boolean
	*/
	public function xml2array($obj, $arr){}

}
class modRestResponse{
	/** 
	* @var string $json
	*/
	var $json = null;
	/** 
	* @var string The type of response format
	*/
	var $responseType = "xml";
	/** 
	* @var SimpleXMLElement $xml
	*/
	var $xml = null;
	/**
	* Translates current response from JSON to an array
	* @return array
	*/
	public function fromJSON(){}

	/**
	* Returns an error message, if any.
	* @return string
	*/
	public function getError(){}

	/**
	* Checks to see whether or not the response is an error response
	* @return boolean
	*/
	public function isError(){}

	/**
	* Translates the current response object to a SimpleXMLElement instance
	* @return \SimpleXMLElement
	*/
	public function toXml(){}

}
class modRestCurlClient extends modRestClient{
	/**
	* Set up authentication configuration , if specified, to be used with REST request.
	*
	* @param resource $ch
	* @param array $options
	*
	* @return boolean
	*/
	public function setAuth($ch, $options=array()){}

	/**
	* Set up cURL-specific options
	*
	* @param resource $ch
	* @param array $options
	*
	*/
	public function setOptions($ch, $options=array()){}

	/**
	* Set up proxy configuration , if specified, to be used with REST request.
	*
	* @param resource $ch
	* @param array $options
	*
	* @return boolean
	*/
	public function setProxy($ch, $options=array()){}

	/**
	* Configure and set the URL to use, along with any request parameters.
	*
	* @param resource $ch
	* @param string $host
	* @param string $path
	* @param string $method
	* @param array $params
	* @param array $options
	*
	* @return boolean
	*/
	public function setUrl($ch, $host, $path, $method="GET", $params=array(), $options=array()){}

}
class modRestArrayToXML{
	/**
	* Determine if a variable is an associative array
	*
	* @param mixed $array
	*
	* @return boolean
	*/
	public function isAssoc($array){}

	/**
	* Convert an XML document to a multi dimensional array Pass in an XML document (or SimpleXMLElement object) and this recrusively loops through and builds a representative array
	*
	* @param string $xml
	*
	* @return array
	*/
	public function toArray($xml){}

	/**
	* The main function for converting to an XML document.
	*
	* @param array $data
	* @param string $rootNodeName
	* @param \SimpleXMLElement $xml
	*
	* @return string
	*/
	public function toXML($data, $rootNodeName="ResultSet", $xml=null){}

}
class modRestServer{
	/**
	* Handles basic authentication for the server
	* @return boolean
	*/
	public function authenticate(){}

	/**
	* Computes the path for the REST request
	* @return string
	*/
	public function computePath(){}

	/**
	* Deny access and send a 401.
	*
	* @param string $message
	* @param array $data
	*
	* @return string
	*/
	public function deny($message, $data=array()){}

	/**
	* Encodes the data to the specified format. Defaults to XML.
	*
	* @param array $data
	* @param string $root
	*
	* @return string
	*/
	public function encode($data, $root=""){}

	/**
	* Handles error messages
	*
	* @param string $message
	* @param array $data
	* @param string $type
	*
	* @return string
	*/
	public function error($message="", $data=array(), $type="404"){}

	/**
	* Handles the REST request and loads the correct processor. Checks for authentication should it be a type not equal to GET if authenticate is set to true, or always if authenticateGet is set to true.
	* @return string
	*/
	public function handle(){}

	/**
	* Handles success messages
	*
	* @param array $data
	* @param string $root
	*
	* @return string
	*/
	public function success($data, $root=""){}

}
class modRestSockClient extends modRestClient{
}
class modDbRegisterMessage extends xPDOObject{
}
class modDbRegisterMessage_sqlsrv extends modDbRegisterMessage{
	/**
	*
	* @param modDbRegister $register
	*
	*/
	public function getValidMessages($register, $topic, $topicBase, $topicMsg, $limit, $options=array()){}

}
class modDbRegisterQueue extends xPDOSimpleObject{
}
class modDbRegisterQueue_sqlsrv extends modDbRegisterQueue{
}
class modDbRegisterTopic extends xPDOSimpleObject{
}
class modDbRegisterTopic_sqlsrv extends modDbRegisterTopic{
}
class modDbRegisterMessage_mysql extends modDbRegisterMessage{
	/**
	*
	* @param modDbRegister $register
	*
	*/
	public function getValidMessages($register, $topic, $topicBase, $topicMsg, $limit, $options=array()){}

}
class modDbRegisterQueue_mysql extends modDbRegisterQueue{
}
class modDbRegisterTopic_mysql extends modDbRegisterTopic{
}
abstract class modRegister{
	/** 
	* A polling flag that will terminate additional polling when true.
	* @var boolean
	*/
	var $__kill = false;
	/** 
	* A reference to the modX instance the register is loaded by.
	* @var modX
	*/
	var $modx = null;
	/** 
	* An array of global options applied to the registry.
	* @var array
	*/
	var $options = null;
	/** 
	* An array of topics and/or messages the register is subscribed to.
	* @var array
	*/
	var $subscriptions = array();
	/**
	* @return void
	*/
	public function abort($transactionKey){}

	/**
	* Acknowledge the registry was read
	*
	* @param string $messageKey
	* @param string $transactionKey
	*
	* @return void
	*/
	public function acknowledge($messageKey, $transactionKey){}

	/**
	* Begin the reading of the message
	* @return void
	*/
	public function begin($transactionKey){}

	/**
	* Close the connection to the register service implementation.
	* @return boolean
	*/
	public function close(){}

	/**
	* Commit the transaction and finish
	*
	* @param string $transactionKey
	*
	* @return void
	*/
	public function commit($transactionKey){}

	/**
	* Connect to the register service implementation.
	*
	* @param array $attributes
	*
	* @return boolean
	*/
	public function connect($attributes=array()){}

	/**
	* Get the current topic of the register.
	* @return string
	*/
	public function getCurrentTopic(){}

	/**
	* Get the key of this registry
	* @return string
	*/
	public function getKey(){}

	/**
	* Reads any undigested messages from subscribed topics.
	*
	* @param array $options
	*
	* @return mixed
	*/
	public function read($options=array()){}

	/**
	* Send a message to the register.
	*
	* @param string $topic
	* @param mixed $message
	* @param array $options
	*
	* @return boolean
	*/
	public function send($topic, $message, $options=array()){}

	/**
	* Set the current topic to be read
	*
	* @param string $topic
	*
	* @return void
	*/
	public function setCurrentTopic($topic){}

	/**
	* Subscribe to a topic (or specific message) in the register.
	*
	* @param string $topic
	*
	* @return boolean
	*/
	public function subscribe($topic){}

	/**
	* Unsubscribe from a topic (or specific message) in the register.
	*
	* @param string $topic
	*
	* @return boolean
	*/
	public function unsubscribe($topic){}

}
class modDbRegister extends modRegister{
}
class modFileRegister extends modRegister{
}
class modRegistry{
	/** 
	* An array of global options applied to the registry.
	* @var array
	*/
	var $_options = array();
	/** 
	* A reference to the modX instance the registry is loaded by.
	* @var modX
	*/
	var $modx = null;
	/**
	* Add a modRegister instance to the registry.
	*
	* @param string $key
	* @param string $class
	* @param array $options
	*
	*/
	public function addRegister($key, $class, $options=array()){}

	/**
	* Get a modRegister instance from the registry.
	*
	* @param string $key
	* @param string $class
	* @param array $options
	*
	* @return \modRegister
	*/
	public function getRegister($key, $class, $options=array()){}

	/**
	* Check if logging is currently active
	* @return boolean
	*/
	public function isLogging(){}

	/**
	* Remove a modRegister instance from the registry.
	*
	* @param string $key
	*
	*/
	public function removeRegister($key){}

	/**
	* Reset the current logging.
	*/
	public function resetLogging(){}

	/**
	* Set the logging level for the topic.
	*
	* @param modRegister $register
	* @param string $topic
	* @param int $level
	*
	* @return boolean
	*/
	public function setLogging($register, $topic, $level="1"){}

}
class modProviderCreateProcessor extends modObjectCreateProcessor{
}
class modProviderGetProcessor extends modProcessor{
	/** 
	* @var modTransportProvider $provider
	*/
	var $provider = null;
}
class modProviderGetListProcessor extends modObjectGetListProcessor{
}
class modProviderRemoveProcessor extends modObjectRemoveProcessor{
}
class modProviderUpdateProcessor extends modObjectUpdateProcessor{
}
class modProviderUpdateFromGridProcessor extends modProviderUpdateProcessor{
}
class modPackageVersionGetListProcessor extends modObjectGetListProcessor{
	/**
	*
	* @param modTransportPackage $package
	*
	*/
	public function formatDates($package, $packageArray){}

	/**
	*
	* @param modTransportPackage $package
	*
	*/
	public function getMetaData($package, $packageArray){}

	/**
	*
	* @param modTransportPackage $package
	*
	*/
	public function parseVersion($package, $packageArray){}

	/**
	*
	* @param modTransportPackage $package
	*
	*/
	public function prepareMenu($package, $packageArray){}

}
class modPackageVersionRemoveProcessor extends modProcessor{
	/** 
	* @var modTransportPackage $package
	*/
	var $package = null;
	public function clearCache(){}

	public function logManagerAction(){}

	public function removeTransportDirectory(){}

	public function removeTransportZip(){}

}
class modPackageDownloadProcessor extends modProcessor{
	/** 
	* @var string $location The actual file location of the download
	*/
	var $location = null;
	/** 
	* @var modTransportPackage $package
	*/
	var $package = null;
	/** 
	* @var modTransportProvider $provider
	*/
	var $provider = null;
	/** 
	* @var string $signature The signature of the transport package
	*/
	var $signature = null;
	/**
	* Download the actual transport package file to this server
	*
	* @param string $url
	*
	* @return boolean
	*/
	public function downloadPackage($url){}

	/**
	* Get the actual file location from the provider
	* @return array|string
	*/
	public function getFileDownloadUrl(){}

	/**
	* Get Package metadata from the provider
	* @return array|string
	*/
	public function getPackageMetadata(){}

	/**
	* Prepare the soon-to-be-created Transport Package object
	* @return \modTransportPackage
	*/
	public function getTransportPackage(){}

	/**
	* Load the provider for the package
	* @return boolean
	*/
	public function loadProvider(){}

	/**
	* Parse the information sent to the processor
	*
	* @param string $info
	*
	* @return boolean
	*/
	public function parseInfo($info){}

	/**
	* Set package version data based on the signature
	* @return boolean
	*/
	public function setPackageVersionData(){}

}
class modPackageGetInfoProcessor extends modProcessor{
	/** 
	* @var modTransportProvider $provider
	*/
	var $provider = null;
	/**
	* Get the data from the Provider
	* @return array|string
	*/
	public function getData(){}

	/**
	* Load the provider
	* @return boolean
	*/
	public function loadProvider(){}

}
class modPackageRemoteGetListProcessor extends modProcessor{
	/** 
	* @var modTransportProvider $provider
	*/
	var $provider = null;
	public function getData(){}

	public function prepareRow($package){}

}
class modPackageGetNodesProcessor extends modProcessor{
	var $nodeKey = "";
	var $nodeType = "root";
	/** 
	* @var modTransportProvider $provider
	*/
	var $provider = null;
	public function getCategories(){}

	public function getRepositories(){}

}
class modPackageGetProcessor extends modObjectGetProcessor{
	/** 
	* @var string $dateFormat
	*/
	var $dateFormat = "%b %d, %Y %I:%M %p";
	/** 
	* @var modTransportProvider $provider
	*/
	var $provider = null;
	/**
	* Format the dates for readability
	*
	* @param array $packageArray
	*
	* @return array
	*/
	public function formatDates($packageArray){}

	/**
	* Get the metadata for the object
	* @return void
	*/
	public function getMetadata(){}

}
class modPackageGetAttributeProcessor extends modProcessor{
	/** 
	* @var modTransportPackage $package
	*/
	var $package = null;
	/** 
	* @var xPDOTransport $transport
	*/
	var $transport = null;
}
class modPackageGetListProcessor extends modObjectGetListProcessor{
	/** 
	* @var string $productVersion
	*/
	var $productVersion = "";
	/** 
	* @var array $providerCache
	*/
	var $providerCache = array();
	/** 
	* @var int $updatesCacheExpire
	*/
	var $updatesCacheExpire = "300";
	/**
	*
	* @param \modTransportPackage $package
	* @param array $packageArray
	*
	* @return array
	*/
	public function checkForUpdates($package, $packageArray){}

	/**
	* Format installed, created and updated dates
	*
	* @param array $packageArray
	*
	* @return array
	*/
	public function formatDates($packageArray){}

	/**
	* Setup description, using either metadata or readme
	*
	* @param \modTransportPackage $package
	* @param array $packageArray
	*
	* @return array
	*/
	public function getPackageMeta($package, $packageArray){}

	/**
	* Get basic version information about the package
	*
	* @param array $packageArray
	*
	* @return array
	*/
	public function getVersionInfo($packageArray){}

}
class modPackageInstallProcessor extends modProcessor{
	/** 
	* @var modTransportPackage $package
	*/
	var $package = null;
	public function clearCache(){}

}
class modPackageRemoveProcessor extends modProcessor{
	/** 
	* @var modTransportPackage $package
	*/
	var $package = null;
	/**
	* Cleanup and return the result
	* @return array
	*/
	public function cleanup(){}

	/**
	* Empty the site cache
	* @return void
	*/
	public function clearCache(){}

	/**
	* Remove the transport package directory
	*
	* @param string $transportDir
	*
	* @return void
	*/
	public function removeTransportDirectory($transportDir){}

	/**
	* Remove the transport package archive
	*
	* @param string $transportZip
	*
	* @return void
	*/
	public function removeTransportZip($transportZip){}

}
class modPackageScanLocalProcessor extends modProcessor{
	/** 
	* @var modWorkspace $workspace
	*/
	var $workspace = null;
	/**
	* Attempt to create and add the package to the DB
	*
	* @param string $signature
	*
	* @return boolean
	*/
	public function createPackage($signature){}

	/**
	* Scan the packages/ directory
	* @return array
	*/
	public function getPackages(){}

}
class modPackageUninstallProcessor extends modProcessor{
	/** 
	* @var modTransportPackage $package
	*/
	var $package = null;
	public function clearCache(){}

	public function logManagerAction(){}

}
class modPackageUpdateProcessor extends modProcessor{
	/** 
	* @var modTransportPackage $package
	*/
	var $package = null;
	public function logManagerAction(){}

}
class modPackageUpdateFromGridProcessor extends modPackageUpdateProcessor{
}
class modPackageViewProcessor extends modProcessor{
	/** 
	* @var modTransportPackage $package
	*/
	var $package = null;
}
class modNamespaceCreateProcessor extends modObjectCreateProcessor{
}
class modNamespaceGetListProcessor extends modObjectGetListProcessor{
}
class modNamespaceRemoveProcessor extends modObjectRemoveProcessor{
}
class modNamespaceRemoveMultipleProcessor extends modProcessor{
	/** 
	* @var modNamespace $namespace
	*/
	var $namespace = null;
	/**
	* @return void
	*/
	public function logManagerAction(){}

}
class modNamespaceUpdateProcessor extends modObjectUpdateProcessor{
}
class modNamespaceUpdateFromGridProcessor extends modNamespaceUpdateProcessor{
}
class modLexiconTopicGetListProcessor extends modProcessor{
	public function getData(){}

}
class modLexiconEntryCreateProcessor extends modProcessor{
	/** 
	* @var modLexiconEntry $entry
	*/
	var $entry = null;
	public function alreadyExists(){}

	public function logManagerAction(){}

}
class modLexiconGetListProcessor extends modProcessor{
}
class modLexiconReloadFromBaseProcessor extends modProcessor{
}
class modLexiconEntryRevertProcessor extends modProcessor{
	/** 
	* @var modLexiconEntry $entry
	*/
	var $entry = null;
	public function logManagerAction(){}

}
class modLexiconEntryUpdateFromGridProcessor extends modProcessor{
	/** 
	* @var modLexiconEntry $entry
	*/
	var $entry = null;
	public function logManagerAction(){}

}
class modSystemSettingsCreateProcessor extends modObjectCreateProcessor{
	/**
	* Check to see if a Setting already exists with this key
	*
	* @param string $key
	*
	* @return boolean
	*/
	public function alreadyExists($key){}

	/**
	*
	* @param array $fields
	*
	* @return void
	*/
	public function setLexiconEntries($fields){}

}
class modSystemSettingsGetAreasProcessor extends modProcessor{
	/**
	* Get the query object for the data
	* @return \xPDOQuery
	*/
	public function getQuery(){}

}
class modSystemSettingsGetListProcessor extends modObjectGetListProcessor{
}
class modSystemSettingsRemoveProcessor extends modObjectRemoveProcessor{
	/**
	* Remove all Lexicon Entries related to the setting
	* @return void
	*/
	public function removeRelatedLexiconEntries(){}

}
class modSystemSettingsUpdateProcessor extends modObjectUpdateProcessor{
	/** 
	* @var boolean $refreshURIs
	*/
	var $refreshURIs = false;
	/**
	* If this is a Boolean setting, ensure the value of the setting is 1/0
	* @return mixed
	*/
	public function checkForBooleanValue(){}

	/**
	* Check to see if the URIs need to be refreshed
	* @return boolean
	*/
	public function checkForRefreshURIs(){}

	/**
	* Clear the settings cache and reload the config
	* @return void
	*/
	public function clearCache(){}

	/**
	* If friendly_urls is set on or use_alias_path changes, refreshURIs
	* @return boolean
	*/
	public function refreshURIs(){}

	/**
	* Update lexicon name/description
	*
	* @param array $fields
	*
	* @return void
	*/
	public function updateTranslations($fields){}

	/**
	* Verify the Namespace passed is a valid Namespace
	* @return string|null
	*/
	public function verifyNamespace(){}

}
class modSystemSettingsUpdateFromGridProcessor extends modSystemSettingsUpdateProcessor{
}
class modSystemRteGetListProcessor extends modProcessor{
}
class modSystemLogGetListProcessor extends modProcessor{
	/**
	* Get a collection of modManagerLog objects
	* @return array
	*/
	public function getData(){}

	/**
	* Get the name field of the class
	*
	* @param string $classKey
	*
	* @return string
	*/
	public function getNameField($classKey){}

	/**
	* Prepare a log entry for listing
	*
	* @param \modManagerLog $log
	*
	* @return array
	*/
	public function prepareLog($log){}

}
class modSystemLogTruncateProcessor extends modProcessor{
}
class modSystemLanguageGetListProcessor extends modProcessor{
	/**
	* Get a collection of languages
	* @return array
	*/
	public function getData(){}

}
class modSystemEventGetListProcessor extends modProcessor{
	/**
	* @return array
	*/
	public function getData(){}

}
class modSystemErrorLogClearProcessor extends modProcessor{
}
class modSystemErrorLogDownloadProcessor extends modProcessor{
}
class modSystemErrorLogGetProcessor extends modProcessor{
}
class modSystemDerivativesGetListProcessor extends modProcessor{
}
class modDatabaseTableGetListProcessor extends modDriverSpecificProcessor{
	public function formatSize($size){}

	public function getTables(){}

}
class modDatabaseTableGetListProcessor_mysql extends modDatabaseTableGetListProcessor{
}
class modDatabaseTableGetListProcessor_sqlsrv extends modDatabaseTableGetListProcessor{
}
class modDatabaseTableOptimizeProcessor extends modDriverSpecificProcessor{
	/**
	* Log a manager action showing the optimized table
	* @return void
	*/
	public function logManagerAction(){}

	/**
	* Optimize a database table
	*
	* @param string $table
	*
	* @return boolean
	*/
	public function optimize($table){}

}
class modDatabaseTableOptimizeProcessor_mysql extends modDatabaseTableOptimizeProcessor{
}
class modDatabaseTableOptimizeProcessor_sqlsrv extends modDatabaseTableOptimizeProcessor{
}
class modDatabaseTableOptimizeDatabaseProcessor extends modDriverSpecificProcessor{
	/**
	* Log a manager action showing the optimized table
	* @return void
	*/
	public function logManagerAction(){}

	/**
	* Optimize the database
	* @return boolean
	*/
	public function optimize(){}

}
class modDatabaseTableOptimizeDatabaseProcessor_mysql extends modDatabaseTableOptimizeDatabaseProcessor{
}
class modDatabaseTableOptimizeDatabaseProcessor_sqlsrv extends modDatabaseTableOptimizeDatabaseProcessor{
}
class modDatabaseTableTruncateProcessor extends modDriverSpecificProcessor{
	/**
	* Log a manager action showing the truncated table
	* @return void
	*/
	public function logManagerAction(){}

	/**
	* Truncate a database table
	*
	* @param string $table
	*
	* @return boolean
	*/
	public function truncate($table){}

}
class modDatabaseTableTruncateProcessor_mysql extends modDatabaseTableTruncateProcessor{
}
class modDatabaseTableTruncateProcessor_sqlsrv extends modDatabaseTableTruncateProcessor{
}
class modDashboardWidgetCreateProcessor extends modObjectCreateProcessor{
}
class modDashboardWidgetGetListProcessor extends modObjectGetListProcessor{
}
class modDashboardWidgetRemoveProcessor extends modObjectRemoveProcessor{
}
class modDashboardWidgetRemoveMultipleProcessor extends modProcessor{
}
class modDashboardWidgetUpdateProcessor extends modObjectUpdateProcessor{
}
class modDashboardCreateProcessor extends modObjectCreateProcessor{
	/**
	* See if a Dashboard already exists with this name
	*
	* @param string $name
	*
	* @return bool
	*/
	public function alreadyExists($name){}

	/**
	* Assign widgets to this dashboard
	*
	* @param array $widgets
	*
	* @return array
	*/
	public function assignWidgets($widgets){}

}
class modDashboardDuplicateProcessor extends modObjectDuplicateProcessor{
	public function duplicatePlacements(){}

}
class modDashboardGetListProcessor extends modObjectGetListProcessor{
}
class modDashboardRemoveProcessor extends modObjectRemoveProcessor{
}
class modDashboardRemoveMultipleProcessor extends modProcessor{
}
class modDashboardUpdateProcessor extends modObjectUpdateProcessor{
	/**
	* Set the widgets assigned to this Dashboard
	* @return void
	*/
	public function setWidgets(){}

}
class modDashboardUpdateFromGridProcessor extends modDashboardUpdateProcessor{
}
class modCountryGetListProcessor extends modProcessor{
	public function getCountryList(){}

}
class modContentTypeCreateProcessor extends modObjectCreateProcessor{
}
class modContentTypeGetListProcessor extends modObjectGetListProcessor{
}
class modContentTypeRemoveProcessor extends modObjectRemoveProcessor{
	public function isInUse(){}

}
class modContentTypeUpdateProcessor extends modObjectUpdateProcessor{
	var $refreshURIs = false;
}
class modContentTypeUpdateFromGridProcessor extends modProcessor{
	/** 
	* @var array $records
	*/
	var $records = null;
}
class modClassMapGetListProcessor extends modObjectGetListProcessor{
}
class modCharsetGetListProcessor extends modProcessor{
}
class modActiveResourceListProcessor extends modObjectGetListProcessor{
}
class modActionCreateProcessor extends modObjectCreateProcessor{
}
class modActionGetProcessor extends modObjectGetProcessor{
	/**
	* Get the parent action and set fields if found
	*/
	public function getParent(){}

}
class modActionGetListProcessor extends modObjectGetListProcessor{
}
class modActionGetNodesProcessor extends modProcessor{
	/**
	* @return array
	*/
	public function getMap(){}

	/**
	* Get all Actions in a Namespace
	*
	* @param array $map
	*
	* @return array
	*/
	public function getNodesInNamespace($map){}

	public function getRootNodes($map){}

}
class modActionRemoveProcessor extends modObjectRemoveProcessor{
}
class modActionSortProcessor extends modProcessor{
	public function getNodesFormatted($ar_nodes, $cur_level, $parent="0"){}

}
class modActionUpdateProcessor extends modObjectUpdateProcessor{
}
class modSystemClearCacheProcessor extends modProcessor{
	public function clearByPaths(){}

	public function getPartitions(){}

	public function runBeforeEvents(){}

}
class modConsoleProcessor extends modProcessor{
}
class modSystemDownloadOutputProcessor extends modProcessor{
	/**
	* Cache the data stored
	* @return array|string
	*/
	public function cache(){}

	/**
	* Download the output to the browser
	* @return string
	*/
	public function download(){}

}
class modSystemInfoProcessor extends modProcessor{
}
class modSystemPhpInfoProcessor extends modProcessor{
}
class modSystemPhpThumbProcessor extends modProcessor{
	/** 
	* @var modPhpThumb $phpThumb
	*/
	var $phpThumb = null;
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* Get the source to load the paths from
	*
	* @param int $sourceId
	*
	* @return \modMediaSource|\modFileMediaSource
	*/
	public function getSource($sourceId){}

	/**
	* Attempt to load modPhpThumb
	* @return bool|\modPhpThumb
	*/
	public function loadPhpThumb(){}

}
class modSystemRemoveLocksProcessor extends modProcessor{
}
class modMediaSourceTypeGetListProcessor extends modProcessor{
}
class modSourceCreateProcessor extends modObjectCreateProcessor{
	/**
	* Check to see if a Media Source with the specified name already exists
	*
	* @param string $name
	*
	* @return boolean
	*/
	public function alreadyExists($name){}

}
class modSourceDuplicateProcessor extends modObjectDuplicateProcessor{
	/**
	* Fire the OnMediaSourceDuplicate event
	* @return void
	*/
	public function fireDuplicateEvent(){}

}
class modMediaSourceGetListProcessor extends modObjectGetListProcessor{
}
class modSourceRemoveProcessor extends modObjectRemoveProcessor{
}
class modSourceRemoveMultipleProcessor extends modProcessor{
	/** 
	* @var modMediaSource $source
	*/
	var $source = null;
	/**
	* Log a manager action
	* @return void
	*/
	public function logManagerAction(){}

}
class modSourceUpdateProcessor extends modObjectUpdateProcessor{
	/**
	* Sets access permissions for the source
	* @return void
	*/
	public function setAccess(){}

	/**
	* Sets the properties on the source
	* @return void
	*/
	public function setSourceProperties(){}

}
class modMediaSourceUpdateFromGridProcessor extends modSourceUpdateProcessor{
}
class modUserUserGroupGetListProcessor extends modObjectGetListProcessor{
}
class modUserActivateMultipleProcessor extends modProcessor{
}
class modUserCreateProcessor extends modObjectCreateProcessor{
	var $newPassword = "";
	/** 
	* @var modUserProfile $profile
	*/
	var $profile = null;
	/** 
	* @var modUserValidation $validator
	*/
	var $validator = null;
	/**
	* @return \modUserProfile
	*/
	public function addProfile(){}

	/**
	* Send the password notification email, if specified
	* @return void
	*/
	public function sendNotificationEmail(){}

	/**
	* Add User Group memberships to the User
	* @return array
	*/
	public function setUserGroups(){}

}
class modUserValidation{
	/** 
	* @var modX $modx
	*/
	var $modx = null;
	/** 
	* @var modUserCreateProcessor|modUserUpdateProcessor $processor
	*/
	var $processor = null;
	/** 
	* @var modUserProfile $profile
	*/
	var $profile = null;
	/** 
	* @var modUser $user
	*/
	var $user = null;
	public function alreadyExists($name){}

	public function checkBirthDate(){}

	public function checkBlocked(){}

	public function checkCellPhone(){}

	public function checkEmail(){}

	public function checkPassword(){}

	public function checkPhone(){}

	public function checkUsername(){}

	public function generatePassword($length="10"){}

	public function validate(){}

}
class modUserDeactivateMultipleProcessor extends modProcessor{
}
class modUserDeleteProcessor extends modObjectRemoveProcessor{
	/**
	* See if the user is the last member in the administrators group
	* @return boolean
	*/
	public function isLastUserInAdministrators(){}

	/**
	* See if the user is the active user
	* @return boolean
	*/
	public function isSelf(){}

}
class modUserDuplicateProcessor extends modObjectDuplicateProcessor{
	var $afterSaveEvent = "OnUserDuplicate";
	var $beforeSaveEvent = "OnBeforeUserDuplicate";
}
class modUserGetProcessor extends modObjectGetProcessor{
	/**
	* Get all the groups for the user
	* @return array
	*/
	public function getGroups(){}

}
class modUserGetListProcessor extends modObjectGetListProcessor{
}
class modUserUpdateProcessor extends modObjectUpdateProcessor{
	/** 
	* @var boolean $activeStatusChanged
	*/
	var $activeStatusChanged = false;
	/** 
	* @var boolean $newActiveStatus
	*/
	var $newActiveStatus = false;
	/** 
	* @var string $newPassword
	*/
	var $newPassword = "";
	/** 
	* @var modUserProfile $profile
	*/
	var $profile = null;
	/** 
	* @var modUserValidation $validator
	*/
	var $validator = null;
	/**
	* Check for an active/inactive status change
	* @return boolean|string
	*/
	public function checkActiveChange(){}

	/**
	* Fire the active status change event
	*/
	public function fireAfterActiveStatusChange(){}

	/**
	* Send notification email for changed password
	*/
	public function sendNotificationEmail(){}

	/**
	* Set the profile data for the user
	* @return \modUserProfile
	*/
	public function setProfile(){}

	/**
	* Set the remote data for the user
	* @return mixed
	*/
	public function setRemoteData(){}

	/**
	* Set user groups for the user
	* @return array
	*/
	public function setUserGroups(){}

}
class modUserUpdateFromGridProcessor extends modUserUpdateProcessor{
}
class modUserGroupRoleCreateProcessor extends modObjectCreateProcessor{
	/**
	* Check to see if a role already exists with the specified name
	*
	* @param string $name
	*
	* @return boolean
	*/
	public function alreadyExists($name){}

}
class modUserGroupRoleGetProcessor extends modObjectGetProcessor{
}
class modUserGroupRoleGetListProcessor extends modObjectGetListProcessor{
	var $canRemove = false;
}
class modUserGroupRoleRemoveProcessor extends modObjectRemoveProcessor{
	/**
	* See if the Role is assigned to any users
	* @return boolean
	*/
	public function isAssigned(){}

	/**
	* Don't delete the Member or Super User roles.
	* @return boolean
	*/
	public function isCoreRole(){}

}
class modUserGroupRoleUpdateProcessor extends modObjectUpdateProcessor{
}
class modUserGroupRoleUpdateFromGridProcessor extends modUserGroupRoleUpdateProcessor{
}
class modResourceGroupCreateProcessor extends modObjectCreateProcessor{
}
class modResourceGroupGetListProcessor extends modObjectGetListProcessor{
}
class modResourceGroupGetNodesProcessor extends modProcessor{
	/**
	* Get the Resource Groups at this level
	* @return array
	*/
	public function getResourceGroups(){}

}
class modResourceGroupRemoveProcessor extends modProcessor{
	/** 
	* @var modResourceGroup $resourceGroup
	*/
	var $resourceGroup = null;
	public function logManagerAction(){}

}
class modResourceGroupRemoveResourceProcessor extends modProcessor{
	/** 
	* @var modResource $resource
	*/
	var $resource = null;
	/** 
	* @var modResourceGroup $resourceGroup
	*/
	var $resourceGroup = null;
	public function fireAfterRemove(){}

}
class modResourceGroupUpdateProcessor extends modProcessor{
	/** 
	* @var modResourceGroup $resourceGroup
	*/
	var $resourceGroup = null;
	/**
	* Check if a Resource Group already exists with that name
	*
	* @param string $name
	*
	* @return boolean
	*/
	public function alreadyExists($name){}

	/**
	* Log the manager action
	* @return void
	*/
	public function logManagerAction(){}

	/**
	* Validate the form
	* @return boolean
	*/
	public function validate(){}

}
class modProfileChangePasswordProcessor extends modProcessor{
	public function logManagerAction(){}

	public function validate(){}

}
class modProfileGetProcessor extends modProcessor{
	/** 
	* @var modUser $user
	*/
	var $user = null;
	/**
	* Get the User Groups for the user
	* @return array
	*/
	public function getUserGroups(){}

}
class modProfileUpdateProcessor extends modProcessor{
	/** 
	* @var modUserProfile $profile
	*/
	var $profile = null;
	public function prepare(){}

}
class modUserMessageGetListProcessor extends modObjectGetListProcessor{
}
class modSecurityGroupUserCreateProcessor extends modProcessor{
	/** 
	* @var modUserGroupRole $role
	*/
	var $role = null;
	/** 
	* @var modUser $user
	*/
	var $user = null;
	/** 
	* @var modUserGroup $userGroup
	*/
	var $userGroup = null;
	public function alreadyExists($fields){}

	public function getNewRank(){}

	public function validate($fields){}

}
class modUserGroupUserGetListProcessor extends modObjectGetListProcessor{
}
class modUserGroupUserRemoveProcessor extends modProcessor{
	/** 
	* @var modUserGroupMember $membership
	*/
	var $membership = null;
}
class modUserGroupUserUpdateProcessor extends modProcessor{
	/** 
	* @var modUserGroupMember $membership
	*/
	var $membership = null;
}
class modUserGroupCreateProcessor extends modObjectCreateProcessor{
	/**
	* Add Context Access via wizard property.
	*
	* @param array $contexts
	*
	* @return boolean
	*/
	public function addContextAccessViaWizard($contexts){}

	/**
	*
	* @param string $categoryNames
	* @param array $contexts
	*
	* @return boolean
	*/
	public function addElementCategoriesViaWizard($categoryNames, $contexts){}

	/**
	* Add Manager Access via wizard property with a specified policy.
	*
	* @param int $adminPolicy
	*
	* @return bool
	*/
	public function addManagerContextAccessViaWizard($adminPolicy){}

	/**
	* Adds a Resource Group with the same name and grants access for the specified Contexts
	*
	* @param array $contexts
	*
	* @return boolean
	*/
	public function addParallelResourceGroup($contexts){}

	/**
	*
	* @param string $resourceGroupNames
	* @param array $contexts
	*
	* @return boolean
	*/
	public function addResourceGroupsViaWizard($resourceGroupNames, $contexts){}

	/**
	* Add user groups via a wizard property, which is a comma-separated list of username:role key pairs, ie: jimbob:Member,johndoe:Administrator,marksmith
	*
	* @param string $users
	*
	* @return bool
	*/
	public function addUsersViaWizard($users){}

	public function flushPermissions(){}

	/**
	* Set the Context ACLs for the Group
	* @return array
	*/
	public function setContexts(){}

	/**
	* Set the Resource Group ACLs for the Group
	* @return array
	*/
	public function setResourceGroups(){}

	/**
	* Set the users in the group
	* @return array
	*/
	public function setUsersIn(){}

}
class modUserGroupGetListProcessor extends modObjectGetListProcessor{
}
class modSecurityGroupGetNodesProcessor extends modProcessor{
	/** 
	* @var string $id
	*/
	var $id = null;
	/** 
	* @var modUserGroup $userGroup
	*/
	var $userGroup = null;
	/**
	* Add the Anonymous group to the list
	*
	* @param array $list
	*
	* @return array
	*/
	public function addAnonymous($list){}

	/**
	* Get the User Groups within the filter
	* @return array
	*/
	public function getGroups(){}

	/**
	* Get the selected user group
	* @return \modUserGroup|null
	*/
	public function getUserGroup(){}

	/**
	* Get the Users in the selected User Group
	* @return array
	*/
	public function getUsers(){}

	/**
	* Prepare a User Group for listing
	*
	* @param \modUserGroup $group
	*
	* @return array
	*/
	public function prepareGroup($group){}

	/**
	* Prepare a user for listing
	*
	* @param \modUser $user
	*
	* @return array
	*/
	public function prepareUser($user){}

}
class modUserGroupRemoveProcessor extends modObjectRemoveProcessor{
	/**
	* See if this User Group is the Administrator group
	* @return boolean
	*/
	public function isAdminGroup(){}

}
class modUserGroupSortProcessor extends modProcessor{
	/**
	* Sort and rearrange any groups in the data
	*
	* @param array $data
	*
	* @return void
	*/
	public function sortGroups($data){}

	/**
	* Sort and rearrange any users in the data
	*
	* @param array $data
	*
	* @return void
	*/
	public function sortUsers($data){}

}
class modUserGroupUpdateProcessor extends modObjectUpdateProcessor{
	/**
	* Add users to the User Group
	* @return array
	*/
	public function addUsers(){}

}
class modFormCustomizationSetCreateProcessor extends modObjectCreateProcessor{
}
class modFormCustomizationSetDuplicateProcessor extends modObjectDuplicateProcessor{
	/**
	* Duplicate all the old rules
	* @return void
	*/
	public function duplicateRules(){}

}
class modFormCustomizationSetGetListProcessor extends modObjectGetListProcessor{
	var $canEdit = false;
	var $canRemove = false;
}
class modFormCustomizationSetRemoveProcessor extends modObjectRemoveProcessor{
}
class modFormCustomizationSetRemoveMultipleProcessor extends modProcessor{
}
class modFormCustomizationSetUpdateProcessor extends modObjectUpdateProcessor{
	/** 
	* @var modAction $action
	*/
	var $action = null;
	/** 
	* @var array $newRules
	*/
	var $newRules = array();
	/**
	* Clear out the old rules
	* @return void
	*/
	public function clearOldRules(){}

	/**
	* Save the new rules to the set
	* @return void
	*/
	public function saveNewRules(){}

	/**
	* Calculate field rules
	* @return void
	*/
	public function setFieldRules(){}

	/**
	* Calculate the TV rules
	* @return void
	*/
	public function setTVRules(){}

	/**
	* Calculate tab rules
	* @return void
	*/
	public function setTabRules(){}

}
class modFormCustomizationProfileCreateProcessor extends modObjectCreateProcessor{
}
class modFormCustomizationProfileDuplicateProcessor extends modObjectDuplicateProcessor{
	/**
	* Duplicate all the Sets of the old Profile
	* @return void
	*/
	public function duplicateSets(){}

	/**
	* Duplicate the user group access on the old profile
	* @return void
	*/
	public function duplicateUserGroupAccess(){}

}
class modFormCustomizationProfileGetListProcessor extends modObjectGetListProcessor{
	var $canEdit = false;
	var $canRemove = false;
}
class modFormCustomizationProfileRemoveProcessor extends modObjectRemoveProcessor{
}
class modFormCustomizationProfileRemoveMultipleProcessor extends modProcessor{
}
class modFormCustomizationProfileUpdateProcessor extends modObjectUpdateProcessor{
	public function setUserGroups(){}

}
class modFormCustomizationProfileUpdateFromGridProcessor extends modFormCustomizationProfileUpdateProcessor{
}
class modSecurityAccessUserGroupSourceCreateProcessor extends modObjectCreateProcessor{
}
class modUserGroupAccessSourceGetListProcessor extends modObjectGetListProcessor{
	/** 
	* @var modUserGroup $userGroup
	*/
	var $userGroup = null;
}
class modSecurityAccessUserGroupSourceRemoveProcessor extends modObjectRemoveProcessor{
}
class modSecurityAccessUserGroupSourceUpdateProcessor extends modObjectUpdateProcessor{
}
class modUserGroupAccessResourceGroupGetListProcessor extends modObjectGetListProcessor{
	/** 
	* @var modUserGroup $userGroup
	*/
	var $userGroup = null;
}
class modUserGroupAccessContextGetListProcessor extends modObjectGetListProcessor{
	/** 
	* @var modUserGroup $userGroup
	*/
	var $userGroup = null;
}
class modUserGroupAccessCategoryGetListProcessor extends modObjectGetListProcessor{
	/** 
	* @var modUserGroup $userGroup
	*/
	var $userGroup = null;
}
class modAccessPolicyTemplateGroupGetListProcessor extends modObjectGetListProcessor{
}
class modAccessPolicyTemplateCreateProcessor extends modObjectCreateProcessor{
}
class modAccessPolicyTemplateDuplicateProcessor extends modObjectDuplicateProcessor{
}
class modAccessPolicyTemplateExportProcessor extends modObjectExportProcessor{
	public function addPermissions(){}

	public function addTemplateGroup(){}

}
class modAccessPolicyTemplateGetListProcessor extends modObjectGetListProcessor{
}
class modAccessPolicyTemplateImportProcessor extends modObjectImportProcessor{
	public function addPermissions(){}

	public function setTemplateGroup(){}

}
class modAccessPolicyTemplateRemoveProcessor extends modObjectRemoveProcessor{
}
class modAccessPolicyTemplateRemoveMultipleProcessor extends modObjectProcessor{
	/**
	*
	* @param modAccessPolicyTemplate $template
	*
	*/
	public function logManagerAction($template){}

}
class modAccessPolicyTemplateUpdateProcessor extends modObjectUpdateProcessor{
}
class modAccessPolicyTemplateUpdateFromGridProcessor extends modAccessPolicyUpdateProcessor{
}
class modAccessPolicyCreateProcessor extends modObjectCreateProcessor{
}
class modAccessPolicyDuplicateProcessor extends modObjectDuplicateProcessor{
}
class modAccessPolicyExportProcessor extends modObjectExportProcessor{
	public function addPermissions(){}

	public function addTemplate(){}

	/**
	*
	* @param modAccessPolicyTemplate $template
	*
	*/
	public function addTemplatePermissions($template){}

}
class modAccessPolicyGetListProcessor extends modObjectGetListProcessor{
}
class modAccessPolicyImportProcessor extends modObjectImportProcessor{
	public function addPermissions(){}

	public function createTemplateFromImport(){}

	public function setTemplate(){}

}
class modAccessPolicyRemoveProcessor extends modObjectRemoveProcessor{
}
class modAccessPolicyRemoveMultipleProcessor extends modObjectProcessor{
	/**
	*
	* @param modAccessPolicy $policy
	*
	*/
	public function logManagerAction($policy){}

}
class modAccessPolicyUpdateFromGridProcessor extends modAccessPolicyUpdateProcessor{
}
class modAccessPermissionGetListProcessor extends modObjectGetListProcessor{
}
class modFlushPermissionsProcessor extends modProcessor{
}
class modSecurityFlushProcessor extends modProcessor{
	public function flushSessions(){}

}
class modResourceGroupResourceGetListProcessor extends modProcessor{
	/** 
	* @var modResource $resource
	*/
	var $resource = null;
	/**
	* Get the Resource associated
	* @return \modResource|string
	*/
	public function getResource(){}

}
class modResourceLocksReleaseProcessor extends modProcessor{
}
class modResourceLocksStealProcessor extends modProcessor{
}
class modResourceEventGetListProcessor extends modProcessor{
	/**
	* Get the data from a query
	* @return array
	*/
	public function getData(){}

	/**
	*
	* @param \xPDOObject $object
	*
	* @return array
	*/
	public function prepareRow($object){}

}
class modResourceEventUpdateFromGrid extends modProcessor{
	/** 
	* @var modResource $resource
	*/
	var $resource = null;
	public function validate(){}

}
class modResourceCreateProcessor extends modObjectCreateProcessor{
	/** 
	* @var modResource $parentResource
	*/
	var $parentResource = null;
	/** 
	* @var modTemplate $template
	*/
	var $template = null;
	/** 
	* @var modContext $this->workingContext
	*/
	var $workingContext = null;
	/**
	* Add Template Variables to the Resource object
	* @return array
	*/
	public function addTemplateVariables(){}

	/**
	* Check if new resource token posted from manager
	* @return boolean
	*/
	public function checkForAllowableCreateToken(){}

	/**
	* Handle if parent is a context
	*/
	public function checkIfParentIsContext(){}

	/**
	* Quick check to make sure it's not site_start, if so, publish if not published to prevent site error
	* @return boolean
	*/
	public function checkIfSiteStart(){}

	/**
	* Make sure parent exists and user can add_children to the parent
	* @return boolean|string
	*/
	public function checkParentPermissions(){}

	/**
	* Clear the cache if specified
	* @return boolean
	*/
	public function clearCache(){}

	/**
	* Get the working Context for the Resource
	* @return \modContext
	*/
	public function getWorkingContext(){}

	/**
	* Handle any properties-specific fields
	*/
	public function handleResourceProperties(){}

	/**
	* Clean and prepare the alias, automatically generating it if the option is set
	* @return string
	*/
	public function prepareAlias(){}

	/**
	* Prepare the pagetitle for insertion
	* @return string
	*/
	public function preparePageTitle(){}

	/**
	* Set and prepare the parent field
	* @return int
	*/
	public function prepareParent(){}

	/**
	* Save the Resource Groups on the object
	* @return void
	*/
	public function saveResourceGroups(){}

	/**
	* Set defaults for the fields if values are not passed
	* @return mixed
	*/
	public function setFieldDefaults(){}

	/**
	* Set the menu index on the Resource, incrementing if not set
	* @return int
	*/
	public function setMenuIndex(){}

	/**
	* Update parent to be a container if user has save permission
	* @return boolean
	*/
	public function setParentToContainer(){}

}
class modResourceDataProcessor extends modProcessor{
	/** 
	* @var modResource $resource
	*/
	var $resource = null;
	public function getCacheSource(){}

	public function getChanges($resourceArray){}

}
class modResourceDeleteProcessor extends modProcessor{
	/** 
	* @var array $children
	*/
	var $children = array();
	/** 
	* @var int $deletedTime
	*/
	var $deletedTime = "0";
	/** 
	* @var modUser $lockedUser
	*/
	var $lockedUser = null;
	/** 
	* @var modResource $resource
	*/
	var $resource = null;
	/**
	* Attempt to add a lock to the Resource
	* @return boolean
	*/
	public function addLock(){}

	/**
	* Clear the site cache
	* @return void
	*/
	public function clearCache(){}

	/**
	* Delete all children of this resource
	* @return array
	*/
	public function deleteChildren(){}

	/**
	* Fire the after-delete events
	*
	* @param array $childrenIds
	*
	* @return void
	*/
	public function fireAfterDelete($childrenIds=array()){}

	/**
	* Fire any pre-delete events
	*
	* @param array $childrenIds
	*
	* @return void
	*/
	public function fireBeforeDelete($childrenIds=array()){}

	/**
	* Get the IDs of all the children of the Resource
	* @return array
	*/
	public function getChildrenIds(){}

	/**
	* Log the manager action
	* @return void
	*/
	public function logManagerAction(){}

}
class modResourceDuplicateProcessor extends modProcessor{
	/** 
	* @var modResource $newResource
	*/
	var $newResource = null;
	/** 
	* @var modResource $oldResource
	*/
	var $oldResource = null;
	/** 
	* @var modResource $parentResource
	*/
	var $parentResource = null;
	/**
	* Ensure the user can add children to the parent
	* @return boolean
	*/
	public function checkParentPermissions(){}

	/**
	* Fire the OnResourceDuplicate event
	* @return void
	*/
	public function fireDuplicateEvent(){}

	/**
	* Log the manager action
	* @return void
	*/
	public function logManagerAction(){}

}
class modResourceEmptyRecycleBinProcessor extends modProcessor{
}
class modResourceGetProcessor extends modObjectGetProcessor{
	public function formatDates($resourceArray){}

}
class modResourceGetListProcessor extends modObjectGetListProcessor{
}
class modResourceGetNodesProcessor extends modProcessor{
	var $actions = array();
	var $contextKey = false;
	/** 
	* @var int $defaultRootId
	*/
	var $defaultRootId = null;
	var $itemClass = null;
	var $items = array();
	var $permissions = array();
	var $startNode = "0";
	/**
	* Get the query object for grabbing Contexts in the tree
	* @return \xPDOQuery
	*/
	public function getContextQuery(){}

	/**
	* Get the query object for grabbing Resources in the tree
	* @return \xPDOQuery
	*/
	public function getResourceQuery(){}

	/**
	* Determine the context and root and start nodes for the tree
	* @return void
	*/
	public function getRootNode(){}

	/**
	* Iterate across the collection of items from the query
	*
	* @param array $collection
	*
	* @return void
	*/
	public function iterate($collection=array()){}

	/**
	* Prepare the tree nodes, by getting the action IDs and permissions
	* @return void
	*/
	public function prepare(){}

	/**
	* Prepare a Context for being shown in the tree
	*
	* @param \modContext $context
	*
	* @return array
	*/
	public function prepareContextNode($context){}

	/**
	* Prepare a Resource for being shown in the tree
	*
	* @param \modResource $resource
	*
	* @return array
	*/
	public function prepareResourceNode($resource){}

	/**
	* Add search results to tree nodes
	*
	* @param string $query
	*
	* @return void
	*/
	public function search($query){}

}
class modResourceGetToolbarProcessor extends modProcessor{
}
class modResourcePublishProcessor extends modProcessor{
	/** 
	* @var modUser $lockedUser
	*/
	var $lockedUser = null;
	/** 
	* @var modResource $resource
	*/
	var $resource = null;
	/**
	* Attempt to lock the Resource
	* @return boolean
	*/
	public function addLock(){}

	/**
	* Check for a duplicate alias before publishing
	* @return boolean|string
	*/
	public function checkForDuplicateAlias(){}

	/**
	* Clear the site cache
	* @return void
	*/
	public function clearCache(){}

	/**
	* Fire after-publish events
	* @return void
	*/
	public function fireAfterPublish(){}

	/**
	* Log a manager action
	* @return void
	*/
	public function logManagerAction(){}

}
class modResourceReloadProcessor extends modProcessor{
}
class modResourceSearchProcessor extends modObjectGetListProcessor{
	/** 
	* @var array $actions
	*/
	var $actions = array();
	/** 
	* @var boolean $canEdit
	*/
	var $canEdit = false;
	/** 
	* @var string $charset
	*/
	var $charset = "UTF-8";
	/** 
	* @var array $contextKeys
	*/
	var $contextKeys = array();
	/**
	* Get a collection of Context keys that the User can access for all the Resources
	* @return array
	*/
	public function getContextKeys(){}

}
class modResourceSortProcessor extends modProcessor{
	var $contexts = array();
	var $contextsAffected = array();
	var $nodes = array();
	var $nodesAffected = array();
	public function clearCache(){}

	public function fireAfterSort(){}

	public function fireBeforeSort(){}

}
class modResourceUnDeleteProcessor extends modProcessor{
	/** 
	* @var modUser $user
	*/
	var $lockedUser = null;
	/** 
	* @var modResource $resource
	*/
	var $resource = null;
	/**
	* Add a lock to the Resource while undeleting it
	* @return boolean
	*/
	public function addLock(){}

	/**
	* Clear the site cache
	* @return void
	*/
	public function clearCache(){}

	/**
	* Fire the UnDelete event
	* @return void
	*/
	public function fireAfterUnDeleteEvent(){}

	/**
	* Log the manager action
	* @return void
	*/
	public function logManagerAction(){}

	/**
	* Remove the lock from the Resource
	* @return boolean
	*/
	public function removeLock(){}

	/**
	* UnDelete all the children Resources recursively
	*
	* @param int $parent
	*
	* @return boolean
	*/
	public function unDeleteChildren($parent){}

}
class modResourceUnPublishProcessor extends modProcessor{
	/** 
	* @var modUser $user
	*/
	var $lockedUser = null;
	/** 
	* @var modResource $resource
	*/
	var $resource = null;
	/**
	* Add a lock to the Resource while unpublishing it
	* @return boolean
	*/
	public function addLock(){}

	/**
	* Clear the site cache
	* @return void
	*/
	public function clearCache(){}

	/**
	* Fire the after unpublish event
	* @return void
	*/
	public function fireAfterUnPublishEvent(){}

	/**
	* Checks if the given resource is set as site_start
	* @return bool
	*/
	public function isSiteStart(){}

	/**
	* Log the manager action
	* @return void
	*/
	public function logManagerAction(){}

}
class modResourceUpdateProcessor extends modObjectUpdateProcessor{
	/** 
	* @var boolean $isSiteStart
	*/
	var $isSiteStart = false;
	/** 
	* @var modUser $lockedUser;
	*/
	var $lockedUser = null;
	/** 
	* @var modResource $newParent
	*/
	var $newParent = null;
	/** 
	* @var modContext $oldContext
	*/
	var $oldContext = null;
	/** 
	* @var modResource $oldParent
	*/
	var $oldParent = null;
	/** 
	* @var modResource $parentResource
	*/
	var $parentResource = null;
	/** 
	* @var string $resourceClass
	*/
	var $resourceClass = null;
	/** 
	* @var boolean $resourceDeleted
	*/
	var $resourceDeleted = false;
	/** 
	* @var boolean $resourceUnDeleted
	*/
	var $resourceUnDeleted = false;
	/** 
	* @var modTemplate $template
	*/
	var $template = null;
	/** 
	* @var modContext $this->workingContext
	*/
	var $workingContext = null;
	/**
	* Add a lock to the resource we are saving
	* @return boolean
	*/
	public function addLock(){}

	/**
	* Reassign context for children if changed on main Resource
	* @return void
	*/
	public function checkContextOfChildren(){}

	/**
	* Check deleted status and ensure user has permissions to delete resource
	* @return boolean
	*/
	public function checkDeletedStatus(){}

	/**
	* Check to prevent unpublishing of site_start
	* @return boolean
	*/
	public function checkForUnPublishOnSiteStart(){}

	/**
	* Friendly URL alias checks
	* @return mixed|string
	*/
	public function checkFriendlyAlias(){}

	/**
	* If parent is changed, set context to new parent's context
	* @return mixed
	*/
	public function checkParentContext(){}

	/**
	* Set publishedon date if publish change is different
	* @return int
	*/
	public function checkPublishedOn(){}

	/**
	* Deny publishing if the user does not have access to
	* @return boolean
	*/
	public function checkPublishingPermissions(){}

	/**
	* Empty site cache if specified to do so
	* @return void
	*/
	public function clearCache(){}

	/**
	* Fire Delete event if resource was deleted
	* @return null
	*/
	public function fireDeleteEvent(){}

	/**
	* Fire UnDelete event if resource was undeleted
	* @return mixed
	*/
	public function fireUnDeleteEvent(){}

	/**
	* Set the parents isfolder status based upon remaining children
	* @return void
	*/
	public function fixParents(){}

	/**
	* Handle formatting of various checkbox fields
	* @return void
	*/
	public function handleCheckBoxes(){}

	/**
	* Handle the parent field, checking for veracity
	* @return int|mixed
	*/
	public function handleParent(){}

	/**
	* Handle any properties-specific fields
	*/
	public function handleResourceProperties(){}

	/**
	* Set any Template Variables passed to the Resource. You must pass "tvs" as 1 or true to initiate these checks.
	* @return array|mixed
	*/
	public function saveTemplateVariables(){}

	/**
	* Format the pub_date if it is set and adjust contingencies
	* @return int
	*/
	public function setPublishDate(){}

	/**
	* If specified, set the Resource Groups attached to the Resource
	* @return mixed
	*/
	public function setResourceGroups(){}

	/**
	* Format the unpub_date if it is set and adjust contingencies
	* @return int|mixed
	*/
	public function setUnPublishDate(){}

	/**
	* Trim the page title
	* @return string
	*/
	public function trimPageTitle(){}

}
class modResourceUpdateFromGridProcessor extends modResourceUpdateProcessor{
}
class modElementTvTemplateGetList extends modProcessor{
	/**
	* Get the Template objects
	* @return array
	*/
	public function getData(){}

	/**
	* Prepare object for iteration
	*
	* @param \modTemplate $template
	*
	* @return array
	*/
	public function prepareRow($template){}

}
class modElementTvTemplateUpdateFromGrid extends modProcessor{
	/**
	* For adding access or updating rank
	*
	* @param array $fields
	*
	* @return \modTemplateVarTemplate|string
	*/
	public function addAccess($fields){}

	/**
	* For removing access
	*
	* @param array $fields
	*
	* @return \modTemplateVarTemplate|string
	*/
	public function removeAccess($fields){}

}
class modElementTvResourceGroupGetListProcessor extends modProcessor{
	/**
	* Get the Resource Group objects
	* @return array
	*/
	public function getData(){}

	/**
	* Prepare object for iteration
	*
	* @param \modResourceGroup $resourceGroup
	*
	* @return array
	*/
	public function prepareRow($resourceGroup){}

}
class modTemplateVarOutputRenderDate extends modTemplateVarOutputRender{
}
class modTemplateVarOutputRenderDefault extends modTemplateVarOutputRender{
}
class modTemplateVarOutputRenderDelim extends modTemplateVarOutputRender{
}
class modTemplateVarOutputRenderHtmlTag extends modTemplateVarOutputRender{
}
class modTemplateVarOutputRenderImage extends modTemplateVarOutputRender{
}
class modTemplateVarOutputRenderRichText extends modTemplateVarOutputRender{
}
class modTemplateVarOutputRenderString extends modTemplateVarOutputRender{
}
class modTemplateVarOutputRenderText extends modTemplateVarOutputRender{
}
class modTemplateVarOutputRenderUrl extends modTemplateVarOutputRender{
}
class modTemplateVarInputRenderAutoTag extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderCheckbox extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderDate extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderEmail extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderFile extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderHidden extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderImage extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderListbox extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderNumber extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderOption extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderResourceList extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderRichText extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderTag extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderText extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderTextArea extends modTemplateVarInputRender{
}
class modTemplateVarInputRenderUrl extends modTemplateVarInputRender{
}
class modTvRendersGetPropertiesProcessor extends modProcessor{
	/**
	* Get default display properties for specific tv
	* @return array
	*/
	public function getInputProperties(){}

	/**
	* @return array
	*/
	public function getRenderDirectories(){}

	/**
	* Get the properties render output when given an array of directories to search
	*
	* @param array $renderDirectories
	*
	* @return mixed|string
	*/
	public function getRenderOutput($renderDirectories){}

	/**
	* Simulate controller with the faux controller class
	* @return string
	*/
	public function renderController(){}

}
abstract class modManagerController{
	/** 
	* @var array A configuration array of options related to this controller's action object.
	*/
	var $config = array();
	/** 
	* @var string The current output content
	*/
	var $content = "";
	/** 
	* @var array An array of possible paths to this controller's directory.
	*/
	var $controllersPaths = null;
	/** 
	* @var modMediaSource The default media source for the user
	*/
	var $defaultSource = null;
	/** 
	* @var array An array of css/js/html to load into the HEAD of the page
	*/
	var $head = array();
	/** 
	* @var bool Set to false to prevent loading of the base MODExt JS classes.
	*/
	var $loadBaseJavascript = true;
	/** 
	* @var bool Set to false to prevent loading of the footer HTML.
	*/
	var $loadFooter = true;
	/** 
	* @var bool Set to false to prevent loading of the header HTML.
	*/
	var $loadHeader = true;
	/** 
	* @var modX A reference to the modX object
	*/
	var $modx = null;
	/** 
	* @var array An array of placeholders that are being set to the page
	*/
	var $placeholders = array();
	/** 
	* @var array An array of request parameters sent to the controller
	*/
	var $scriptProperties = array();
	/** 
	* @var array An array of possible paths to this controller's templates directory.
	*/
	var $templatesPaths = array();
	/** 
	* @var modContext The current working context.
	*/
	var $workingContext = null;
	/**
	* Add a external CSS file to the head of the page
	*
	* @param string $script
	*
	* @return void
	*/
	public function addCss($script){}

	/**
	* Add a block of HTML to the head of the page
	*
	* @param string $script
	*
	* @return void
	*/
	public function addHtml($script){}

	/**
	* Add an external Javascript file to the head of the page
	*
	* @param string $script
	*
	* @return void
	*/
	public function addJavascript($script){}

	/**
	* Add an external Javascript file to the head of the page
	*
	* @param string $script
	*
	* @return void
	*/
	public function addLastJavascript($script){}

	/**
	* Adds a topic to the JS language array
	*
	* @param string $topic
	*
	* @return string
	*/
	public function addLexiconTopic($topic){}

	/**
	* Checks Form Customization rules for an object.
	*
	* @param \xPDOObject $obj
	* @param bool $forParent
	*
	* @return bool
	*/
	public function checkFormCustomizationRules($obj=null, $forParent=false){}

	/**
	* Do permission checking in this method. Returning false will present a "permission denied" message.
	* @return boolean
	*/
	public function checkPermissions(){}

	/**
	* Set a failure on this controller. This will return the error message.
	*
	* @param string $message
	*
	* @return void
	*/
	public function failure($message){}

	/**
	* Fetch the template content
	*
	* @param string $tpl
	*
	* @return string
	*/
	public function fetchTemplate($tpl){}

	/**
	* Can be used to fire events after all the CSS/JS is loaded for a page
	* @return void
	*/
	public function firePostRenderEvents(){}

	/**
	* Fire any pre-render events for the controller
	* @return void
	*/
	public function firePreRenderEvents(){}

	/**
	* Get the path to this controller's directory. Override this to point to a custom directory.
	*
	* @param bool $coreOnly
	*
	* @return array
	*/
	public function getControllersPaths($coreOnly=false){}

	/**
	* Get the default state for the UI
	* @return array|mixed|string
	*/
	public function getDefaultState(){}

	/**
	* Get the page footer for the controller.
	* @return string
	*/
	public function getFooter(){}

	/**
	* Get the page header for the controller.
	* @return string
	*/
	public function getHeader(){}

	/**
	* Return the proper instance of the derived class. This can be used to override how the manager loads a controller class; for example, when handling derivative classes with class_key settings.
	*
	* @param \modX $modx
	* @param string $className
	* @param array $config
	*
	* @return \The
	*/
	public function getInstance($modx, $className, $config=array()){}

	/**
	* Specify an array of language topics to load for this controller
	* @return array
	*/
	public function getLanguageTopics(){}

	/**
	* Return a string to set as the controller's page title.
	* @return string
	*/
	public function getPageTitle(){}

	/**
	* Get a specific placeholder set
	*
	* @param string $k
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getPlaceholder($k, $default=null){}

	/**
	* Get all the set placeholders
	* @return array
	*/
	public function getPlaceholders(){}

	/**
	* Return the relative path to the template file to load
	* @return string
	*/
	public function getTemplateFile(){}

	/**
	* Get an array of possible paths to this controller's template's directory.
	*
	* @param bool $coreOnly
	*
	* @return array|string
	*/
	public function getTemplatesPaths($coreOnly=false){}

	/**
	* Can be used to provide custom methods prior to processing
	* @return void
	*/
	public function initialize(){}

	/**
	* Load another manual controller file (such as header/footer)
	*
	* @param bool $coreOnly
	*
	* @return mixed|string
	*/
	public function loadController($controller, $coreOnly=false){}

	/**
	* Load an array of possible paths to this controller's directory. Only override this if you want to override default behavior; otherwise, overriding getControllersPath is preferred.
	* @return array
	*/
	public function loadControllersPath(){}

	/**
	* Register any custom CSS or JS in this method.
	* @return void
	*/
	public function loadCustomCssJs(){}

	/**
	* Load the path to this controller's template's directory. Only override this if you want to override default behavior; otherwise, overriding getTemplatesPath is preferred.
	* @return string
	*/
	public function loadTemplatesPath(){}

	/**
	* Load the working context for this controller.
	* @return \modContext|string
	*/
	public function loadWorkingContext(){}

	/**
	* Prepares the language placeholders
	*/
	public function prepareLanguage(){}

	/**
	* Process the controller, returning an array of placeholders to set.
	*
	* @param array $scriptProperties
	*
	* @return mixed
	*/
	public function process($scriptProperties=array()){}

	/**
	* Registers the core and base JS scripts
	* @return void
	*/
	public function registerBaseScripts(){}

	/**
	* Registers CSS/JS to manager interface
	*/
	public function registerCssJs(){}

	/**
	* Render the controller.
	* @return string
	*/
	public function render(){}

	/**
	* Set a placeholder for this controller's template
	*
	* @param string $k
	* @param mixed $v
	*
	* @return void
	*/
	public function setPlaceholder($k, $v){}

	/**
	* Set an array of placeholders
	*
	* @param array $keys
	*
	* @return void
	*/
	public function setPlaceholders($keys){}

	/**
	* Sets the properties array for this controller
	*
	* @param array $properties
	*
	* @return void
	*/
	public function setProperties($properties){}

	/**
	* Set a property for this controller
	*
	* @param string $key
	* @param mixed $value
	*
	* @return void
	*/
	public function setProperty($key, $value){}

	/**
	* Set the possible template paths for this controller
	*
	* @param array $paths
	*
	* @return void
	*/
	public function setTemplatePaths($paths){}

}
abstract class modExtraManagerController extends modManagerController{
	/**
	* Return the class name of a controller given the action
	*
	* @param string $action
	* @param string $namespace
	* @param string $postFix
	*
	* @return string
	*/
	public function getControllerClassName($action, $namespace="", $postFix="ManagerController"){}

	/**
	* Define the default controller action for this namespace
	* @return string
	*/
	public function getDefaultController(){}

}
class TvInputPropertiesManagerController extends modManagerController{
}
class modElementTvRendersGetInputsProcessor extends modProcessor{
}
class TvInputManagerController extends modManagerController{
}
abstract class modElementCreateProcessor extends modObjectCreateProcessor{
	/**
	* Check to see if a Chunk already exists with specified name
	*
	* @param string $name
	*
	* @return bool
	*/
	public function alreadyExists($name){}

	/**
	* Clear the cache post-save
	* @return void
	*/
	public function clearCache(){}

	/**
	* Set the properties on the Element
	* @return mixed
	*/
	public function setElementProperties(){}

	/**
	* Run object-level validation on the element
	* @return void
	*/
	public function validateElement(){}

}
class modTemplateVarCreateProcessor extends modElementCreateProcessor{
	/**
	* Set the Input Options for the TV
	* @return array
	*/
	public function setInputProperties(){}

	/**
	* Set source-element maps
	* @return void
	*/
	public function setMediaSources(){}

	/**
	* Set the Output Options for the TV
	* @return array
	*/
	public function setOutputProperties(){}

	/**
	* Set Resource Groups access to TV
	* @return array|string
	*/
	public function setResourceGroupAccess(){}

	/**
	* Set the Template Access to the TV
	* @return void
	*/
	public function setTemplateAccess(){}

}
class modElementDuplicateProcessor extends modObjectDuplicateProcessor{
}
class modTemplateVarDuplicateProcessor extends modElementDuplicateProcessor{
	/**
	* Duplicate all media source associations
	* @return void
	*/
	public function duplicateMediaSources(){}

	/**
	* Duplicate Resource Group associations
	* @return void
	*/
	public function duplicateResourceGroups(){}

	/**
	* Duplicate the values of the TV across Resources using it
	* @return void
	*/
	public function duplicateResources(){}

	/**
	* Duplicate Template associations
	* @return void
	*/
	public function duplicateTemplates(){}

}
abstract class modElementGetProcessor extends modObjectGetProcessor{
	/**
	* Get the properties of the element
	* @return array
	*/
	public function getElementProperties(){}

}
class modTemplateVarGetProcessor extends modElementGetProcessor{
}
abstract class modElementGetListProcessor extends modObjectGetListProcessor{
}
class modTemplateVarGetListProcessor extends modElementGetListProcessor{
}
abstract class modElementRemoveProcessor extends modObjectRemoveProcessor{
	public function clearCache(){}

}
class modTemplateVarRemoveProcessor extends modElementRemoveProcessor{
	var $TemplateVarResourceGroups = array();
	var $TemplateVarResources = array();
	var $TemplateVarTemplates = array();
}
abstract class modElementUpdateProcessor extends modObjectUpdateProcessor{
	var $previousCategory = null;
	public function alreadyExists($name){}

}
class modElementTvUpdateProcessor extends modElementUpdateProcessor{
	/**
	* Set the input properties based on the passed data
	* @return array
	*/
	public function setInputProperties(){}

	/**
	* Set the Media Source attributions, if passed, for the TV
	* @return void
	*/
	public function setMediaSources(){}

	/**
	* Set the output properties based on the passed data
	* @return array
	*/
	public function setOutputProperties(){}

	/**
	* Set the Resource Groups, if passed, for the TV
	* @return void
	*/
	public function setResourceGroups(){}

	/**
	* Set the Templates, if passed, for the TV
	* @return void
	*/
	public function setTemplateAccess(){}

}
class modTemplateCreateProcessor extends modElementCreateProcessor{
	/**
	* Save template variables associated to the Template
	* @return void
	*/
	public function saveTemplateVariables(){}

}
class modTemplateDuplicateProcessor extends modElementDuplicateProcessor{
	public function duplicateTemplateVariables(){}

}
class modTemplateGetProcessor extends modElementGetProcessor{
}
class modTemplateGetListProcessor extends modElementGetListProcessor{
}
class modTemplateRemoveProcessor extends modElementRemoveProcessor{
	var $TemplateVarTemplates = array();
}
class modTemplateUpdateProcessor extends modElementUpdateProcessor{
	/**
	* Set the TemplateVar associations to this Template
	* @return void
	*/
	public function setTemplateVariables(){}

}
class modSnippetCreateProcessor extends modElementCreateProcessor{
}
class modSnippetDuplicateProcessor extends modElementDuplicateProcessor{
}
class modSnippetGetProcessor extends modElementGetProcessor{
}
class modSnippetGetListProcessor extends modElementGetListProcessor{
}
class modSnippetRemoveProcessor extends modElementRemoveProcessor{
}
class modSnippetUpdateProcessor extends modElementUpdateProcessor{
}
class modPropertySetCreateProcessor extends modObjectCreateProcessor{
	public function stripInvalidCharacters(){}

}
class modPropertySetUpdateProcessor extends modObjectUpdateProcessor{
	public function alreadyExists($name){}

	public function stripInvalidCharacters($name){}

}
class modPluginEventGetListProcessor extends modObjectProcessor{
	public function getData(){}

}
class modPluginActivateProcessor extends modObjectUpdateProcessor{
	var $checkViewPermission = false;
}
class modPluginCreateProcessor extends modElementCreateProcessor{
	/**
	* Save system events
	* @return void
	*/
	public function saveEvents(){}

}
class modPluginDeactivateProcessor extends modObjectUpdateProcessor{
	var $checkViewPermission = false;
}
class modPluginDuplicateProcessor extends modElementDuplicateProcessor{
	public function duplicateSystemEvents(){}

}
class modPluginGetProcessor extends modElementGetProcessor{
}
class modPluginGetListProcessor extends modElementGetListProcessor{
}
class modPluginRemoveProcessor extends modElementRemoveProcessor{
}
class modPluginUpdateProcessor extends modElementUpdateProcessor{
	/**
	* Update system event associations
	* @return void
	*/
	public function setSystemEvents(){}

}
class modChunkCreateProcessor extends modElementCreateProcessor{
}
class modChunkDuplicateProcessor extends modElementDuplicateProcessor{
}
class modChunkGetProcessor extends modElementGetProcessor{
}
class modChunkGetListProcessor extends modElementGetListProcessor{
}
class modChunkRemoveProcessor extends modElementRemoveProcessor{
}
class modChunkUpdateProcessor extends modElementUpdateProcessor{
}
class modElementCategoryCreateProcessor extends modObjectCreateProcessor{
	/**
	* Check to see if a Category with that name already exists
	*
	* @param string $name
	*
	* @return boolean
	*/
	public function alreadyExists($name){}

}
class modElementCategoryGetProcessor extends modObjectGetProcessor{
}
class modElementCategoryGetListProcessor extends modObjectGetListProcessor{
}
class modElementCategoryRemoveProcessor extends modObjectRemoveProcessor{
}
class modElementCategoryUpdateProcessor extends modObjectUpdateProcessor{
}
class modElementExportPropertiesProcessor extends modProcessor{
	/**
	* Download the file
	*
	* @param string $file
	*
	* @return bool|string
	*/
	public function download($file){}

	/**
	* Export the properties into a temporary export file
	* @return mixed
	*/
	public function export(){}

}
class modElementGetClassesProcessor extends modProcessor{
}
class modElementGetInsertProperties extends modProcessor{
	/** 
	* @var modElement $element
	*/
	var $element = null;
	/**
	* Get the properties for the element
	* @return array
	*/
	public function getElementProperties(){}

	/**
	* Prepare the property array for property insertion
	*
	* @param string $key
	* @param array $property
	*
	* @return array
	*/
	public function prepareProperty($key, $property){}

}
class modElementGetListByClass extends modProcessor{
	public function getElements($className){}

}
class modElementGetNodesProcessor extends modProcessor{
	var $actionMap = array();
	var $typeMap = array();
	public function getActions(){}

	public function getCategoryNodes($map){}

	public function getInCategoryNodes($map){}

	public function getMap(){}

	public function getRootNodes($map){}

	public function getTypeNodes($map){}

}
class modElementImportPropertiesProcessor extends modProcessor{
	var $file = array();
}
class modElementSortProcessor extends modProcessor{
	public function getCategoryNodeDrop($cdata, $type=array(), $currentParent="0"){}

	/**
	* Get the data formatted and ready for sorting
	* @return array
	*/
	public function getData(){}

	public function getNodesFormatted($ar_nodes, $cur_level, $parent="0"){}

	/**
	* Handle dropping of Elements or Categories onto Categories
	*
	* @param array $data
	*
	* @return void
	*/
	public function handleCategoryDrop($data){}

	/**
	* Handle dropping of Categories onto other Categories
	*
	* @param array $data
	*
	* @return void
	*/
	public function handleSubCategoryDrop($data){}

	public function processID($ar){}

	/**
	* Properly sort the data
	*
	* @param string $xname
	* @param string $type
	* @param array $data
	*
	* @return void
	*/
	public function sortNodes($xname, $type, $data){}

	public function sortNodesHelper($objs, $xname, $currentCategoryId="0"){}

}
class modContextCreateProcessor extends modObjectCreateProcessor{
	/**
	* Check to see if the context already exists
	*
	* @param string $key
	*
	* @return boolean
	*/
	public function alreadyExists($key){}

	/**
	* Enable anonymous Load Only access to a context.
	* @return void
	*/
	public function enableAnonymousAccess(){}

	/**
	* Ensure that Admin User Group always has access to this context, so that it never loses the ability to remove or edit it.
	* @return void
	*/
	public function ensureAdministratorAccess(){}

	/**
	* Refresh the mgr user ACLs to accurately update the context's permissions
	* @return void
	*/
	public function refreshUserACLs(){}

}
class modContextDuplicateProcessor extends modObjectDuplicateProcessor{
	/**
	* Duplicate the ACLs of the old Context into the new one
	* @return array
	*/
	public function duplicateAccessControlLists(){}

	/**
	* Duplicate the Resources of the old Context into the new one
	* @return void
	*/
	public function duplicateResources(){}

	/**
	* Duplicate the settings of the old Context to the new one
	* @return array
	*/
	public function duplicateSettings(){}

	/**
	* Flush permissions for the mgr user to properly handle the new context
	* @return void
	*/
	public function reloadPermissions(){}

}
class modContextGetProcessor extends modObjectGetProcessor{
}
class modContextGetListProcessor extends modObjectGetListProcessor{
	/** 
	* @var boolean $canEdit Determines whether or not the user can edit a Context
	*/
	var $canEdit = false;
	/** 
	* @var boolean $canRemove Determines whether or not the user can remove a Context
	*/
	var $canRemove = false;
}
class modContextRemoveProcessor extends modObjectRemoveProcessor{
}
class modContextUpdateProcessor extends modObjectUpdateProcessor{
	/**
	* Run the OnContextUpdate event
	* @return void
	*/
	public function runOnUpdateEvent(){}

	/**
	* Update the context settings for this Context
	* @return array
	*/
	public function updateContextSettings(){}

}
class modContextUpdateFromGridProcessor extends modProcessor{
	/** 
	* @var modContext $context
	*/
	var $context = null;
	/**
	* Check to see if the context already exists
	*
	* @param string $key
	*
	* @return boolean
	*/
	public function alreadyExists($key){}

	/**
	* Log the manager action of updating this Context
	* @return void
	*/
	public function logManagerAction(){}

	/**
	* Run the OnContextUpdate event
	* @return void
	*/
	public function runOnUpdateEvent(){}

	/**
	* Validate the passed properties
	* @return boolean
	*/
	public function validate(){}

}
class modBrowserFileCreateProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* @return boolean|string
	*/
	public function getSource(){}

}
class modBrowserFileDownloadProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	public function download(){}

	public function getObjectUrl(){}

	/**
	* @return boolean|string
	*/
	public function getSource(){}

}
class modBrowserFileGetProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* @return boolean|string
	*/
	public function getSource(){}

}
class modBrowserFileRemoveProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* @return boolean|string
	*/
	public function getSource(){}

}
class modBrowserFileRenameProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* @return boolean|string
	*/
	public function getSource(){}

	/**
	* Validate form
	* @return boolean
	*/
	public function validate(){}

}
class modBrowserFileUpdateProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* @return boolean|string
	*/
	public function getSource(){}

}
class modBrowserFileUploadProcessor extends modProcessor{
	/** 
	* @var modMediaSource $source
	*/
	var $source = null;
	/**
	* Get the active Source
	* @return \modMediaSource|boolean
	*/
	public function getSource(){}

}
class modBrowserFolderChmodProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* Get the active Source
	* @return \modMediaSource|boolean
	*/
	public function getSource(){}

}
class modBrowserFolderCreateProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* Get the active Source
	* @return \modMediaSource|boolean
	*/
	public function getSource(){}

}
class modBrowserFolderGetFilesProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* Get the active Source
	* @return \modMediaSource|boolean
	*/
	public function getSource(){}

}
class modBrowserFolderGetListProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* Get the active Source
	* @return \modMediaSource|boolean
	*/
	public function getSource(){}

}
class modBrowserFolderRemoveProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* Get the active Source
	* @return \modMediaSource|boolean
	*/
	public function getSource(){}

}
class modBrowserFolderRenameProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* Get the active Source
	* @return \modMediaSource|boolean
	*/
	public function getSource(){}

	/**
	* Handle the response from the source
	*
	* @param string $response
	*
	* @return array|string
	*/
	public function handleResponse($response){}

	/**
	* Validate the fields passed in
	*
	* @param array $fields
	*
	* @return boolean
	*/
	public function validate($fields){}

}
class modBrowserFolderSortProcessor extends modProcessor{
}
class modBrowserFolderUpdateProcessor extends modProcessor{
	/** 
	* @var modMediaSource|modFileMediaSource $source
	*/
	var $source = null;
	/**
	* Validate form
	* @return boolean
	*/
	public function validate(){}

}
class modAccess_mysql extends modAccess{
}
class modAccessAction_mysql extends modAccessAction{
}
class modAccessActionDom_mysql extends modAccessActionDom{
}
class modAccessCategory_mysql extends modAccessCategory{
}
class modAccessContext_mysql extends modAccessContext{
}
class modAccessElement_mysql extends modAccessElement{
}
class modAccessibleObject_mysql extends modAccessibleObject{
}
class modAccessibleSimpleObject_mysql extends modAccessibleSimpleObject{
}
class modAccessMenu_mysql extends modAccessMenu{
}
class modAccessPermission_mysql extends modAccessPermission{
}
class modAccessPolicy_mysql extends modAccessPolicy{
}
class modAccessPolicyTemplate_mysql extends modAccessPolicyTemplate{
}
class modAccessPolicyTemplateGroup_mysql extends modAccessPolicyTemplateGroup{
}
class modAccessResource_mysql extends modAccessResource{
}
class modAccessResourceGroup_mysql extends modAccessResourceGroup{
}
class modAccessTemplateVar_mysql extends modAccessTemplateVar{
}
class modAction_mysql extends modAction{
}
class modActionDom_mysql extends modActionDom{
}
class modActionField_mysql extends modActionField{
}
class modActiveUser_mysql extends modActiveUser{
}
class modCategory_mysql extends modCategory{
}
class modCategoryClosure_mysql extends modCategoryClosure{
}
class modChunk_mysql extends modChunk{
}
class modClassMap_mysql extends modClassMap{
}
class modContentType_mysql extends modContentType{
}
class modContext_mysql extends modContext{
}
class modContextResource_mysql extends modContextResource{
}
class modContextSetting_mysql extends modContextSetting{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listSettings($xpdo, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modDashboard_mysql extends modDashboard{
}
class modDashboardWidget_mysql extends modDashboardWidget{
}
class modDashboardWidgetPlacement_mysql extends modDashboardWidgetPlacement{
}
class modDocument_mysql extends modDocument implements modResourceInterface{
}
class modElement_mysql extends modElement{
}
class modElementPropertySet_mysql extends modElementPropertySet{
}
class modEvent_mysql extends modEvent{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listEvents($xpdo, $plugin, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modFormCustomizationProfile_mysql extends modFormCustomizationProfile{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listProfiles($xpdo, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modFormCustomizationProfileUserGroup_mysql extends modFormCustomizationProfileUserGroup{
}
class modFormCustomizationSet_mysql extends modFormCustomizationSet{
}
class modJSONRPCResource_mysql extends modJSONRPCResource implements modResourceInterface{
}
class modLexiconEntry_mysql extends modLexiconEntry{
}
class modManagerLog_mysql extends modManagerLog{
}
class modMenu_mysql extends modMenu{
}
class modNamespace_mysql extends modNamespace{
}
class modPlugin_mysql extends modPlugin{
}
class modPluginEvent_mysql extends modPluginEvent{
}
class modPrincipal_mysql extends modPrincipal{
}
class modPropertySet_mysql extends modPropertySet{
}
class modResource_mysql extends modResource implements modResourceInterface{
}
class modResourceGroup_mysql extends modResourceGroup{
}
class modResourceGroupResource_mysql extends modResourceGroupResource{
}
class modScript_mysql extends modScript{
}
class modSession_mysql extends modSession{
}
class modSnippet_mysql extends modSnippet{
}
class modStaticResource_mysql extends modStaticResource implements modResourceInterface{
}
class modSymLink_mysql extends modSymLink implements modResourceInterface{
}
class modSystemSetting_mysql extends modSystemSetting{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listSettings($xpdo, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modTemplate_mysql extends modTemplate{
}
class modTemplateVar_mysql extends modTemplateVar{
}
class modTemplateVarResource_mysql extends modTemplateVarResource{
}
class modTemplateVarResourceGroup_mysql extends modTemplateVarResourceGroup{
}
class modTemplateVarTemplate_mysql extends modTemplateVarTemplate{
}
class modUser_mysql extends modUser{
}
class modUserGroup_mysql extends modUserGroup{
}
class modUserGroupMember_mysql extends modUserGroupMember{
}
class modUserGroupRole_mysql extends modUserGroupRole{
}
class modUserMessage_mysql extends modUserMessage{
}
class modUserProfile_mysql extends modUserProfile{
}
class modUserSetting_mysql extends modUserSetting{
	/**
	*
	* @param xPDO $xpdo
	*
	*/
	public function listSettings($xpdo, $criteria=array(), $sort=array(), $limit="0", $offset="0"){}

}
class modWebLink_mysql extends modWebLink implements modResourceInterface{
}
class modWorkspace_mysql extends modWorkspace{
}
class modXMLRPCResource_mysql extends modXMLRPCResource implements modResourceInterface{
}
abstract class modMail{
	/** 
	* An array of address types: to, cc, bcc, reply-to
	* @var array
	*/
	var $addresses = array();
	/** 
	* A collection of attributes defining all of the details of email communication.
	* @var array
	*/
	var $attributes = array();
	/** 
	* An array of attached files
	* @var array
	*/
	var $files = array();
	/** 
	* A collection of all the current headers for the object.
	* @var array
	*/
	var $headers = array();
	/** 
	* The mailer object responsible for implementing the modMail methods.
	* @var object
	*/
	var $mailer = null;
	/** 
	* A reference to the modX instance communicating with this service instance.
	* @var modX
	*/
	var $modx = null;
	/**
	* Add a new recipient email address to one of the valid address type buckets.
	*
	* @param string $type
	* @param string $email
	* @param string $name
	*
	* @return boolean
	*/
	public function address($type, $email, $name=""){}

	/**
	* Attach a file to the attachments queue.
	*
	* @param string $file
	*
	*/
	public function attach($file){}

	/**
	* Clear all existing attachments.
	*/
	public function clearAttachments(){}

	/**
	* Gets a reference to an attribute of the mail object.
	*
	* @param string $key
	*
	* @return mixed
	*/
	public function get($key){}

	/**
	* Gets the default attributes for modMail based on system settings
	*
	* @param array $attributes
	*
	* @return array
	*/
	public function getDefaultAttributes($attributes=array()){}

	/**
	* Adds a header to the mailer
	*
	* @param string $header
	*
	* @return boolean
	*/
	public function header($header){}

	/**
	* Reset the mail service, clearing addresses and attributes.
	*
	* @param array $attributes
	*
	*/
	public function reset($attributes=array()){}

	/**
	* Send an email setting any supplied attributes before sending.
	*
	* @param array $attributes
	*
	* @return boolean
	*/
	public function send($attributes=array()){}

	/**
	* Sets the value of an attribute of the mail object.
	*
	* @param string $key
	* @param mixed $value
	*
	*/
	public function set($key, $value){}

}
class modPHPMailer extends modMail{
	/**
	* Sets email to HTML or text-only.
	*
	* @param boolean $toggle
	*
	*/
	public function setHTML($toggle){}

}
class modJSONRPCResponse extends modXMLRPCResponse{
}
class jsonrpc_client extends xmlrpc_client{
}
class jsonrpcmsg extends xmlrpcmsg{
	var $id = null;
	/**
	*
	* @param string $meth
	* @param array $pars
	* @param mixed $id
	*
	*/
	public function jsonrpcmsg($meth, $pars="0", $id=null){}

}
class jsonrpcresp extends xmlrpcresp{
	var $id = null;
}
class jsonrpcval extends xmlrpcval{
}
class jsonrpc_server extends xmlrpc_server{
}
class modImport{
	/** 
	* @var modX A reference to the modX instance
	*/
	var $modx = null;
	/** 
	* @var array A collection of properties that are being used in this import
	*/
	var $properties = array();
	/** 
	* @var array A collection of results in an array
	*/
	var $results = array();
	/**
	* Gets the buffered content of a file
	*
	* @param string $file
	*
	* @return string
	*/
	public function getFileContent($file){}

	/**
	* Gets the content type of a file
	* @return string
	*/
	public function getFileContentType($extension){}

	/**
	*
	* @param array $filesfound
	* @param string $directory
	* @param array $listing
	* @param int $count
	*
	* @return array
	*/
	public function getFiles($filesfound, $directory, $listing=array(), $count="0"){}

	/**
	* Log a message to the results array
	*
	* @param string $message
	*
	* @return void
	*/
	public function log($message){}

}
class modStaticImport extends modImport{
	/**
	* Calculate a resource alias from the imported file
	*
	* @param \modResource $resource
	* @param string $alias
	* @param integer $parent
	* @param string $context
	*
	* @return string
	*/
	public function getResourceAlias($resource, $alias, $parent, $context="web"){}

	/**
	* Import files into MODX
	*
	* @param array $allowedfiles
	* @param integer $parent
	* @param string $filepath
	* @param array $files
	* @param string $context
	* @param string $class
	* @param string $basefilepath
	*
	*/
	public function importFiles($allowedfiles, $parent, $filepath, $files, $context="web", $class="modStaticResource", $basefilepath=""){}

}
class modHashing{
	/** 
	* A reference to an xPDO instance communicating with this service instance.
	* @var xPDO
	*/
	var $modx = null;
	/** 
	* An array of options for the hashing service.
	* @var array
	*/
	var $options = array();
	/**
	* Get a hash implementation instance.
	*
	* @param string $key
	* @param string $class
	* @param array $options
	*
	* @return \modHash|null
	*/
	public function getHash($key, $class, $options=array()){}

	/**
	* Get an option for the MODX hashing service.
	*
	* @param string $key
	* @param array $options
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getOption($key, $options=null, $default=null){}

}
abstract class modHash{
	/** 
	* A reference to the modHashing service hosting this modHash instance.
	* @var modHashing
	*/
	var $host = null;
	/** 
	* An array of options for the modHash implementation.
	* @var array
	*/
	var $options = array();
	/**
	* Get an option for this modHash implementation
	*
	* @param string $key
	* @param array $options
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getOption($key, $options=null, $default=null){}

	/**
	* Generate a hash of the given string using the provided options.
	*
	* @param string $string
	* @param array $options
	*
	* @return mixed
	*/
	public function hash($string, $options=array()){}

}
class modMD5 extends modHash{
}
class modPBKDF2 extends modHash{
}
class modInputFilter{
	/** 
	* @var modX A reference to the modX instance.
	*/
	var $modx = null;
	/**
	* Filters a modElement before it is processed.
	*/
	public function filter($element){}

	/**
	* Returns a list of filter input commands to be applied through output filtering.
	* @return array|null
	*/
	public function getCommands(){}

	/**
	* Returns a list of filter input modifiers corresponding to the input commands.
	* @return array|null
	*/
	public function getModifiers(){}

	/**
	* Indicates if the element has any input filter commands.
	* @return boolean
	*/
	public function hasCommands(){}

}
class modOutputFilter{
	/** 
	* @var modX A reference to the modX instance
	*/
	var $modx = null;
	/**
	* Filters the output
	*
	* @param \modElement $element
	*
	*/
	public function filter($element){}

	/**
	* Send a log message to the message logger
	*
	* @param string $msg
	*
	* @return void
	*/
	public function log($msg){}

}
class modError{
	/** 
	* @var array The array of errors
	*/
	var $errors = null;
	/** 
	* @var string The error message to output.
	*/
	var $message = null;
	/** 
	* @var modX A reference to the $modx object.
	*/
	var $modx = null;
	/** 
	* @var boolean Indicates failure or success.
	*/
	var $status = false;
	/** 
	* @var integer The total number of errors.
	*/
	var $total = "0";
	/**
	* Add an error to the error queue.
	*
	* @param string $msg
	*
	*/
	public function addError($msg){}

	/**
	* Add a specific field error to the error queue.
	*
	* @param string $name
	* @param string $error
	*
	*/
	public function addField($name, $error){}

	/**
	* Adds an object to the validation queue.
	*
	* @param \xPDOObject $obj
	*
	*/
	public function addObjectToValidate($obj){}

	/**
	* Checks validation, and if any errors are found, returns them. Error handlers that derive from this can determine their own behaviour should errors be found.
	*
	* @param \xPDOObject $objs
	*
	* @return string
	*/
	public function checkValidation($objs=array()){}

	/**
	* Send a failure error message.
	*
	* @param string $message
	* @param object $object
	*
	* @return string|array
	*/
	public function failure($message="", $object=null){}

	/**
	* Return all of the errors in the error queue.
	*
	* @param boolean $includeFields
	*
	* @return array
	*/
	public function getErrors($includeFields=false){}

	/**
	* Return the fields added as errors.
	* @return array
	*/
	public function getFields(){}

	/**
	* Check to see if there is any errors on the queue.
	* @return boolean
	*/
	public function hasError(){}

	/**
	* Returns true if the error passed to it represents a field error.
	*
	* @param mixed $error
	*
	* @return boolean
	*/
	public function isFieldError($error){}

	/**
	* Returns true if the error passed to it does not represent a field error.
	*
	* @param mixed $error
	*
	* @return boolean
	*/
	public function isNotFieldError($error){}

	/**
	* Process errors and return a proper output value.
	*
	* @param string $message
	* @param boolean $status
	* @param object $object
	*
	* @return string|object|array
	*/
	public function process($message="", $status=false, $object=null){}

	/**
	* Resets the error messages.
	*/
	public function reset(){}

	/**
	* Send a success error message.
	*
	* @param string $message
	* @param object $object
	*
	* @return string|array
	*/
	public function success($message="", $object=null){}

	/**
	* Converts an object or objects embedded in an array, to arrays.
	*
	* @param array $object
	*
	* @return array
	*/
	public function toArray($object){}

}
class modErrorHandler{
	/** 
	* @var modX A reference to the modX instance.
	*/
	var $modx = null;
	/** 
	* @var array A stack of errors.
	*/
	var $stack = null;
	/**
	* Handles any recoverable PHP errors or calls to trigger_error().
	*
	* @param integer $errno
	* @param string $errstr
	* @param string $errfile
	* @param integer $errline
	* @param array $errcontext
	*
	* @return boolean
	*/
	public function handleError($errno, $errstr, $errfile=null, $errline=null, $errcontext=null){}

	/**
	* Converts an error to a readable string.
	*
	* @param mixed $error
	*
	* @return string
	*/
	public function toString($error){}

}
class modCacheManager extends xPDOCacheManager{
	/** 
	* @var modX A reference to the modX instance
	*/
	var $modx = null;
	/**
	* Check for and process Resources with pub_date or unpub_date set to now or in past.
	*
	* @param array $options
	*
	* @return array
	*/
	public function autoPublish($options=array()){}

	/**
	* Clear part or all of the MODX cache.
	*
	* @param array $paths
	* @param array $options
	*
	* @return array
	*/
	public function clearCache($paths=array(), $options=array()){}

	/**
	* Generates a cache file for the manager actions.
	*
	* @param string $cacheKey
	* @param array $options
	*
	* @return array
	*/
	public function generateActionMap($cacheKey, $options=array()){}

	/**
	* Generates the system settings cache for a MODX site.
	*
	* @param array $options
	*
	* @return array
	*/
	public function generateConfig($options=array()){}

	/**
	* Generates a cache entry for a MODX site Context.
	*
	* @param string $key
	* @param array $options
	*
	* @return array
	*/
	public function generateContext($key, $options=array()){}

	/**
	* Generates a lexicon topic cache file from a collection of entries
	*
	* @param string $cacheKey
	* @param array $entries
	* @param array $options
	*
	* @return array
	*/
	public function generateLexiconTopic($cacheKey, $entries=array(), $options=array()){}

	/**
	* Generates a cache entry for a Resource or Resource-derived object.
	*
	* @param \modResource $obj
	* @param array $options
	*
	* @return array
	*/
	public function generateResource($obj, $options=array()){}

	/**
	* Generates a file representing an executable modScript function.
	*
	* @param \modScript $objElement
	* @param string $objContent
	* @param array $options
	*
	* @return boolean|string
	*/
	public function generateScript($objElement, $objContent=null, $options=array()){}

	/**
	*
	* @param modElement $element
	*
	*/
	public function getElementMediaSourceCache($element, $contextKey, $options=array()){}

}
class modRequest{
	/** 
	* The HTTP headers sent in the request
	* @var array $headers
	*/
	var $headers = null;
	/** 
	* The current request method
	* @var string $method
	*/
	var $method = null;
	/** 
	* A reference to the modX object
	* @var modX $modx
	*/
	var $modx = null;
	/** 
	* The parameters sent in the request
	* @var array $parameters
	*/
	var $parameters = null;
	/**
	* Cleans the resource identifier from the request params.
	*
	* @param string $identifier
	*
	* @return string|integer
	*/
	public function _cleanResourceIdentifier($identifier){}

	/**
	* Checks the current status of timed publishing events.
	*/
	public function checkPublishStatus(){}

	/**
	* Get the IDs for a collection of string action keys
	*
	* @param array $actions
	* @param string $namespace
	*
	* @return array
	*/
	public function getActionIDs($actions=array(), $namespace="core"){}

	/**
	* Get a list of all modAction IDs
	*
	* @param string $namespace
	*
	* @return array
	*/
	public function getAllActionIDs($namespace=""){}

	/**
	* Get the true client IP. Returns an array of values:
	* @return array
	*/
	public function getClientIp(){}

	/**
	* Return the HTTP headers sent through the request
	*
	* @param boolean $ucKeys
	*
	* @return array
	*/
	public function getHeaders($ucKeys=false){}

	/**
	* Get a GPC/REQUEST variable value or an array of values from the request.
	*
	* @param string $keys
	* @param string $type
	*
	* @return mixed
	*/
	public function getParameters($keys=array(), $type="GET"){}

	/**
	* Gets a requested resource and all required data.
	*
	* @param string $method
	* @param string $identifier
	* @param array $options
	*
	* @return \modResource
	*/
	public function getResource($method, $identifier, $options=array()){}

	/**
	* Gets the idetifier used to request a resource.
	*
	* @param string $method
	*
	* @return string
	*/
	public function getResourceIdentifier($method){}

	/**
	* Gets the method used to request a resource.
	* @return string
	*/
	public function getResourceMethod(){}

	/**
	* The primary MODX request handler (a.k.a. controller).
	* @return boolean
	*/
	public function handleRequest(){}

	/**
	* Loads the error handling class for the request.
	*
	* @param string $class
	*
	*/
	public function loadErrorHandler($class="modError"){}

	/**
	* Prepares the MODX response to a web request that is being handled.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function prepareResponse($options=array()){}

	/**
	* Preserves the $_REQUEST superglobal to the $_SESSION.
	*
	* @param string $key
	*
	*/
	public function preserveRequest($key="referrer"){}

	/**
	* Provides an easy way to initiate register logging.
	*
	* @param array $options
	*
	*/
	public function registerLogging($options=array()){}

	/**
	* Retrieve a preserved $_REQUEST from $_SESSION.
	*
	* @param string $key
	*
	* @return string
	*/
	public function retrieveRequest($key="referrer"){}

	/**
	* Harden GPC variables by removing any MODX tags, Javascript, or entities.
	*/
	public function sanitizeRequest(){}

}
class modManagerRequest extends modRequest{
	/** 
	* @var string The action to load.
	*/
	var $action = null;
	/** 
	* @var string The REQUEST parameter to load actions by.
	*/
	var $actionVar = "a";
	/** 
	* @var mixed The default action to load from.
	*/
	var $defaultAction = "0";
	/** 
	* @var modError The error handler for the request.
	*/
	var $error = null;
	/**
	* Initializes the manager request.
	* @return boolean
	*/
	public function initialize(){}

	/**
	* Loads the actionMap, and generates a cache file if necessary.
	* @return boolean
	*/
	public function loadActionMap(){}

}
class modConnectorRequest extends modManagerRequest{
	/** 
	* The base subdirectory location of the requested action.
	* @var string
	*/
	var $location = null;
	/**
	* Sets the directory to load the processors from
	*
	* @param string $dir
	*
	*/
	public function setDirectory($dir=""){}

}
class modConnectorResponse extends modResponse{
	var $responseCode = "200";
	/**
	* Return arrays of objects (with count) converted to JSON.
	*
	* @param array $array
	* @param mixed $count
	*
	* @return string
	*/
	public function outputArray($array, $count=false){}

	/**
	* Set the physical location of the processor directory for the response handler.
	*
	* @param string $dir
	*
	*/
	public function setDirectory($dir=""){}

	/**
	* Converts PHP to JSON with JavaScript literals left in-tact.
	*
	* @param mixed $data
	*
	* @return string
	*/
	public function toJSON($data){}

}
class modFileHandler{
	/** 
	* An array of configuration properties for the class
	* @var array $config
	*/
	var $config = array();
	/** 
	* The current context in which this File Manager instance should operate
	* @var modContext|null $context
	*/
	var $context = null;
	/**
	* Get the modX base path for the user.
	* @return string
	*/
	public function getBasePath(){}

	/**
	* Get base URL of file manager
	* @return string
	*/
	public function getBaseUrl(){}

	/**
	* Gets the directory path for a given file
	*
	* @param string $fileName
	*
	* @return string
	*/
	public function getDirectoryFromFile($fileName){}

	/**
	* Tells if a file is a binary file or not.
	*
	* @param string $file
	*
	* @return boolean
	*/
	public function isBinary($file){}

	/**
	* Dynamically creates a modDirectory or modFile object.
	*
	* @param string $path
	* @param array $options
	* @param string $overrideClass
	*
	* @return mixed
	*/
	public function make($path, $options=array(), $overrideClass=""){}

	/**
	* Ensures that the passed path has a / at the end
	*
	* @param string $path
	*
	* @return string
	*/
	public function postfixSlash($path){}

	/**
	* Sanitize the specified path
	*
	* @param string $path
	*
	* @return string
	*/
	public function sanitizePath($path){}

}
abstract class modFileSystemResource{
	/** 
	* @var modFileHandler A reference to a modFileHandler instance
	*/
	var $fileHandler = null;
	/** 
	* @var array An array of file system resource specific options
	*/
	var $options = array();
	/**
	* Sets the group permission for the fs resource
	*
	* @param mixed $grp
	*
	* @return boolean
	*/
	public function chgrp($grp){}

	/**
	* Chmods the resource to the specified mode.
	*
	* @param \octal $mode
	*
	* @return boolean
	*/
	public function chmod($mode){}

	/**
	* Sets the owner for the fs resource
	*
	* @param mixed $owner
	*
	* @return boolean
	*/
	public function chown($owner){}

	/**
	* Check to see if the fs resource exists
	* @return boolean
	*/
	public function exists(){}

	/**
	* Gets the permission group for the fs resource
	* @return string
	*/
	public function getGroup(){}

	/**
	* Gets the parent containing directory of this fs resource
	*
	* @param boolean $raw
	*
	* @return \modDirectory|string
	*/
	public function getParentDirectory($raw=false){}

	/**
	* Get the path of the fs resource.
	* @return string
	*/
	public function getPath(){}

	/**
	* Check to see if fs resource is symlink
	* @return boolean
	*/
	public function isLink(){}

	/**
	* Check to see if the fs resource is readable
	* @return boolean
	*/
	public function isReadable(){}

	/**
	* Check to see if the fs resource is writable
	* @return boolean
	*/
	public function isWritable(){}

	/**
	* Renames the file/folder
	*
	* @param string $newPath
	*
	* @return boolean
	*/
	public function rename($newPath){}

	/**
	* Alias for chgrp
	*
	* @param string $grp
	*
	* @return boolean
	*/
	public function setGroup($grp){}

}
class modFile extends modFileSystemResource{
	/**
	* Actually create the file on the file system
	*
	* @param string $content
	* @param string $mode
	*
	* @return boolean
	*/
	public function create($content="", $mode="w+"){}

	/**
	* Gets the basename, or only the filename without the path, of the file
	* @return string
	*/
	public function getBaseName(){}

	/**
	* Get the contents of the file
	* @return string
	*/
	public function getContents(){}

	/**
	* Gets the file extension of the file
	* @return string
	*/
	public function getExtension(){}

	/**
	* Gets the last accessed time of the file
	*
	* @param string $timeFormat
	*
	* @return string
	*/
	public function getLastAccessed($timeFormat="%b %d, %Y %I:%M:%S %p"){}

	/**
	* Gets the last modified time of the file
	*
	* @param string $timeFormat
	*
	* @return string
	*/
	public function getLastModified($timeFormat="%b %d, %Y %I:%M:%S %p"){}

	/**
	* Gets the size of the file
	* @return int
	*/
	public function getSize(){}

	/**
	* Deletes the file from the filesystem
	* @return boolean
	*/
	public function remove(){}

	/**
	* Writes the content of the modFile object to the actual file.
	*
	* @param string $content
	* @param string $mode
	*
	* @return boolean
	*/
	public function save($content=null, $mode="w+"){}

	/**
	* Temporarly set (but not save) the content of the file
	*
	* @param string $content
	*
	*/
	public function setContent($content){}

	/**
	* Alias for save()
	*
	* @param string $content
	* @param string $mode
	*
	* @return boolean
	*/
	public function write($content=null, $mode="w+"){}

}
class modDirectory extends modFileSystemResource{
	/**
	* Actually creates the new directory on the file system.
	*
	* @param string $mode
	*
	* @return boolean
	*/
	public function create($mode=""){}

	/**
	* Removes the directory from the file system, recursively removing subdirectories and files.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function remove($options=array()){}

}
class modLexicon{
	/** 
	* Reference to the MODX instance.
	* @var modX $modx
	*/
	var $modx = null;
	/**
	* Completely clears the lexicon
	*
	* @param string $language
	*
	* @return void
	*/
	public function clear($language=""){}

	/**
	* Clears the lexicon cache for the specified path.
	*
	* @param string $path
	*
	* @return string
	*/
	public function clearCache($path=""){}

	/**
	* Returns if the key exists in the lexicon.
	*
	* @param string $index
	*
	* @return boolean
	*/
	public function exists($index, $language=""){}

	/**
	* Accessor method for the lexicon array.
	*
	* @param string $prefix
	* @param boolean $removePrefix
	* @param string $language
	*
	* @return array
	*/
	public function fetch($prefix="", $removePrefix=false, $language=""){}

	/**
	* Return the cache key representing the specified lexicon topic.
	*
	* @param string $namespace
	* @param string $topic
	* @param string $language
	*
	* @return string
	*/
	public function getCacheKey($namespace="core", $topic="default", $language=""){}

	/**
	* Get entries from file-based lexicon topic
	*
	* @param string $language
	* @param string $namespace
	* @param string $topic
	*
	* @return array
	*/
	public function getFileTopic($language="en", $namespace="core", $topic="default"){}

	/**
	* Get a list of available languages for a Namespace.
	*
	* @param string $namespace
	*
	* @return array
	*/
	public function getLanguageList($namespace="core"){}

	/**
	* Get the path of the specified Namespace
	*
	* @param string $namespace
	*
	* @return string
	*/
	public function getNamespacePath($namespace="core"){}

	/**
	* Get a list of available Topics when given a Language and Namespace.
	*
	* @param string $language
	* @param string $namespace
	*
	* @return array
	*/
	public function getTopicList($language="en", $namespace="core"){}

	/**
	* Loads a variable number of topic areas. They must reside as topicname.
	*/
	public function load(){}

	/**
	* Loads a lexicon topic from the cache. If not found, tries to generate a cache file from the database.
	*
	* @param string $namespace
	* @param string $topic
	* @param string $language
	*
	* @return array
	*/
	public function loadCache($namespace="core", $topic="default", $language=""){}

	/**
	* Get a lexicon string by its index.
	*
	* @param string $key
	* @param array $params
	* @param string $language
	*
	* @return string
	*/
	public function process($key, $params=array(), $language=""){}

	/**
	* Sets a lexicon key to a value. Not recommended, since doesn't query the database.
	*
	* @param string $keys
	* @param string $text
	* @param string $language
	*
	*/
	public function set($keys, $text="", $language=""){}

	/**
	* Returns the total # of entries in the active lexicon
	*
	* @param string $language
	*
	* @return int
	*/
	public function total($language=""){}

}
class modManagerControllerDeprecated extends modManagerController{
	var $body = "";
	/**
	* Adds a lexicon topic to this page's language topics to load. Will load the topic as well.
	*
	* @param string $topic
	*
	* @return boolean
	*/
	public function addLangTopic($topic){}

	/**
	* Adds a lexicon topic to this page's language topics to load
	* @return boolean
	*/
	public function getLangTopics(){}

	/**
	* Sets the language topics for this page
	*
	* @param array $topics
	*
	* @return boolean
	*/
	public function setLangTopics($topics=array()){}

}
class modManagerResponse extends modResponse{
	/** 
	* @var array A cached array of the current modAction object
	*/
	var $action = array();
	/**
	* Adds a lexicon topic to this page's language topics to load. Will load the topic as well.
	*
	* @param string $topic
	*
	* @return boolean
	*/
	public function addLangTopic($topic){}

	/**
	* If this action has a menu item, ensure user has access to menu
	*
	* @param string $action
	*
	* @return bool
	*/
	public function checkForMenuPermissions($action){}

	/**
	* Gets the controller class name from the active modAction object
	* @return string
	*/
	public function getControllerClassName(){}

	/**
	* Adds a lexicon topic to this page's language topics to load
	* @return boolean
	*/
	public function getLangTopics(){}

	/**
	* Get the appropriate path to the controllers directory for the active Namespace.
	*
	* @param string $theme
	*
	* @return array
	*/
	public function getNamespacePath($theme="default"){}

	/**
	* Sets the language topics for this page
	*
	* @param array $topics
	*
	* @return boolean
	*/
	public function setLangTopics($topics=array()){}

}
class modParser{
	/** 
	* A reference to the modX instance
	* @var modX $modx
	*/
	var $modx = null;
	/**
	* Collects element tags in a string and injects them into an array.
	*
	* @param string $origContent
	* @param string $prefix
	* @param string $suffix
	*
	* @return integer
	*/
	public function collectElementTags($origContent, $matches, $prefix="[[", $suffix="]]"){}

	/**
	* Get a modElement instance taking advantage of the modX::$sourceCache.
	*
	* @param string $class
	* @param string $name
	*
	* @return \modElement|null
	*/
	public function getElement($class, $name){}

	/**
	* Returns true if the parser is currently processing an element
	* @return bool
	*/
	public function isProcessingElement(){}

	/**
	* Returns true if the parser is currently processing a tag
	* @return bool
	*/
	public function isProcessingTag(){}

	/**
	* Returns true if the parser is currently processing an uncacheable tag
	* @return bool
	*/
	public function isProcessingUncacheable(){}

	/**
	* Returns true if the parser is currently removing any unprocessed tags
	* @return bool
	*/
	public function isRemovingUnprocessed(){}

	/**
	* Loads output cached by complete tag signature from the elementCache.
	*
	* @param string $tag
	*
	* @return string
	*/
	public function loadFromCache($tag){}

	/**
	* Merges processed tag output into provided content string.
	*
	* @param array $tagMap
	* @param string $content
	*
	*/
	public function mergeTagOutput($tagMap, $content){}

	/**
	* Parses an element/tag property string or array definition.
	*
	* @param string $propSource
	*
	* @return array
	*/
	public function parseProperties($propSource){}

	/**
	* Parses an element/tag property string and returns an array of properties.
	*
	* @param string $string
	* @param boolean $valuesOnly
	*
	* @return array
	*/
	public function parsePropertyString($string, $valuesOnly=false){}

	/**
	* Collects and processes any set of tags as defined by a prefix and suffix.
	*
	* @param string $parentTag
	* @param string $content
	* @param boolean $processUncacheable
	* @param boolean $removeUnprocessed
	* @param string $prefix
	* @param string $suffix
	* @param array $tokens
	* @param integer $depth
	*
	* @return int
	*/
	public function processElementTags($parentTag, $content, $processUncacheable=false, $removeUnprocessed=false, $prefix="[[", $suffix="]]", $tokens=array(), $depth="0"){}

	/**
	* Processes a modElement tag and returns the result.
	*
	* @param string $tag
	* @param boolean $processUncacheable
	*
	* @return mixed
	*/
	public function processTag($tag, $processUncacheable=true){}

	/**
	* Gets the real name of an element containing filter modifiers.
	*
	* @param string $unfiltered
	*
	* @return string
	*/
	public function realname($unfiltered){}

	public function setProcessingElement($arg=null){}

}
abstract class modTag{
	/** 
	* Whether or not this tag is marked as cacheable
	* @var boolean $_cacheable
	*/
	var $_cacheable = true;
	/** 
	* The content of the tag
	* @var string $_content
	*/
	var $_content = null;
	/** 
	* Fields on the tag
	* @var array $_fields
	*/
	var $_fields = array();
	/** 
	* Any output/input filters on this tag
	* @var array $_filters
	*/
	var $_filters = array();
	/** 
	* The processed output of the tag
	* @var string $_output
	*/
	var $_output = "";
	/** 
	* Whether or not the tag has been processed
	* @var boolean $_processed
	*/
	var $_processed = false;
	/** 
	* The arranged properties array for this tag
	* @var array $_properties
	*/
	var $_properties = array();
	/** 
	* Just the isolated properties part of the tag string
	* @var string $_propertyString
	*/
	var $_propertyString = "";
	/** 
	* The result of processing the tag
	* @var bool $_result
	*/
	var $_result = true;
	/** 
	* The tag string
	* @var string $_tag
	*/
	var $_tag = "";
	/** 
	* The tag initial token ($,%,*,etc)
	* @var string $_token
	*/
	var $_token = "";
	/** 
	* A reference to the modX instance
	* @var modX $modx
	*/
	var $modx = null;
	/** 
	* The name of the tag
	* @var string $name
	*/
	var $name = null;
	/** 
	* The properties on the tag
	* @var array $properties
	*/
	var $properties = null;
	/**
	* Cache the element into the elementCache by tag signature.
	*/
	public function cache(){}

	/**
	* Apply an input filter to a tag.
	*/
	public function filterInput(){}

	/**
	* Apply an output filter to a tag.
	*/
	public function filterOutput(){}

	/**
	* Generic getter method for modTag attributes.
	*
	* @param string $k
	*
	* @return mixed
	*/
	public function get($k){}

	/**
	* Get the raw source content of the tag element.
	*
	* @param array $options
	*
	* @return string
	*/
	public function getContent($options=array()){}

	/**
	* Get an input filter instance configured for this Element.
	* @return \modInputFilter|null
	*/
	public function getInputFilter(){}

	/**
	* Get an output filter instance configured for this Element.
	* @return \modOutputFilter|null
	*/
	public function getOutputFilter(){}

	/**
	* Get the properties for this element instance for processing.
	*
	* @param array $properties
	*
	* @return array
	*/
	public function getProperties($properties=null){}

	/**
	* Gets a named property set to use with this modTag instance.
	*
	* @param string $setName
	*
	* @return array|null
	*/
	public function getPropertySet($setName=null){}

	/**
	* Gets a tag representation of the modTag instance.
	* @return string
	*/
	public function getTag(){}

	/**
	* Returns the current token for the tag
	* @return string
	*/
	public function getToken(){}

	/**
	* Indicates if the element is cacheable.
	* @return boolean
	*/
	public function isCacheable(){}

	/**
	* Process the tag and return the result.
	*
	* @param array $properties
	* @param string $content
	*
	* @return mixed
	*/
	public function process($properties=null, $content=null){}

	/**
	* Generic setter method for modTag attributes.
	*
	* @param string $k
	* @param mixed $v
	*
	*/
	public function set($k, $v){}

	/**
	* Sets the runtime cacheability of the element.
	*
	* @param boolean $cacheable
	*
	*/
	public function setCacheable($cacheable=true){}

	/**
	* Set the raw source content for the tag element.
	*
	* @param string $content
	* @param array $options
	*
	* @return boolean
	*/
	public function setContent($content, $options=array()){}

	/**
	* Set default properties for this element instance.
	*
	* @param array $properties
	* @param boolean $merge
	*
	* @return boolean
	*/
	public function setProperties($properties, $merge=false){}

	/**
	* Setter method for the tag class var.
	*
	* @param string $tag
	*
	*/
	public function setTag($tag){}

	/**
	* Setter method for the token class var.
	*
	* @param string $token
	*
	*/
	public function setToken($token){}

}
class modFieldTag extends modTag{
}
class modPlaceholderTag extends modTag{
}
class modLinkTag extends modTag{
}
class modLexiconTag extends modTag{
}
class modParser095 extends modParser{
	/** 
	* An array of translation strings from migrating from Evolution
	* @var array $tagTranslation
	*/
	var $tagTranslation = array();
	/**
	* Collects MODX legacy tags and translates them to the new tag format.
	*
	* @param array $tokens
	* @param boolean $echo
	*
	* @return void
	*/
	public function translate($content, $tokens=array(), $echo=false){}

}
class modSessionHandler{
	/** 
	* @var int The maximum lifetime of the cache of the session
	*/
	var $cacheLifetime = false;
	/** 
	* @var int The maximum lifetime of the session
	*/
	var $gcMaxLifetime = "0";
	/** 
	* @var modX A reference to the modX instance controlling this session
handler.
	*/
	var $modx = null;
	/**
	* Closes the connection for the session handler.
	* @return boolean
	*/
	public function close(){}

	/**
	* Destroy a specific {@link modSession} record.
	*
	* @param integer $id
	*
	* @return boolean
	*/
	public function destroy($id){}

	/**
	* Remove any expired sessions.
	*
	* @param integer $max
	*
	* @return boolean
	*/
	public function gc($max){}

	/**
	* Opens the connection for the session handler.
	* @return boolean
	*/
	public function open(){}

	/**
	* Reads a specific {@link modSession} record's data.
	*
	* @param integer $id
	*
	* @return string
	*/
	public function read($id){}

	/**
	* Writes data to a specific {@link modSession} object.
	*
	* @param integer $id
	* @param mixed $data
	*
	* @return boolean
	*/
	public function write($id, $data){}

}
class modX extends xPDO{
	/** 
	* @var modSystemEvent $Event
	*/
	var $Event = null;
	/** 
	* @var array A config array that stores the system-wide settings.
	*/
	var $_systemConfig = array();
	/** 
	* @var array A config array that stores the user settings.
	*/
	var $_userConfig = array();
	/** 
	* @var array A map of actions registered to the manager interface.
	*/
	var $actionMap = null;
	/** 
	* @var array A lookup listing of Resource alias values and associated
Resource Ids
	*/
	var $aliasMap = null;
	/** 
	* @var array Represents the modContentType instances that can be delivered
by this modX deployment.
	*/
	var $contentTypes = null;
	/** 
	* @var modContext The Context represents a unique section of the site which
this modX instance is controlling.
	*/
	var $context = null;
	/** 
	* @var array An array of secondary contexts loaded on demand.
	*/
	var $contexts = array();
	/** 
	* @var modManagerController A controller object that represents a page in the manager
	*/
	var $controller = null;
	/** 
	* @var string The preferred Culture key for the current request.
	*/
	var $cultureKey = "";
	/** 
	* @var string $documentOutput
	*/
	var $documentOutput = null;
	/** 
	* @var array A map of already processed Elements.
	*/
	var $elementCache = array();
	/** 
	* @var modError An error response class for the request
	*/
	var $error = null;
	/** 
	* @var modErrorHandler|object An error_handler for the modX instance.
	*/
	var $errorHandler = null;
	/** 
	* @var modSystemEvent The current event being handled by modX.
	*/
	var $event = null;
	/** 
	* @var array A map of elements registered to specific events.
	*/
	var $eventMap = null;
	/** 
	* @var array An array of javascript content to be inserted into the BODY
of an HTML resource.
	*/
	var $jscripts = array();
	/** 
	* @var modLexicon Represents a localized dictionary of common words and phrases.
	*/
	var $lexicon = null;
	/** 
	* @var array An array of already loaded javascript/css code
	*/
	var $loadedjscripts = array();
	/** 
	* @var modMail $mail
	*/
	var $mail = null;
	/** 
	* @var modParser The modParser registered for this modX instance,
responsible for content tag parsing, and loaded only on demand.
	*/
	var $parser = null;
	/** 
	* @var array An array of key=> value pairs that can be used by any Resource
or Element.
	*/
	var $placeholders = array();
	/** 
	* @var array An array of plugins that have been cached for execution
	*/
	var $pluginCache = array();
	/** 
	* @var array $processors An array of loaded processors and their class name
	*/
	var $processors = array();
	/** 
	* @var modRegistry $registry
	*/
	var $registry = null;
	/** 
	* @var modRequest Represents a web request and provides helper methods for
dealing with request parameters and other attributes of a request.
	*/
	var $request = null;
	/** 
	* @var modResource An instance of the current modResource controlling the
request.
	*/
	var $resource = null;
	/** 
	* @var boolean Indicates if the resource was generated during this request.
	*/
	var $resourceGenerated = false;
	/** 
	* @var mixed The resource id or alias being requested.
	*/
	var $resourceIdentifier = null;
	/** 
	* @var array A listing of site Resources and Context-specific meta data.
	*/
	var $resourceListing = null;
	/** 
	* @var array A hierarchy map of Resources.
	*/
	var $resourceMap = null;
	/** 
	* @var string The method to use to locate the Resource, 'id' or 'alias'.
	*/
	var $resourceMethod = null;
	/** 
	* @var modResponse Represents a web response, providing helper methods for
managing response header attributes and the body containing the content of
the response.
	*/
	var $response = null;
	/** 
	* @var modRestClient $rest
	*/
	var $rest = null;
	/** 
	* @var array An array of regex patterns regulary cleansed from content.
	*/
	var $sanitizePatterns = array();
	/** 
	* @var array An array of javascript content to be inserted into the HEAD
of an HTML resource.
	*/
	var $sjscripts = array();
	/** 
	* @var array The elemnt source cache used for caching and preparing Element data
	*/
	var $sourceCache = array();
	/** 
	* @var modUser The current user object, if one is authenticated for the
current request and context.
	*/
	var $user = null;
	/** 
	* @var array Version information for this MODX deployment.
	*/
	var $version = null;
	/** 
	* @var string Stores the virtual path for a request to MODX if the
friendly_alias_paths option is enabled.
	*/
	var $virtualDir = null;
	/**
	* Executed after the response is sent and execution is completed.
	*/
	public function _postProcess(){}

	/**
	* Add a plugin to the eventMap within the current execution cycle.
	*
	* @param string $event
	* @param integer $pluginId
	*
	* @return boolean
	*/
	public function addEventListener($event, $pluginId){}

	/**
	* Add an extension package to MODX
	*
	* @param string $name
	* @param string $path
	* @param array $options
	*
	* @return boolean
	*/
	public function addExtensionPackage($name, $path, $options=array()){}

	/**
	* Executed before parser processing of an element.
	*/
	public function beforeProcessing(){}

	/**
	* Executed before the response is rendered.
	*/
	public function beforeRender(){}

	/**
	* Executed before the handleRequest function.
	*/
	public function beforeRequest(){}

	/**
	* Checks for locking on a page.
	*
	* @param integer $id
	* @param string $action
	* @param string $type
	*
	* @return string|boolean
	*/
	public function checkForLocks($id, $action, $type){}

	/**
	* Checks to see if the user has a session in the specified context.
	*
	* @param string $sessionContext
	*
	* @return boolean
	*/
	public function checkSession($sessionContext="web"){}

	/**
	* Determines the current site_status.
	* @return boolean
	*/
	public function checkSiteStatus(){}

	public function findResource($uri, $context=""){}

	/**
	* Gets the user authenticated in the specified context.
	*
	* @param string $contextKey
	*
	* @return \modUser|null
	*/
	public function getAuthenticatedUser($contextKey=""){}

	/**
	* Gets all of the child resource ids for a given resource.
	*
	* @param integer $id
	* @param integer $depth
	* @param array $options
	*
	* @return array
	*/
	public function getChildIds($id=null, $depth="10", $options=array()){}

	/**
	* Process and return the output from a Chunk by name.
	*
	* @param string $chunkName
	* @param array $properties
	*
	* @return string
	*/
	public function getChunk($chunkName, $properties=array()){}

	/**
	* Get the configuration for the site.
	* @return array
	*/
	public function getConfig(){}

	/**
	* Retrieve a context by name without initializing it.
	*
	* @param string $contextKey
	*
	* @return \modContext
	*/
	public function getContext($contextKey){}

	/**
	* Gets a map of events and registered plugins for the specified context.
	*
	* @param string $contextKey
	*
	* @return array
	*/
	public function getEventMap($contextKey){}

	/**
	* Returns the current user ID, for the current or specified context.
	*
	* @param string $context
	*
	* @return integer
	*/
	public function getLoginUserID($context=""){}

	/**
	* Returns the current user name, for the current or specified context.
	*
	* @param string $context
	*
	* @return string
	*/
	public function getLoginUserName($context=""){}

	/**
	* Gets all of the parent resource ids for a given resource.
	*
	* @param integer $id
	* @param integer $height
	* @param array $options
	*
	* @return array
	*/
	public function getParentIds($id=null, $height="10", $options=array()){}

	/**
	* Gets the MODX parser.
	* @return \modParser
	*/
	public function getParser(){}

	/**
	* Get a placeholder value by key.
	*
	* @param string $key
	*
	* @return mixed
	*/
	public function getPlaceholder($key){}

	/**
	* Returns all registered JavaScripts.
	* @return string
	*/
	public function getRegisteredClientScripts(){}

	/**
	* Returns all registered startup CSS, JavaScript, or HTML blocks.
	* @return string
	*/
	public function getRegisteredClientStartupScripts(){}

	/**
	* Attempt to load the request handler class, if not already loaded.
	*
	* @param string $class
	* @param string $path
	*
	* @return boolean
	*/
	public function getRequest($class="modRequest", $path=""){}

	/**
	* Attempt to load the response handler class, if not already loaded.
	*
	* @param string $class
	* @param string $path
	*
	* @return boolean
	*/
	public function getResponse($class="modResponse", $path=""){}

	/**
	* Returns the state of the SESSION being used by modX.
	* @return integer
	*/
	public function getSessionState(){}

	/**
	* Get a site tree from a single or multiple modResource instances.
	*
	* @param int $id
	* @param int $depth
	*
	* @return array
	*/
	public function getTree($id=null, $depth="10"){}

	/**
	* Get the current authenticated User and assigns it to the modX instance.
	*
	* @param string $contextKey
	* @param boolean $forceLoadSettings
	*
	* @return \modUser
	*/
	public function getUser($contextKey="", $forceLoadSettings=false){}

	/**
	* Gets the modX core version data.
	* @return array
	*/
	public function getVersionData(){}

	/**
	* Initialize, cleanse, and process a request made to a modX site.
	* @return mixed
	*/
	public function handleRequest(){}

	/**
	* Returns true if user has the specified policy permission.
	*
	* @param string $pm
	*
	* @return boolean
	*/
	public function hasPermission($pm){}

	/**
	* Initializes the modX engine.
	*
	* @param string $contextKey
	* @param array $options
	*
	* @return bool
	*/
	public function initialize($contextKey="web", $options=null){}

	/**
	* Invokes a specified Event with an optional array of parameters.
	*
	* @param string $eventName
	* @param array $params
	*
	* @return boolean
	*/
	public function invokeEvent($eventName, $params=array()){}

	/**
	* Returns whether modX instance has been initialized or not.
	* @return boolean
	*/
	public function isInitialized(){}

	/**
	* Grabs a processed lexicon string.
	*
	* @param string $key
	* @param array $params
	* @param string $language
	*
	* @return null|string
	*/
	public function lexicon($key, $params=array(), $language=""){}

	/**
	* Logs a manager action.
	*
	* @param string $action
	* @param string $class_key
	* @param mixed $item
	*
	* @return \modManagerLog
	*/
	public function logManagerAction($action, $class_key, $item){}

	/**
	* Generates a URL representing a specified resource.
	*
	* @param integer $id
	* @param string $context
	* @param string $args
	* @param mixed $scheme
	* @param array $options
	*
	* @return string
	*/
	public function makeUrl($id, $context="", $args="", $scheme="-1", $options=array()){}

	/**
	* Legacy fatal error message.
	*
	* @param string $msg
	* @param string $query
	* @param bool $is_error
	* @param string $nr
	* @param string $file
	* @param string $source
	* @param string $text
	* @param string $line
	*
	*/
	public function messageQuit($msg="unspecified error", $query="", $is_error=true, $nr="", $file="", $source="", $text="", $line=""){}

	/**
	* Parse a chunk using an associative array of replacement variables.
	*
	* @param string $chunkName
	* @param array $chunkArr
	* @param string $prefix
	* @param string $suffix
	*
	* @return string
	*/
	public function parseChunk($chunkName, $chunkArr, $prefix="[[+", $suffix="]]"){}

	/**
	* Harden the environment against common security flaws.
	*/
	public function protect(){}

	/**
	* Register CSS to be injected inside the HEAD tag of a resource.
	*
	* @param string $src
	*
	* @return void
	*/
	public function regClientCSS($src){}

	/**
	* Register HTML to be injected before the closing BODY tag.
	*
	* @param string $html
	*
	*/
	public function regClientHTMLBlock($html){}

	/**
	* Register JavaScript to be injected before the closing BODY tag.
	*
	* @param string $src
	* @param boolean $plaintext
	*
	* @return void
	*/
	public function regClientScript($src, $plaintext=false){}

	/**
	* Register HTML to be injected before the closing HEAD tag.
	*
	* @param string $html
	*
	*/
	public function regClientStartupHTMLBlock($html){}

	/**
	* Register JavaScript to be injected inside the HEAD tag of a resource.
	*
	* @param string $src
	* @param boolean $plaintext
	*
	* @return void
	*/
	public function regClientStartupScript($src, $plaintext=false){}

	/**
	* Reload the config settings.
	* @return array
	*/
	public function reloadConfig(){}

	/**
	* Reload data for a specified Context, without switching to it.
	*
	* @param string $key
	*
	* @return boolean
	*/
	public function reloadContext($key=null){}

	/**
	* Remove all registered events for the current request.
	*/
	public function removeAllEventListener(){}

	/**
	* Remove an event from the eventMap so it will not be invoked.
	*
	* @param string $event
	*
	* @return boolean
	*/
	public function removeEventListener($event){}

	/**
	* Remove an extension package from MODX
	*
	* @param string $name
	*
	* @return boolean
	*/
	public function removeExtensionPackage($name){}

	/**
	* Loads and runs a specific processor.
	*
	* @param string $action
	* @param array $scriptProperties
	* @param array $options
	*
	* @return mixed
	*/
	public function runProcessor($action="", $scriptProperties=array(), $options=array()){}

	/**
	* Process and return the output from a PHP snippet by name.
	*
	* @param string $snippetName
	* @param array $params
	*
	* @return string
	*/
	public function runSnippet($snippetName, $params=array()){}

	/**
	* Sanitize values of an array using regular expression patterns.
	*
	* @param array $target
	* @param array $patterns
	* @param integer $depth
	* @param integer $nesting
	*
	* @return array
	*/
	public function sanitize($target, $patterns=array(), $depth="99", $nesting="10"){}

	/**
	* Sanitizes a string
	*
	* @param string $str
	* @param array $chars
	* @param string $allowedTags
	*
	* @return string
	*/
	public function sanitizeString($str, $chars=array(/), $allowedTags=""){}

	/**
	* Send the user to a type-specific core error page and halt PHP execution.
	*
	* @param string $type
	* @param array $options
	*
	*/
	public function sendError($type="", $options=array()){}

	/**
	* Send the user to a MODX virtual error page.
	*
	* @param array $options
	*
	*/
	public function sendErrorPage($options=null){}

	/**
	* Forwards the request to another resource without changing the URL.
	*
	* @param integer $id
	* @param string $options
	*
	*/
	public function sendForward($id, $options=null){}

	/**
	* Sends a redirect to the specified URL using the specified options.
	*
	* @param string $url
	* @param array $options
	* @param string $type
	* @param string $responseCode
	*
	*/
	public function sendRedirect($url, $options=false, $type="", $responseCode=""){}

	/**
	* Send the user to the MODX unauthorized page.
	*
	* @param array $options
	*
	*/
	public function sendUnauthorizedPage($options=null){}

	/**
	* Sets a placeholder value.
	*
	* @param string $key
	* @param mixed $value
	*
	*/
	public function setPlaceholder($key, $value){}

	/**
	* Sets a collection of placeholders stored in an array or as object vars.
	*
	* @param array $placeholders
	* @param string $namespace
	*
	*/
	public function setPlaceholders($placeholders, $namespace=""){}

	/**
	* Strip unwanted HTML and PHP tags and supplied patterns from content.
	*
	* @param string $html
	* @param string $allowed
	* @param array $patterns
	* @param int $depth
	*
	* @return boolean
	*/
	public function stripTags($html, $allowed="", $patterns=array(), $depth="10"){}

	/**
	* Switches the primary Context for the modX instance.
	*
	* @param string $contextKey
	* @param boolean $reload
	*
	* @return boolean
	*/
	public function switchContext($contextKey, $reload=false){}

	/**
	* Recursively validates and sets placeholders appropriate to the value type passed.
	*
	* @param string $key
	* @param mixed $value
	* @param string $prefix
	* @param string $separator
	* @param boolean $restore
	*
	* @return array
	*/
	public function toPlaceholder($key, $value, $prefix="", $separator=".", $restore=false){}

	/**
	* Sets placeholders from values stored in arrays and objects.
	*
	* @param array $subject
	* @param string $prefix
	* @param string $separator
	* @param boolean $restore
	*
	* @return array
	*/
	public function toPlaceholders($subject, $prefix="", $separator=".", $restore=false){}

	/**
	* Turn an associative or numeric array into a valid query string.
	*
	* @param array $parameters
	* @param string $numPrefix
	* @param string $argSeparator
	*
	* @return string
	*/
	public function toQueryString($parameters=array(), $numPrefix="", $argSeparator="&"){}

	/**
	* Unset a placeholder value by key.
	*
	* @param string $key
	*
	*/
	public function unsetPlaceholder($key){}

	/**
	* Unset multiple placeholders, either by prefix or an array of keys.
	*
	* @param string $keys
	*
	*/
	public function unsetPlaceholders($keys){}

}
class modSystemEvent{
	/** 
	* The current output for the event
	* @var string $_output
	*/
	var $_output = null;
	/** 
	* Whether or not this event has been activated
	* @var boolean
	*/
	var $activated = null;
	/** 
	* The name of the active plugin being invoked
	* @var string $activePlugin
	*/
	var $activePlugin = "";
	/** 
	* The name of the Event
	* @var string $name
	*/
	var $name = "";
	/** 
	* Any params passed to this event
	* @var array $params
	*/
	var $params = null;
	/** 
	* @var string The name of the active property set for the invoked Event
	*/
	var $propertySet = "";
	/** 
	* Any returned values for this event
	* @var mixed $returnedValues
	*/
	var $returnedValues = null;
	/**
	* Display a message to the user during the event.
	*
	* @param string $msg
	*
	*/
	public function alert($msg){}

	/**
	* Returns whether the event will propagate or not.
	* @return boolean
	*/
	public function isPropagatable(){}

	/**
	* Render output from the event.
	*
	* @param string $output
	*
	*/
	public function output($output){}

	/**
	* Reset the event instance for reuse.
	*/
	public function resetEventObject(){}

	/**
	* Stop further execution of plugins for this event.
	*/
	public function stopPropagation(){}

}
class CFArray extends ArrayObject implements Countable,Serializable,ArrayAccess,Traversable,IteratorAggregate{
	public function append($value){}

	/**
	* Verifies that _all_ responses were successful. A single failed request will cause <areOK()> to return false. Equivalent to <CFResponse::isOK()>, except it applies to all responses.
	* @return boolean
	*/
	public function areOK(){}

	public function asort(){}

	/**
	* Removes all `null` values from an array.
	* @return \CFArray
	*/
	public function compress(){}

	public function count(){}

	/**
	* Iterates over a <CFArray> object, and executes a function for each matched element.
	*
	* @param string $callback
	* @param mixed $bind
	*
	* @return \CFArray
	*/
	public function each($callback, $bind=null){}

	public function exchangeArray($array){}

	/**
	* Filters the list of nodes by passing each value in the current <CFArray> object through a function. The node will be removed if the function returns `false`.
	*
	* @param string $callback
	* @param mixed $bind
	*
	* @return \CFArray
	*/
	public function filter($callback, $bind=null){}

	/**
	* Gets the first result in the array.
	* @return mixed
	*/
	public function first(){}

	public function getArrayCopy(){}

	public function getFlags(){}

	public function getIterator(){}

	public function getIteratorClass(){}

	/**
	* Alternate approach to constructing a new instance. Supports chaining.
	*
	* @param mixed $input
	* @param integer $flags
	* @param string $iterator_class
	*
	* @return mixed
	*/
	public function init($input=array(), $flags="1", $iterator_class="ArrayIterator"){}

	public function ksort(){}

	/**
	* Gets the last result in the array.
	* @return mixed
	*/
	public function last(){}

	/**
	* Passes each element in the current <CFArray> object through a function, and produces a new <CFArray> object containing the return values.
	*
	* @param string $callback
	* @param mixed $bind
	*
	* @return \CFArray
	*/
	public function map($callback, $bind=null){}

	/**
	* Maps each element in the <CFArray> object as an integer.
	* @return array
	*/
	public function map_integer(){}

	/**
	* Maps each element in the CFArray object as a string.
	*
	* @param string $pcre
	*
	* @return array
	*/
	public function map_string($pcre=null){}

	public function natcasesort(){}

	public function natsort(){}

	public function offsetExists($index){}

	public function offsetGet($index){}

	public function offsetSet($index, $newval){}

	public function offsetUnset($index){}

	/**
	* Alias for <filter()>. This functionality was incorrectly named _reduce_ in earlier versions of the SDK.
	*
	* @param string $callback
	* @param mixed $bind
	*
	* @return \CFArray
	*/
	public function reduce($callback, $bind=null){}

	/**
	* Reindexes the array, starting from zero.
	* @return \CFArray
	*/
	public function reindex(){}

	public function serialize(){}

	public function setFlags($flags){}

	public function setIteratorClass($iteratorClass){}

	/**
	* Gets the current XML node as a JSON string.
	* @return string
	*/
	public function to_json(){}

	/**
	* Gets the current XML node as a YAML string.
	* @return string
	*/
	public function to_yaml(){}

	public function uasort($cmp_function){}

	public function uksort($cmp_function){}

	public function unserialize($serialized){}

}
class CFBatchRequest_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class CFBatchRequest extends CFRuntime{
	/** 
	* Stores the size of the request window.
	*/
	var $limit = null;
	/** 
	* Stores the cURL handles that are to be processed.
	*/
	var $queue = null;
	/**
	* Adds a new cURL handle to the request queue.
	*
	* @param resource $handle
	*
	* @return $this
	*/
	public function add($handle){}

}
class CFComplexType{
	/**
	* Takes a JSON object, as a string, to convert to query string keys.
	*
	* @param string $json
	* @param string $member
	* @param string $default_key
	*
	* @return array
	*/
	public function json($json, $member="", $default_key=""){}

	/**
	* Takes an associative array to convert to query string keys.
	*
	* @param array $map
	* @param string $member
	* @param string $default_key
	*
	* @return array
	*/
	public function map($map, $member="", $default_key=""){}

	/**
	* A protected method that is used by <json()>, <yaml()> and <map()>.
	*
	* @param string $data
	* @param string $member
	* @param string $key
	* @param array $out
	*
	* @return array
	*/
	public function option_group($data, $member="", $key="", $out=array()){}

	/**
	* Takes a YAML object, as a string, to convert to query string keys.
	*
	* @param string $yaml
	* @param string $member
	* @param string $default_key
	*
	* @return array
	*/
	public function yaml($yaml, $member="", $default_key=""){}

}
class CFGzipDecode{
	/** 
	* Modified time
	*/
	var $MTIME = null;
	/** 
	* Operating System
	*/
	var $OS = null;
	/** 
	* Subfield ID 1
	*/
	var $SI1 = null;
	/** 
	* Subfield ID 2
	*/
	var $SI2 = null;
	/** 
	* Extra Flags
	*/
	var $XFL = null;
	/** 
	* Human readable comment
	*/
	var $comment = null;
	/** 
	* Compressed data
	*/
	var $compressed_data = null;
	/** 
	* Size of compressed data
	*/
	var $compressed_size = null;
	/** 
	* Uncompressed data
	*/
	var $data = null;
	/** 
	* Extra field content
	*/
	var $extra_field = null;
	/** 
	* Original filename
	*/
	var $filename = null;
	/** 
	* Flags (FLG)
	*/
	var $flags = null;
	/** 
	* Minimum size of a valid gzip string
	*/
	var $min_compressed_size = "18";
	/** 
	* Current position of pointer
	*/
	var $position = "0";
	/**
	* Decode the GZIP stream
	*/
	public function parse(){}

}
class CFHadoopBase{
	/**
	* Prepares a Hive or Pig script before passing it to the script runner.
	*
	* @param string $type
	* @param array $args
	*
	* @return array
	*/
	public function hive_pig_script($type, $args=null){}

	/**
	* Runs a specified script on the master node of your cluster.
	*
	* @param string $script
	* @param array $args
	*
	* @return array
	*/
	public function script_runner($script, $args=null){}

}
class CFHadoopBootstrap extends CFHadoopBase{
	/**
	* Specify options to merge with Hadoop's default configuration.
	*
	* @param string $file
	* @param string $config
	*
	* @return array
	*/
	public function configure($file, $config){}

	/**
	* Create a new bootstrap action which lets you configure Hadoop's daemons. The options are written to the <code>hadoop-user-env.sh</code> file.
	*
	* @param string $daemon_type
	* @param array $opt
	*
	* @return array
	*/
	public function daemon($daemon_type, $opt=null){}

	/**
	* Create a new run-if bootstrap action which lets you conditionally run bootstrap actions.
	*
	* @param string $condition
	* @param array $args
	*
	* @return array
	*/
	public function run_if($condition, $args=null){}

}
class CFHadoopStep extends CFHadoopBase{
	/**
	* When ran as the first step in your job flow, enables the Hadoop debugging UI in the AWS Management Console.
	* @return array
	*/
	public function enable_debugging(){}

	/**
	* Step that installs Hive on your job flow.
	* @return array
	*/
	public function install_hive(){}

	/**
	* Step that installs Pig on your job flow.
	* @return array
	*/
	public function install_pig(){}

	/**
	* Step that runs a Hive script on your job flow.
	*
	* @param string $script
	* @param array $args
	*
	* @return array
	*/
	public function run_hive_script($script, $args=null){}

	/**
	* Step that runs a Pig script on your job flow.
	*
	* @param string $script
	* @param array $args
	*
	* @return array
	*/
	public function run_pig_script($script, $args=null){}

}
class CFInfo{
	/**
	* Gets information about the web service APIs that the SDK supports.
	* @return array
	*/
	public function api_support(){}

}
class CFJSON{
	/**
	* Converts a JSON string to a CFSimpleXML object.
	*
	* @param string $json
	* @param \SimpleXMLElement $xml
	* @param string $parser
	*
	* @return \CFSimpleXML
	*/
	public function to_xml($json, $xml=null, $parser="CFSimpleXML"){}

}
class JSON_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class CFManifest{
	/**
	* Takes a JSON object as a string to convert to a YAML manifest.
	*
	* @param string $json
	*
	* @return string
	*/
	public function json($json){}

	/**
	* Takes an associative array to convert to a YAML manifest.
	*
	* @param array $map
	*
	* @return string
	*/
	public function map($map){}

}
class CFMimeTypes{
	/** 
	* Map of the extension-to-mime-types that we support.
	*/
	var $mime_types = array();
	/**
	* Attempt to match the file extension to a known mime-type.
	*
	* @param string $ext
	*
	* @return string
	*/
	public function get_mimetype($ext){}

}
class CFPolicy{
	/** 
	* Stores the object that contains the authentication credentials.
	*/
	var $auth = null;
	/** 
	* Stores the policy object that we're working with.
	*/
	var $json_policy = null;
	/**
	* Decode a policy that was returned from the service.
	*
	* @param string $response
	*
	* @return string
	*/
	public function decode_policy($response){}

	/**
	* Gets the JSON string with the whitespace removed.
	* @return string
	*/
	public function get_json(){}

	/**
	* Get the key from the authenticated instance.
	* @return string
	*/
	public function get_key(){}

	/**
	* Base64-encodes the JSON string.
	* @return string
	*/
	public function get_policy(){}

	/**
	* Gets the JSON string with the whitespace removed.
	* @return string
	*/
	public function get_policy_signature(){}

	/**
	* Alternate approach to constructing a new instance. Supports chaining.
	*
	* @param \CFRuntime $auth
	* @param string $policy
	*
	* @return $this
	*/
	public function init($auth, $policy){}

}
class RequestCore{
	/** 
	* The location of the cacert.pem file to use.
	*/
	var $cacert_location = false;
	/** 
	* The handle for the cURL object.
	*/
	var $curl_handle = null;
	/** 
	* Custom CURLOPT settings.
	*/
	var $curlopts = null;
	/** 
	* The state of debug mode.
	*/
	var $debug_mode = false;
	/** 
	* The method by which the request is being made.
	*/
	var $method = null;
	/** 
	* The password to use for the request.
	*/
	var $password = null;
	/** 
	* Stores the proxy settings to use for the request.
	*/
	var $proxy = null;
	/** 
	* File to read from while streaming up.
	*/
	var $read_file = null;
	/** 
	* The resource to read from while streaming up.
	*/
	var $read_stream = null;
	/** 
	* The length already read from the stream.
	*/
	var $read_stream_read = "0";
	/** 
	* The size of the stream to read from.
	*/
	var $read_stream_size = null;
	/** 
	* The user-defined callback function to call when a stream is read from.
	*/
	var $registered_streaming_read_callback = null;
	/** 
	* The user-defined callback function to call when a stream is written to.
	*/
	var $registered_streaming_write_callback = null;
	/** 
	* The body being sent in the request.
	*/
	var $request_body = null;
	/** 
	* The default class to use for HTTP Requests (defaults to <RequestCore>).
	*/
	var $request_class = "RequestCore";
	/** 
	* The headers being sent in the request.
	*/
	var $request_headers = null;
	/** 
	* The URL being requested.
	*/
	var $request_url = null;
	/** 
	* The response returned by the request.
	*/
	var $response = null;
	/** 
	* The body returned by the request.
	*/
	var $response_body = null;
	/** 
	* The default class to use for HTTP Responses (defaults to <ResponseCore>).
	*/
	var $response_class = "ResponseCore";
	/** 
	* The HTTP status code returned by the request.
	*/
	var $response_code = null;
	/** 
	* The headers returned by the request.
	*/
	var $response_headers = null;
	/** 
	* Additional response data.
	*/
	var $response_info = null;
	/** 
	* Stores the intended starting seek position.
	*/
	var $seek_position = null;
	/** 
	* The state of SSL certificate verification.
	*/
	var $ssl_verification = true;
	/** 
	* Default useragent string to use.
	*/
	var $useragent = "RequestCore/1.4.3";
	/** 
	* The username to use for the request.
	*/
	var $username = null;
	/** 
	* File to write to while streaming down.
	*/
	var $write_file = null;
	/** 
	* The resource to write to while streaming down.
	*/
	var $write_stream = null;
	/**
	* Adds a custom HTTP header to the cURL request.
	*
	* @param string $key
	* @param mixed $value
	*
	* @return $this
	*/
	public function add_header($key, $value){}

	/**
	* Get the HTTP response body from the request.
	* @return string
	*/
	public function get_response_body(){}

	/**
	* Get the HTTP response code from the request.
	* @return string
	*/
	public function get_response_code(){}

	/**
	* Get the HTTP response headers from the request.
	*
	* @param string $header
	*
	* @return string|array
	*/
	public function get_response_header($header=null){}

	/**
	* Prepares and adds the details of the cURL request. This can be passed along to a <php:curl_multi_exec()> function.
	* @return resource
	*/
	public function prep_request(){}

	/**
	* Take the post-processed cURL data and break it down into useful header/body/info chunks. Uses the data stored in the `curl_handle` and `response` properties unless replacement data is passed in via parameters.
	*
	* @param resource $curl_handle
	* @param string $response
	*
	* @return \ResponseCore
	*/
	public function process_response($curl_handle=null, $response=null){}

	/**
	* Register a callback function to execute whenever a data stream is read from using <CFRequest::streaming_read_callback()>.
	*
	* @param string $callback
	*
	* @return $this
	*/
	public function register_streaming_read_callback($callback){}

	/**
	* Register a callback function to execute whenever a data stream is written to using <CFRequest::streaming_write_callback()>.
	*
	* @param string $callback
	*
	* @return $this
	*/
	public function register_streaming_write_callback($callback){}

	/**
	* Removes an HTTP header from the cURL request.
	*
	* @param string $key
	*
	* @return $this
	*/
	public function remove_header($key){}

	/**
	* Sends the request using <php:curl_multi_exec()>, enabling parallel requests. Uses the "rolling" method.
	*
	* @param array $handles
	* @param array $opt
	*
	* @return array
	*/
	public function send_multi_request($handles, $opt=null){}

	/**
	* Sends the request, calling necessary utility functions to update built-in properties.
	*
	* @param boolean $parse
	*
	* @return string
	*/
	public function send_request($parse=false){}

	/**
	* Set the body to send in the request.
	*
	* @param string $body
	*
	* @return $this
	*/
	public function set_body($body){}

	/**
	* Sets the credentials to use for authentication.
	*
	* @param string $user
	* @param string $pass
	*
	* @return $this
	*/
	public function set_credentials($user, $pass){}

	/**
	* Set additional CURLOPT settings. These will merge with the default settings, and override if there is a duplicate.
	*
	* @param array $curlopts
	*
	* @return $this
	*/
	public function set_curlopts($curlopts){}

	/**
	* Set the method type for the request.
	*
	* @param string $method
	*
	* @return $this
	*/
	public function set_method($method){}

	/**
	* Set the proxy to use for making requests.
	*
	* @param string $proxy
	*
	* @return $this
	*/
	public function set_proxy($proxy){}

	/**
	* Sets the file to read from while streaming up.
	*
	* @param string $location
	*
	* @return $this
	*/
	public function set_read_file($location){}

	/**
	* Sets the resource to read from while streaming up. Reads the stream from its current position until EOF or `$size` bytes have been read. If `$size` is not given it will be determined by <php:fstat()> and <php:ftell()>.
	*
	* @param resource $resource
	* @param integer $size
	*
	* @return $this
	*/
	public function set_read_stream($resource, $size=null){}

	/**
	* Sets the length in bytes to read from the stream while streaming up.
	*
	* @param integer $size
	*
	* @return $this
	*/
	public function set_read_stream_size($size){}

	/**
	* Set the URL to make the request to.
	*
	* @param string $url
	*
	* @return $this
	*/
	public function set_request_url($url){}

	/**
	* Set the intended starting seek position.
	*
	* @param integer $position
	*
	* @return $this
	*/
	public function set_seek_position($position){}

	/**
	* Sets a custom useragent string for the class.
	*
	* @param string $ua
	*
	* @return $this
	*/
	public function set_useragent($ua){}

	/**
	* Sets the file to write to while streaming down.
	*
	* @param string $location
	*
	* @return $this
	*/
	public function set_write_file($location){}

	/**
	* Sets the resource to write to while streaming down.
	*
	* @param resource $resource
	*
	* @return $this
	*/
	public function set_write_stream($resource){}

	/**
	* A callback function that is invoked by cURL for streaming up.
	*
	* @param resource $curl_handle
	* @param resource $file_handle
	* @param integer $length
	*
	* @return \binary
	*/
	public function streaming_read_callback($curl_handle, $file_handle, $length){}

	/**
	* A callback function that is invoked by cURL for streaming down.
	*
	* @param resource $curl_handle
	* @param \binary $data
	*
	* @return integer
	*/
	public function streaming_write_callback($curl_handle, $data){}

}
class ResponseCore{
	/** 
	* Stores the SimpleXML response.
	*/
	var $body = null;
	/** 
	* Stores the HTTP header information.
	*/
	var $header = null;
	/** 
	* Stores the HTTP response code.
	*/
	var $status = null;
	/**
	* Did we receive the status code we expected?
	*
	* @param integer $codes
	*
	* @return boolean
	*/
	public function isOK($codes=array(200)){}

}
class RequestCore_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class CFRequest extends RequestCore{
}
class CFResponse extends ResponseCore{
}
class CFSimpleXML extends SimpleXMLIterator implements Countable,Iterator,RecursiveIterator,Traversable{
	/** 
	* Stores the namespace name to use in XPath queries.
	*/
	var $xml_ns = null;
	/** 
	* Stores the namespace URI to use in XPath queries.
	*/
	var $xml_ns_url = null;
	public function addAttribute($name, $value, $ns){}

	public function addChild($name, $value, $ns){}

	public function asXML($filename){}

	public function attributes($ns, $is_prefix){}

	public function children($ns, $is_prefix){}

	/**
	* Whether or not the current node contains the compared value.
	*
	* @param string $value
	*
	* @return boolean
	*/
	public function contains($value){}

	public function count(){}

	public function current(){}

	public function getChildren(){}

	public function getDocNamespaces($recursve){}

	public function getName(){}

	public function getNamespaces($recursve){}

	public function hasChildren(){}

	/**
	* Alternate approach to constructing a new instance. Supports chaining.
	*
	* @param string $data
	* @param integer $options
	* @param boolean $data_is_url
	* @param string $ns
	* @param boolean $is_prefix
	*
	* @return \CFSimpleXML
	*/
	public function init($data, $options, $data_is_url, $ns, $is_prefix=false){}

	/**
	* Whether or not the current node exactly matches the compared value.
	*
	* @param string $value
	*
	* @return boolean
	*/
	public function is($value){}

	public function key(){}

	public function next(){}

	/**
	* Gets the parent or a preferred ancestor of the current element.
	*
	* @param string $node
	*
	* @return \CFSimpleXML
	*/
	public function parent($node=null){}

	/**
	* Wraps the results of an XPath query in a <CFArray> object.
	*
	* @param string $expr
	*
	* @return \CFArray
	*/
	public function query($expr){}

	public function registerXPathNamespace($prefix, $ns){}

	public function rewind(){}

	public function saveXML($filename){}

	/**
	* Gets the current XML node as <CFArray>, a child class of PHP's <php:ArrayObject> class.
	* @return \CFArray
	*/
	public function to_array(){}

	/**
	* Gets the current XML node as a JSON string.
	* @return string
	*/
	public function to_json(){}

	/**
	* Gets the current XML node as a stdClass object.
	* @return array
	*/
	public function to_stdClass(){}

	/**
	* Gets the current XML node as a true string.
	* @return string
	*/
	public function to_string(){}

	/**
	* Gets the current XML node as a YAML string.
	* @return string
	*/
	public function to_yaml(){}

	public function valid(){}

	public function xpath($path){}

}
class CFStackTemplate{
	/**
	* Removes whitespace from a JSON template.
	*
	* @param string $template
	*
	* @return string
	*/
	public function json($template){}

	/**
	* Converts an associative array (map) of the template into a JSON string.
	*
	* @param array $template
	*
	* @return string
	*/
	public function map($template){}

}
class CFStepConfig{
	/** 
	* Stores the configuration map.
	*/
	var $config = null;
	/**
	* Returns the configuration data.
	* @return array
	*/
	public function get_config(){}

	/**
	* Constructs a new instance of this class, and allows chaining.
	*
	* @param array $config
	*
	* @return $this
	*/
	public function init($config){}

}
class CFUtilities{
	/**
	* Checks to see if a date stamp is ISO-8601 formatted, and if not, makes it so.
	*
	* @param string $datestamp
	*
	* @return string
	*/
	public function convert_date_to_iso8601($datestamp){}

	/**
	* Converts a SimpleXML response to an array structure.
	*
	* @param \ResponseCore $response
	*
	* @return array
	*/
	public function convert_response_to_array($response){}

	/**
	* Decodes `\uXXXX` entities into their real unicode character equivalents.
	*
	* @param string $s
	*
	* @return string
	*/
	public function decode_uhex($s){}

	/**
	* Encode the value according to RFC 3986.
	*
	* @param string $string
	*
	* @return string
	*/
	public function encode_signature2($string){}

	/**
	* Generates a random GUID.
	* @return string
	*/
	public function generate_guid(){}

	/**
	* Convert a HEX value to Base64.
	*
	* @param string $str
	*
	* @return string
	*/
	public function hex_to_base64($str){}

	/**
	* Determines whether the data is Base64 encoded or not.
	*
	* @param string $s
	*
	* @return boolean
	*/
	public function is_base64($s){}

	/**
	* Determines whether the data is a JSON string or not.
	*
	* @param string $s
	*
	* @return boolean
	*/
	public function is_json($s){}

	/**
	* Can be removed once all calls are updated.
	*
	* @param mixed $obj
	*
	* @return string
	*/
	public function json_encode($obj){}

	/**
	* Retrieves the value of a class constant, while avoiding the `T_PAAMAYIM_NEKUDOTAYIM` error. Misspelled because `const` is a reserved word.
	*
	* @param object $class
	* @param string $const
	*
	* @return mixed
	*/
	public function konst($class, $const){}

	/**
	* Convert a query string into an associative array. Multiple, identical keys will become an indexed array.
	*
	* @param string $qs
	*
	* @return array
	*/
	public function query_to_array($qs){}

	/**
	* Return human readable file sizes.
	*
	* @param integer $size
	* @param string $unit
	* @param string $default
	*
	* @return string
	*/
	public function size_readable($size, $unit=null, $default=null){}

	/**
	* Convert a number of seconds into Hours:Minutes:Seconds.
	*
	* @param integer $seconds
	*
	* @return string
	*/
	public function time_hms($seconds){}

	/**
	* Convert an associative array into a query string.
	*
	* @param array $array
	*
	* @return string
	*/
	public function to_query_string($array){}

	/**
	* Convert an associative array into a sign-able string.
	*
	* @param array $array
	*
	* @return string
	*/
	public function to_signable_string($array){}

	/**
	* Returns the first value that is set. Based on [Try.these()](http://api.prototypejs.org/language/Try/these/) from [Prototype](http://prototypejs.org).
	*
	* @param array $attrs
	* @param object $base
	* @param mixed $default
	*
	* @return mixed
	*/
	public function try_these($attrs, $base=null, $default=null){}

}
class AmazonAS extends CFRuntime{
	/**
	* Creates a new Auto Scaling group with the specified name. Once the creation request is completed, the AutoScalingGroup is ready to be used in other calls.
	*
	* @param string $auto_scaling_group_name
	* @param string $launch_configuration_name
	* @param integer $min_size
	* @param integer $max_size
	* @param string $availability_zones
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_auto_scaling_group($auto_scaling_group_name, $launch_configuration_name, $min_size, $max_size, $availability_zones, $opt=null){}

	/**
	* Creates a new launch configuration. Once created, the new launch configuration is available for immediate use.
	*
	* @param string $launch_configuration_name
	* @param string $image_id
	* @param string $instance_type
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_launch_configuration($launch_configuration_name, $image_id, $instance_type, $opt=null){}

	/**
	* Deletes the specified auto scaling group if the group has no instances and no scaling activities in progress.
	*
	* @param string $auto_scaling_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_auto_scaling_group($auto_scaling_group_name, $opt=null){}

	/**
	* Deletes the specified LaunchConfiguration.
	*
	* @param string $launch_configuration_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_launch_configuration($launch_configuration_name, $opt=null){}

	/**
	* Deletes a policy created by PutScalingPolicy
	*
	* @param string $policy_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_policy($policy_name, $opt=null){}

	/**
	* Deletes a scheduled action previously created using the PutScheduledUpdateGroupAction.
	*
	* @param string $scheduled_action_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_scheduled_action($scheduled_action_name, $opt=null){}

	/**
	* Returns policy adjustment types for use in the PutScalingPolicy action.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_adjustment_types($opt=null){}

	/**
	* Returns a full description of each Auto Scaling group in the given list. This includes all Amazon EC2 instances that are members of the group. If a list of names is not provided, the service returns the full details of all Auto Scaling groups.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_auto_scaling_groups($opt=null){}

	/**
	* Returns a description of each Auto Scaling instance in the InstanceIds list. If a list is not provided, the service returns the full details of all instances up to a maximum of fifty.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_auto_scaling_instances($opt=null){}

	/**
	* Returns a full description of the launch configurations given the specified names.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_launch_configurations($opt=null){}

	/**
	* Returns a list of metrics and a corresponding list of granularities for each metric.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_metric_collection_types($opt=null){}

	/**
	* Returns descriptions of what each policy does. This action supports pagination. If the response includes a token, there are more records available. To get the additional records, repeat the request with the response token as the NextToken parameter.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_policies($opt=null){}

	/**
	* Returns the scaling activities for the specified Auto Scaling group.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_scaling_activities($opt=null){}

	/**
	* Returns scaling process types for use in the ResumeProcesses and SuspendProcesses actions.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_scaling_process_types($opt=null){}

	/**
	* Lists all the actions scheduled for your Auto Scaling group that haven't been executed. To see a list of action already executed, see the activity record returned in DescribeScalingActivities.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_scheduled_actions($opt=null){}

	/**
	* Disables monitoring of group metrics for the Auto Scaling group specified in AutoScalingGroupName. You can specify the list of affected metrics with the Metrics parameter.
	*
	* @param string $auto_scaling_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function disable_metrics_collection($auto_scaling_group_name, $opt=null){}

	/**
	* Enables monitoring of group metrics for the Auto Scaling group specified in AutoScalingGroupName. You can specify the list of enabled metrics with the Metrics parameter.
	*
	* @param string $auto_scaling_group_name
	* @param string $granularity
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function enable_metrics_collection($auto_scaling_group_name, $granularity, $opt=null){}

	/**
	* Runs the policy you create for your Auto Scaling group in PutScalingPolicy.
	*
	* @param string $policy_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function execute_policy($policy_name, $opt=null){}

	/**
	* Creates or updates a policy for an Auto Scaling group. To update an existing policy, use the existing policy name and set the parameter(s) you want to change. Any existing parameter not changed in an update to an existing policy is not changed in this update request.
	*
	* @param string $auto_scaling_group_name
	* @param string $policy_name
	* @param integer $scaling_adjustment
	* @param string $adjustment_type
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function put_scaling_policy($auto_scaling_group_name, $policy_name, $scaling_adjustment, $adjustment_type, $opt=null){}

	/**
	* Creates a scheduled scaling action for a Auto Scaling group. If you leave a parameter unspecified, the corresponding value remains unchanged in the affected Auto Scaling group.
	*
	* @param string $auto_scaling_group_name
	* @param string $scheduled_action_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function put_scheduled_update_group_action($auto_scaling_group_name, $scheduled_action_name, $opt=null){}

	/**
	* Resumes Auto Scaling processes for an Auto Scaling group. For more information, see SuspendProcesses and ProcessType.
	*
	* @param string $auto_scaling_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function resume_processes($auto_scaling_group_name, $opt=null){}

	/**
	* Adjusts the desired size of the AutoScalingGroup by initiating scaling activities. When reducing the size of the group, it is not possible to define which EC2 instances will be terminated. This applies to any auto-scaling decisions that might result in terminating instances.
	*
	* @param string $auto_scaling_group_name
	* @param integer $desired_capacity
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_desired_capacity($auto_scaling_group_name, $desired_capacity, $opt=null){}

	/**
	* Sets the health status of an instance.
	*
	* @param string $instance_id
	* @param string $health_status
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_instance_health($instance_id, $health_status, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

	/**
	* Suspends Auto Scaling processes for an Auto Scaling group. To suspend specific process types, specify them by name with the <code>ScalingProcesses.member.N</code> parameter. To suspend all process types, omit the <code>ScalingProcesses.member.N</code> parameter.
	*
	* @param string $auto_scaling_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function suspend_processes($auto_scaling_group_name, $opt=null){}

	/**
	* Terminates the specified instance. Optionally, the desired group size can be adjusted.
	*
	* @param string $instance_id
	* @param boolean $should_decrement_desired_capacity
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function terminate_instance_in_auto_scaling_group($instance_id, $should_decrement_desired_capacity, $opt=null){}

	/**
	* Updates the configuration for the specified AutoScalingGroup.
	*
	* @param string $auto_scaling_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_auto_scaling_group($auto_scaling_group_name, $opt=null){}

}
class AS_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonCloudFormation extends CFRuntime{
	/**
	* Creates a stack as specified in the template. After the call completes successfully, the stack creation starts. You can check the status of the stack via the DescribeStacks API.
	*
	* @param string $stack_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_stack($stack_name, $opt=null){}

	/**
	* Deletes a specified stack. Once the call completes successfully, stack deletion starts. Deleted stacks do not show up in the DescribeStacks API if the deletion has been completed successfully.
	*
	* @param string $stack_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_stack($stack_name, $opt=null){}

	/**
	* Returns all the stack related events for the AWS account. If <code>StackName</code> is specified, returns events related to all the stacks with the given name. If <code>StackName</code> is not specified, returns all the events for the account. For more information about a stack's event history, go to the <a href="http://docs.amazonwebservices.com/AWSCloudFormation/latest/UserGuide">AWS CloudFormation User Guide</a>.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_stack_events($opt=null){}

	/**
	* Returns a description of the specified resource in the specified stack.
	*
	* @param string $stack_name
	* @param string $logical_resource_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_stack_resource($stack_name, $logical_resource_id, $opt=null){}

	/**
	* Returns AWS resource descriptions for running and deleted stacks. If <code>StackName</code> is specified, all the associated resources that are part of the stack are returned. If <code>PhysicalResourceId</code> is specified, all the associated resources of the stack the resource belongs to are returned.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_stack_resources($opt=null){}

	/**
	* Returns the description for the specified stack; if no stack name was specified, then it returns the description for all the stacks created.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_stacks($opt=null){}

	/**
	* Returns the template body for a specified stack name. You can get the template for running or deleted stacks.
	*
	* @param string $stack_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_template($stack_name, $opt=null){}

	/**
	* Returns descriptions of all resources of the specified stack.
	*
	* @param string $stack_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_stack_resources($stack_name, $opt=null){}

	/**
	* Returns the summary information for stacks whose status matches the specified StackStatusFilter. Summary information for stacks that have been deleted is kept for 90 days after the stack is deleted. If no StackStatusFilter is specified, summary information for all stacks is returned (including existing stacks and stacks that have been deleted).
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_stacks($opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

	/**
	* Validates a specified template.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function validate_template($opt=null){}

}
class CloudFormation_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class CloudFront_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonCloudFront extends CFRuntime{
	/** 
	* The base content to use for generating the DistributionConfig XML.
	*/
	var $base_xml = null;
	/** 
	* The CloudFront distribution domain to use.
	*/
	var $domain = null;
	/** 
	* The RSA key pair ID to use.
	*/
	var $key_pair_id = null;
	/** 
	* The RSA private key resource locator.
	*/
	var $private_key = null;
	/**
	* Creates an Amazon CloudFront distribution. You can have up to 100 distributions in the Amazon CloudFront system.
	*
	* @param string $origin
	* @param string $caller_reference
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_distribution($origin, $caller_reference, $opt=null){}

	/**
	* Creates a new invalidation request.
	*
	* @param string $distribution_id
	* @param string $caller_reference
	* @param string $paths
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_invalidation($distribution_id, $caller_reference, $paths, $opt=null){}

	/**
	* Creates a new Amazon CloudFront origin access identity (OAI). You can create up to 100 OAIs per AWS account. For more information, see the Amazon CloudFront Developer Guide.
	*
	* @param string $caller_reference
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_oai($caller_reference, $opt=null){}

	/**
	* Deletes a disabled distribution. If distribution hasn't been disabled, Amazon CloudFront returns a <code>DistributionNotDisabled</code> error. Use <set_distribution_config()> to disable a distribution before attempting to delete.
	*
	* @param string $distribution_id
	* @param string $etag
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_distribution($distribution_id, $etag, $opt=null){}

	/**
	* Deletes an Amazon CloudFront origin access identity (OAI). To delete an OAI, the identity must first be disassociated from all distributions (by updating each distribution's configuration to omit the <code>OriginAccessIdentity</code> element). Wait until each distribution's state is <code>Deployed</code> before deleting the OAI.
	*
	* @param string $identity_id
	* @param string $etag
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_oai($identity_id, $etag, $opt=null){}

	/**
	* Generates the distribution configuration XML used with <create_distribution()> and <set_distribution_config()>.
	*
	* @param string $origin
	* @param string $caller_reference
	* @param array $opt
	*
	* @return string
	*/
	public function generate_config_xml($origin, $caller_reference, $opt=null){}

	/**
	* Generates the Invalidation Config XML used in <create_invalidation()>.
	*
	* @param string $caller_reference
	* @param array $opt
	*
	* @return string
	*/
	public function generate_invalidation_xml($caller_reference, $opt=null){}

	/**
	* Used to generate the origin access identity (OAI) Config XML used in <create_oai()>.
	*
	* @param string $caller_reference
	* @param array $opt
	*
	* @return string
	*/
	public function generate_oai_xml($caller_reference, $opt=null){}

	/**
	* Gets the current distribution configuration for the specified distribution ID.
	*
	* @param string $distribution_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_distribution_config($distribution_id, $opt=null){}

	/**
	* Gets distribution information for the specified distribution ID.
	*
	* @param string $distribution_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_distribution_info($distribution_id, $opt=null){}

	/**
	* Gets a simplified list of standard distribution IDs.
	*
	* @param string $pcre
	*
	* @return array
	*/
	public function get_distribution_list($pcre=null){}

	/**
	* Gets information about an invalidation.
	*
	* @param string $distribution_id
	* @param string $invalidation_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_invalidation($distribution_id, $invalidation_id, $opt=null){}

	/**
	* Gets information about an origin access identity (OAI).
	*
	* @param string $identity_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_oai($identity_id, $opt=null){}

	/**
	* Gets the configuration of the origin access identity (OAI) for the specified identity ID.
	*
	* @param string $identity_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_oai_config($identity_id, $opt=null){}

	/**
	* Gets a simplified list of origin access identity (OAI) IDs.
	*
	* @param string $pcre
	*
	* @return array
	*/
	public function get_oai_list($pcre=null){}

	/**
	* Generates a time-limited and/or query signed request for a private file with additional optional restrictions.
	*
	* @param string $distribution_hostname
	* @param string $filename
	* @param integer $expires
	* @param array $opt
	*
	* @return string
	*/
	public function get_private_object_url($distribution_hostname, $filename, $expires, $opt=null){}

	/**
	* Gets a simplified list of streaming distribution IDs.
	*
	* @param string $pcre
	*
	* @return array
	*/
	public function get_streaming_distribution_list($pcre=null){}

	/**
	* Gets a list of distributions. By default, the list is returned as one result. If needed, paginate the list by specifying values for the <code>MaxItems</code> and <code>Marker</code> parameters.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_distributions($opt=null){}

	/**
	* Gets a list of invalidations. By default, the list is returned as one result. If needed, paginate the list by specifying values for the <code>MaxItems</code> and <code>Marker</code> parameters.
	*
	* @param string $distribution_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_invalidations($distribution_id, $opt=null){}

	/**
	* Gets a list of origin access identity (OAI) summaries. By default, the list is returned as one result.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_oais($opt=null){}

	/**
	* Removes one or more CNAMEs from a <code>DistibutionConfig</code> XML document.
	*
	* @param \CFSimpleXML $xml
	* @param string $cname
	*
	* @return string
	*/
	public function remove_cname($xml, $cname){}

	/**
	* Sets a new distribution configuration for the specified distribution ID.
	*
	* @param string $distribution_id
	* @param string $xml
	* @param string $etag
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_distribution_config($distribution_id, $xml, $etag, $opt=null){}

	/**
	* Set the key ID of the RSA key pair being used.
	*
	* @param string $key_pair_id
	*
	* @return $this
	*/
	public function set_keypair_id($key_pair_id){}

	/**
	* Sets the configuration for an Amazon CloudFront origin access identity (OAI). Use this when updating the configuration. Currently, only comments may be updated. Follow the same process as when updating an identity's configuration as you do when updating a distribution's configuration. For more information, go to Updating a Distribution's Configuration in the Amazon CloudFront Developer Guide.
	*
	* @param string $identity_id
	* @param string $xml
	* @param string $etag
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_oai_config($identity_id, $xml, $etag, $opt=null){}

	/**
	* Set the private key resource locator being used.
	*
	* @param string $private_key
	*
	* @return $this
	*/
	public function set_private_key($private_key){}

	/**
	* Updates an existing configuration XML document.
	*
	* @param \CFSimpleXML $xml
	* @param array $opt
	*
	* @return string
	*/
	public function update_config_xml($xml, $opt=null){}

	/**
	* Updates the origin access identity (OAI) configureation XML used in <create_oai()>.
	*
	* @param \CFSimpleXML $xml
	* @param array $opt
	*
	* @return string
	*/
	public function update_oai_xml($xml, $opt=null){}

}
class AmazonCloudWatch extends CFRuntime{
	/**
	* Deletes all specified alarms. In the event of an error, no alarms are deleted.
	*
	* @param string $alarm_names
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_alarms($alarm_names, $opt=null){}

	/**
	* Retrieves history for the specified alarm. Filter alarms by date range or item type. If an alarm name is not specified, Amazon CloudWatch returns histories for all of the owner's alarms.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_alarm_history($opt=null){}

	/**
	* Retrieves alarms with the specified names. If no name is specified, all alarms for the user are returned. Alarms can be retrieved by using only a prefix for the alarm name, the alarm state, or a prefix for any action.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_alarms($opt=null){}

	/**
	* Retrieves all alarms for a single metric. Specify a statistic, period, or unit to filter the set of alarms further.
	*
	* @param string $metric_name
	* @param string $namespace
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_alarms_for_metric($metric_name, $namespace, $opt=null){}

	/**
	* Disables actions for the specified alarms. When an alarm's actions are disabled the alarm's state may change, but none of the alarm's actions will execute.
	*
	* @param string $alarm_names
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function disable_alarm_actions($alarm_names, $opt=null){}

	/**
	* Enables actions for the specified alarms.
	*
	* @param string $alarm_names
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function enable_alarm_actions($alarm_names, $opt=null){}

	/**
	* Gets statistics for the specified metric.
	*
	* @param string $namespace
	* @param string $metric_name
	* @param string $start_time
	* @param string $end_time
	* @param integer $period
	* @param string $statistics
	* @param string $unit
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_metric_statistics($namespace, $metric_name, $start_time, $end_time, $period, $statistics, $unit, $opt=null){}

	/**
	* Returns a list of valid metrics stored for the AWS account owner. Returned metrics can be used with GetMetricStatistics to obtain statistical data for a given metric.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_metrics($opt=null){}

	/**
	* Creates or updates an alarm and associates it with the specified Amazon CloudWatch metric. Optionally, this operation can associate one or more Amazon Simple Notification Service resources with the alarm.
	*
	* @param string $alarm_name
	* @param string $metric_name
	* @param string $namespace
	* @param string $statistic
	* @param integer $period
	* @param integer $evaluation_periods
	* @param double $threshold
	* @param string $comparison_operator
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function put_metric_alarm($alarm_name, $metric_name, $namespace, $statistic, $period, $evaluation_periods, $threshold, $comparison_operator, $opt=null){}

	/**
	* Publishes metric data points to Amazon CloudWatch. Amazon Cloudwatch associates the data points with the specified metric. If the specified metric does not exist, Amazon CloudWatch creates the metric. If you create a metric with the <code>PutMetricData</code> action, allow up to fifteen minutes for the metric to appear in calls to the ListMetrics action.
	*
	* @param string $namespace
	* @param array $metric_data
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function put_metric_data($namespace, $metric_data, $opt=null){}

	/**
	* Temporarily sets the state of an alarm. When the updated <code>StateValue</code> differs from the previous value, the action configured for the appropriate state is invoked. This is not a permanent change. The next periodic alarm check (in about a minute) will set the alarm to its actual state.
	*
	* @param string $alarm_name
	* @param string $state_value
	* @param string $state_reason
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_alarm_state($alarm_name, $state_value, $state_reason, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

}
class CloudWatch_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonEC2 extends CFRuntime{
	/**
	* Activates a specific number of licenses for a 90-day period. Activations can be done against a specific license ID.
	*
	* @param string $license_id
	* @param integer $capacity
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function activate_license($license_id, $capacity, $opt=null){}

	/**
	* The AllocateAddress operation acquires an elastic IP address for use with your account.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function allocate_address($opt=null){}

	/**
	* The AssociateAddress operation associates an elastic IP address with an instance.
	*
	* @param string $instance_id
	* @param string $public_ip
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function associate_address($instance_id, $public_ip, $opt=null){}

	/**
	* Associates a set of DHCP options (that you've previously created) with the specified VPC. Or, associates the default DHCP options with the VPC. The default set consists of the standard EC2 host name, no domain name, no DNS server, no NTP server, and no NetBIOS server or node type. After you associate the options with the VPC, any existing instances and all new instances that you launch in that VPC use the options. For more information about the supported DHCP options and using them with Amazon VPC, go to Using DHCP Options in the Amazon Virtual Private Cloud Developer Guide.
	*
	* @param string $dhcp_options_id
	* @param string $vpc_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function associate_dhcp_options($dhcp_options_id, $vpc_id, $opt=null){}

	/**
	* Associates a subnet with a route table. The subnet and route table must be in the same VPC. This association causes traffic originating from the subnet to be routed according to the routes in the route table. The action returns an association ID, which you need if you want to disassociate the route table from the subnet later. A route table can be associated with multiple subnets.
	*
	* @param string $subnet_id
	* @param string $route_table_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function associate_route_table($subnet_id, $route_table_id, $opt=null){}

	/**
	* Attaches an Internet gateway to a VPC, enabling connectivity between the Internet and the VPC. For more information about your VPC and Internet gateway, go to the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $internet_gateway_id
	* @param string $vpc_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function attach_internet_gateway($internet_gateway_id, $vpc_id, $opt=null){}

	/**
	* Attach a previously created volume to a running instance.
	*
	* @param string $volume_id
	* @param string $instance_id
	* @param string $device
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function attach_volume($volume_id, $instance_id, $device, $opt=null){}

	/**
	* Attaches a VPN gateway to a VPC. This is the last step required to get your VPC fully connected to your data center before launching instances in it. For more information, go to Process for Using Amazon VPC in the Amazon Virtual Private Cloud Developer Guide.
	*
	* @param string $vpn_gateway_id
	* @param string $vpc_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function attach_vpn_gateway($vpn_gateway_id, $vpc_id, $opt=null){}

	/**
	* This action applies only to security groups in a VPC; it's not supported for EC2 security groups. For information about Amazon Virtual Private Cloud and VPC security groups, go to the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $group_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function authorize_security_group_egress($group_id, $opt=null){}

	/**
	* The AuthorizeSecurityGroupIngress operation adds permissions to a security group.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function authorize_security_group_ingress($opt=null){}

	/**
	* The BundleInstance operation request that an instance is bundled the next time it boots. The bundling process creates a new image from a running instance and stores the AMI data in S3. Once bundled, the image must be registered in the normal way using the RegisterImage API.
	*
	* @param string $instance_id
	* @param array $policy
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function bundle_instance($instance_id, $policy, $opt=null){}

	/**
	* CancelBundleTask operation cancels a pending or in-progress bundling task. This is an asynchronous call and it make take a while for the task to be canceled. If a task is canceled while it is storing items, there may be parts of the incomplete AMI stored in S3. It is up to the caller to clean up these parts from S3.
	*
	* @param string $bundle_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function cancel_bundle_task($bundle_id, $opt=null){}

	/**
	* Cancels one or more Spot Instance requests.
	*
	* @param string $spot_instance_request_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function cancel_spot_instance_requests($spot_instance_request_id, $opt=null){}

	/**
	* The ConfirmProductInstance operation returns true if the specified product code is attached to the specified instance. The operation returns false if the product code is not attached to the instance.
	*
	* @param string $product_code
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function confirm_product_instance($product_code, $instance_id, $opt=null){}

	/**
	* Provides information to AWS about your customer gateway device. The customer gateway is the appliance at your end of the VPN connection (compared to the VPN gateway, which is the device at the AWS side of the VPN connection). You can have a single active customer gateway per AWS account (active means that you've created a VPN connection to use with the customer gateway). AWS might delete any customer gateway that you create with this operation if you leave it inactive for an extended period of time.
	*
	* @param string $type
	* @param string $ip_address
	* @param integer $bgp_asn
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_customer_gateway($type, $ip_address, $bgp_asn, $opt=null){}

	/**
	* Creates a set of DHCP options that you can then associate with one or more VPCs, causing all existing and new instances that you launch in those VPCs to use the set of DHCP options. The following table lists the individual DHCP options you can specify. For more information about the options, go to <a href="http://www.ietf.org/rfc/rfc2132.txt">http://www.ietf.org/rfc/rfc2132.txt</a>
	*
	* @param array $dhcp_configuration
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_dhcp_options($dhcp_configuration, $opt=null){}

	/**
	* Creates an Amazon EBS-backed AMI from a "running" or "stopped" instance. AMIs that use an Amazon EBS root device boot faster than AMIs that use instance stores. They can be up to 1 TiB in size, use storage that persists on instance failure, and can be stopped and started.
	*
	* @param string $instance_id
	* @param string $name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_image($instance_id, $name, $opt=null){}

	/**
	* Creates a new Internet gateway in your AWS account. After creating the Internet gateway, you then attach it to a VPC using <code>AttachInternetGateway</code>. For more information about your VPC and Internet gateway, go to Amazon Virtual Private Cloud User Guide.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_internet_gateway($opt=null){}

	/**
	* The CreateKeyPair operation creates a new 2048 bit RSA key pair and returns a unique ID that can be used to reference this key pair when launching new instances. For more information, see RunInstances.
	*
	* @param string $key_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_key_pair($key_name, $opt=null){}

	/**
	* Creates a new network ACL in a VPC. Network ACLs provide an optional layer of security (on top of security groups) for the instances in your VPC. For more information about network ACLs, go to Network ACLs in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $vpc_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_network_acl($vpc_id, $opt=null){}

	/**
	* Creates an entry (i.e., rule) in a network ACL with a rule number you specify. Each network ACL has a set of numbered ingress rules and a separate set of numbered egress rules. When determining whether a packet should be allowed in or out of a subnet associated with the ACL, Amazon VPC processes the entries in the ACL according to the rule numbers, in ascending order.
	*
	* @param string $network_acl_id
	* @param integer $rule_number
	* @param string $protocol
	* @param string $rule_action
	* @param boolean $egress
	* @param string $cidr_block
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_network_acl_entry($network_acl_id, $rule_number, $protocol, $rule_action, $egress, $cidr_block, $opt=null){}

	/**
	* Creates a PlacementGroup into which multiple Amazon EC2 instances can be launched. Users must give the group a name unique within the scope of the user account.
	*
	* @param string $group_name
	* @param string $strategy
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_placement_group($group_name, $strategy, $opt=null){}

	/**
	* Creates a new route in a route table within a VPC. The route's target can be either a gateway attached to the VPC or a NAT instance in the VPC.
	*
	* @param string $route_table_id
	* @param string $destination_cidr_block
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_route($route_table_id, $destination_cidr_block, $opt=null){}

	/**
	* Creates a new route table within a VPC. After you create a new route table, you can add routes and associate the table with a subnet. For more information about route tables, go to <a href="http://docs.amazonwebservices.com/AmazonVPC/latest/UserGuide/VPC_Route_Tables.html">Route Tables</a> in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $vpc_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_route_table($vpc_id, $opt=null){}

	/**
	* The CreateSecurityGroup operation creates a new security group.
	*
	* @param string $group_name
	* @param string $group_description
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_security_group($group_name, $group_description, $opt=null){}

	/**
	* Create a snapshot of the volume identified by volume ID. A volume does not have to be detached at the time the snapshot is taken.
	*
	* @param string $volume_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_snapshot($volume_id, $opt=null){}

	/**
	* Creates the data feed for Spot Instances, enabling you to view Spot Instance usage logs. You can create one data feed per account.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_spot_datafeed_subscription($bucket, $opt=null){}

	/**
	* Creates a subnet in an existing VPC. You can create up to 20 subnets in a VPC. If you add more than one subnet to a VPC, they're set up in a star topology with a logical router in the middle. When you create each subnet, you provide the VPC ID and the CIDR block you want for the subnet. Once you create a subnet, you can't change its CIDR block. The subnet's CIDR block can be the same as the VPC's CIDR block (assuming you want only a single subnet in the VPC), or a subset of the VPC's CIDR block. If you create more than one subnet in a VPC, the subnets' CIDR blocks must not overlap. The smallest subnet (and VPC) you can create uses a <code>/28</code> netmask (16 IP addresses), and the largest uses a <code>/18</code> netmask (16,384 IP addresses).
	*
	* @param string $vpc_id
	* @param string $cidr_block
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_subnet($vpc_id, $cidr_block, $opt=null){}

	/**
	* Adds or overwrites tags for the specified resources. Each resource can have a maximum of 10 tags. Each tag consists of a key-value pair.
	*
	* @param string $resource_id
	* @param array $tag
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_tags($resource_id, $tag, $opt=null){}

	/**
	* Initializes an empty volume of a given size.
	*
	* @param string $availability_zone
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_volume($availability_zone, $opt=null){}

	/**
	* Creates a VPC with the CIDR block you specify. The smallest VPC you can create uses a <code>/28</code> netmask (16 IP addresses), and the largest uses a <code>/18</code> netmask (16,384 IP addresses). To help you decide how big to make your VPC, go to the topic about creating VPCs in the Amazon Virtual Private Cloud Developer Guide.
	*
	* @param string $cidr_block
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_vpc($cidr_block, $opt=null){}

	/**
	* Creates a new VPN connection between an existing VPN gateway and customer gateway. The only supported connection type is ipsec.1.
	*
	* @param string $type
	* @param string $customer_gateway_id
	* @param string $vpn_gateway_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_vpn_connection($type, $customer_gateway_id, $vpn_gateway_id, $opt=null){}

	/**
	* Creates a new VPN gateway. A VPN gateway is the VPC-side endpoint for your VPN connection. You can create a VPN gateway before creating the VPC itself.
	*
	* @param string $type
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_vpn_gateway($type, $opt=null){}

	/**
	* Deactivates a specific number of licenses. Deactivations can be done against a specific license ID after they have persisted for at least a 90-day period.
	*
	* @param string $license_id
	* @param integer $capacity
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function deactivate_license($license_id, $capacity, $opt=null){}

	/**
	* Deletes a customer gateway. You must delete the VPN connection before deleting the customer gateway.
	*
	* @param string $customer_gateway_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_customer_gateway($customer_gateway_id, $opt=null){}

	/**
	* Deletes a set of DHCP options that you specify. Amazon VPC returns an error if the set of options you specify is currently associated with a VPC. You can disassociate the set of options by associating either a new set of options or the default options with the VPC.
	*
	* @param string $dhcp_options_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_dhcp_options($dhcp_options_id, $opt=null){}

	/**
	* Deletes an Internet gateway from your AWS account. The gateway must not be attached to a VPC. For more information about your VPC and Internet gateway, go to Amazon Virtual Private Cloud User Guide.
	*
	* @param string $internet_gateway_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_internet_gateway($internet_gateway_id, $opt=null){}

	/**
	* The DeleteKeyPair operation deletes a key pair.
	*
	* @param string $key_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_key_pair($key_name, $opt=null){}

	/**
	* Deletes a network ACL from a VPC. The ACL must not have any subnets associated with it. You can't delete the default network ACL. For more information about network ACLs, go to Network ACLs in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $network_acl_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_network_acl($network_acl_id, $opt=null){}

	/**
	* Deletes an ingress or egress entry (i.e., rule) from a network ACL. For more information about network ACLs, go to Network ACLs in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $network_acl_id
	* @param integer $rule_number
	* @param boolean $egress
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_network_acl_entry($network_acl_id, $rule_number, $egress, $opt=null){}

	/**
	* Deletes a PlacementGroup from a user's account. Terminate all Amazon EC2 instances in the placement group before deletion.
	*
	* @param string $group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_placement_group($group_name, $opt=null){}

	/**
	* Deletes a route from a route table in a VPC. For more information about route tables, go to <a href="http://docs.amazonwebservices.com/AmazonVPC/latest/UserGuide/VPC_Route_Tables.html">Route Tables</a> in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $route_table_id
	* @param string $destination_cidr_block
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_route($route_table_id, $destination_cidr_block, $opt=null){}

	/**
	* Deletes a route table from a VPC. The route table must not be associated with a subnet. You can't delete the main route table. For more information about route tables, go to <a href="http://docs.amazonwebservices.com/AmazonVPC/latest/UserGuide/VPC_Route_Tables.html">Route Tables</a> in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $route_table_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_route_table($route_table_id, $opt=null){}

	/**
	* The DeleteSecurityGroup operation deletes a security group.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_security_group($opt=null){}

	/**
	* Deletes the snapshot identified by <code>snapshotId</code>.
	*
	* @param string $snapshot_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_snapshot($snapshot_id, $opt=null){}

	/**
	* Deletes the data feed for Spot Instances.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_spot_datafeed_subscription($opt=null){}

	/**
	* Deletes a subnet from a VPC. You must terminate all running instances in the subnet before deleting it, otherwise Amazon VPC returns an error.
	*
	* @param string $subnet_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_subnet($subnet_id, $opt=null){}

	/**
	* Deletes tags from the specified Amazon EC2 resources.
	*
	* @param string $resource_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_tags($resource_id, $opt=null){}

	/**
	* Deletes a previously created volume. Once successfully deleted, a new volume can be created with the same name.
	*
	* @param string $volume_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_volume($volume_id, $opt=null){}

	/**
	* Deletes a VPC. You must detach or delete all gateways or other objects that are dependent on the VPC first. For example, you must terminate all running instances, delete all VPC security groups (except the default), delete all the route tables (except the default), etc.
	*
	* @param string $vpc_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_vpc($vpc_id, $opt=null){}

	/**
	* Deletes a VPN connection. Use this if you want to delete a VPC and all its associated components. Another reason to use this operation is if you believe the tunnel credentials for your VPN connection have been compromised. In that situation, you can delete the VPN connection and create a new one that has new keys, without needing to delete the VPC or VPN gateway. If you create a new VPN connection, you must reconfigure the customer gateway using the new configuration information returned with the new VPN connection ID.
	*
	* @param string $vpn_connection_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_vpn_connection($vpn_connection_id, $opt=null){}

	/**
	* Deletes a VPN gateway. Use this when you want to delete a VPC and all its associated components because you no longer need them. We recommend that before you delete a VPN gateway, you detach it from the VPC and delete the VPN connection. Note that you don't need to delete the VPN gateway if you just want to delete and re-create the VPN connection between your VPC and data center.
	*
	* @param string $vpn_gateway_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_vpn_gateway($vpn_gateway_id, $opt=null){}

	/**
	* The DeregisterImage operation deregisters an AMI. Once deregistered, instances of the AMI can no longer be launched.
	*
	* @param string $image_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function deregister_image($image_id, $opt=null){}

	/**
	* The DescribeAddresses operation lists elastic IP addresses assigned to your account.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_addresses($opt=null){}

	/**
	* The DescribeAvailabilityZones operation describes availability zones that are currently available to the account and their states.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_availability_zones($opt=null){}

	/**
	* The DescribeBundleTasks operation describes in-progress and recent bundle tasks. Complete and failed tasks are removed from the list a short time after completion. If no bundle ids are given, all bundle tasks are returned.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_bundle_tasks($opt=null){}

	/**
	* Gives you information about your customer gateways. You can filter the results to return information only about customer gateways that match criteria you specify. For example, you could ask to get information about a particular customer gateway (or all) only if the gateway's state is pending or available. You can specify multiple filters (e.g., the customer gateway has a particular IP address for the Internet-routable external interface, and the gateway's state is pending or available). The result includes information for a particular customer gateway only if the gateway matches all your filters. If there's no match, no special message is returned; the response is simply empty. The following table shows the available filters.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_customer_gateways($opt=null){}

	/**
	* Gives you information about one or more sets of DHCP options. You can specify one or more DHCP options set IDs, or no IDs (to describe all your sets of DHCP options). The returned information consists of:
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_dhcp_options($opt=null){}

	/**
	* The DescribeImageAttribute operation returns information about an attribute of an AMI. Only one attribute can be specified per call.
	*
	* @param string $image_id
	* @param string $attribute
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_image_attribute($image_id, $attribute, $opt=null){}

	/**
	* The DescribeImages operation returns information about AMIs, AKIs, and ARIs available to the user. Information returned includes image type, product codes, architecture, and kernel and RAM disk IDs. Images available to the user include public images available for any user to launch, private images owned by the user making the request, and private images owned by other users for which the user has explicit launch permissions.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_images($opt=null){}

	/**
	* Returns information about an attribute of an instance. Only one attribute can be specified per call.
	*
	* @param string $instance_id
	* @param string $attribute
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_instance_attribute($instance_id, $attribute, $opt=null){}

	/**
	* The DescribeInstances operation returns information about instances that you own.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_instances($opt=null){}

	/**
	* Gives you information about your Internet gateways. You can filter the results to return information only about Internet gateways that match criteria you specify. For example, you could get information only about gateways with particular tags. The Internet gateway must match at least one of the specified values for it to be included in the results.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_internet_gateways($opt=null){}

	/**
	* The DescribeKeyPairs operation returns information about key pairs available to you. If you specify key pairs, information about those key pairs is returned. Otherwise, information for all registered key pairs is returned.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_key_pairs($opt=null){}

	/**
	* Provides details of a user's registered licenses. Zero or more IDs may be specified on the call. When one or more license IDs are specified, only data for the specified IDs are returned.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_licenses($opt=null){}

	/**
	* Gives you information about the network ACLs in your VPC. You can filter the results to return information only about ACLs that match criteria you specify. For example, you could get information only the ACL associated with a particular subnet. The ACL must match at least one of the specified values for it to be included in the results.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_network_acls($opt=null){}

	/**
	* Returns information about one or more PlacementGroup instances in a user's account.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_placement_groups($opt=null){}

	/**
	* The DescribeRegions operation describes regions zones that are currently available to the account.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_regions($opt=null){}

	/**
	* The DescribeReservedInstances operation describes Reserved Instances that were purchased for use with your account.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_reserved_instances($opt=null){}

	/**
	* The DescribeReservedInstancesOfferings operation describes Reserved Instance offerings that are available for purchase. With Amazon EC2 Reserved Instances, you purchase the right to launch Amazon EC2 instances for a period of time (without getting insufficient capacity errors) and pay a lower usage rate for the actual time used.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_reserved_instances_offerings($opt=null){}

	/**
	* Gives you information about your route tables. You can filter the results to return information only about tables that match criteria you specify. For example, you could get information only about a table associated with a particular subnet. You can specify multiple values for the filter. The table must match at least one of the specified values for it to be included in the results.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_route_tables($opt=null){}

	/**
	* The DescribeSecurityGroups operation returns information about security groups that you own.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_security_groups($opt=null){}

	/**
	* Returns information about an attribute of a snapshot. Only one attribute can be specified per call.
	*
	* @param string $snapshot_id
	* @param string $attribute
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_snapshot_attribute($snapshot_id, $attribute, $opt=null){}

	/**
	* Returns information about the Amazon EBS snapshots available to you. Snapshots available to you include public snapshots available for any AWS account to launch, private snapshots you own, and private snapshots owned by another AWS account but for which you've been given explicit create volume permissions.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_snapshots($opt=null){}

	/**
	* Describes the data feed for Spot Instances.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_spot_datafeed_subscription($opt=null){}

	/**
	* Describes Spot Instance requests. Spot Instances are instances that Amazon EC2 starts on your behalf when the maximum price that you specify exceeds the current Spot Price. Amazon EC2 periodically sets the Spot Price based on available Spot Instance capacity and current spot instance requests. For conceptual information about Spot Instances, refer to the <a href="http://docs.amazonwebservices.com/AWSEC2/2010-08-31/DeveloperGuide/">Amazon Elastic Compute Cloud Developer Guide</a> or <a href="http://docs.amazonwebservices.com/AWSEC2/2010-08-31/UserGuide/">Amazon Elastic Compute Cloud User Guide</a>.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_spot_instance_requests($opt=null){}

	/**
	* Describes the Spot Price history.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_spot_price_history($opt=null){}

	/**
	* Gives you information about your subnets. You can filter the results to return information only about subnets that match criteria you specify.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_subnets($opt=null){}

	/**
	* Describes the tags for the specified resources.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_tags($opt=null){}

	/**
	* Describes the status of the indicated volume or, in lieu of any specified, all volumes belonging to the caller. Volumes that have been deleted are not described.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_volumes($opt=null){}

	/**
	* Gives you information about your VPCs. You can filter the results to return information only about VPCs that match criteria you specify.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_vpcs($opt=null){}

	/**
	* Gives you information about your VPN connections.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_vpn_connections($opt=null){}

	/**
	* Gives you information about your VPN gateways. You can filter the results to return information only about VPN gateways that match criteria you specify.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_vpn_gateways($opt=null){}

	/**
	* Detaches an Internet gateway from a VPC, disabling connectivity between the Internet and the VPC. The VPC must not contain any running instances with elastic IP addresses. For more information about your VPC and Internet gateway, go to Amazon Virtual Private Cloud User Guide.
	*
	* @param string $internet_gateway_id
	* @param string $vpc_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function detach_internet_gateway($internet_gateway_id, $vpc_id, $opt=null){}

	/**
	* Detach a previously attached volume from a running instance.
	*
	* @param string $volume_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function detach_volume($volume_id, $opt=null){}

	/**
	* Detaches a VPN gateway from a VPC. You do this if you're planning to turn off the VPC and not use it anymore. You can confirm a VPN gateway has been completely detached from a VPC by describing the VPN gateway (any attachments to the VPN gateway are also described).
	*
	* @param string $vpn_gateway_id
	* @param string $vpc_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function detach_vpn_gateway($vpn_gateway_id, $vpc_id, $opt=null){}

	/**
	* The DisassociateAddress operation disassociates the specified elastic IP address from the instance to which it is assigned. This is an idempotent operation. If you enter it more than once, Amazon EC2 does not return an error.
	*
	* @param string $public_ip
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function disassociate_address($public_ip, $opt=null){}

	/**
	* Disassociates a subnet from a route table.
	*
	* @param string $association_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function disassociate_route_table($association_id, $opt=null){}

	/**
	* The GetConsoleOutput operation retrieves console output for the specified instance.
	*
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_console_output($instance_id, $opt=null){}

	/**
	* Retrieves the encrypted administrator password for the instances running Windows.
	*
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_password_data($instance_id, $opt=null){}

	/**
	* Imports the public key from an RSA key pair created with a third-party tool. This operation differs from CreateKeyPair as the private key is never transferred between the caller and AWS servers.
	*
	* @param string $key_name
	* @param string $public_key_material
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function import_key_pair($key_name, $public_key_material, $opt=null){}

	/**
	* The ModifyImageAttribute operation modifies an attribute of an AMI.
	*
	* @param string $image_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function modify_image_attribute($image_id, $opt=null){}

	/**
	* Modifies an attribute of an instance.
	*
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function modify_instance_attribute($instance_id, $opt=null){}

	/**
	* Adds or remove permission settings for the specified snapshot.
	*
	* @param string $snapshot_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function modify_snapshot_attribute($snapshot_id, $opt=null){}

	/**
	* Enables monitoring for a running instance.
	*
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function monitor_instances($instance_id, $opt=null){}

	/**
	* The PurchaseReservedInstancesOffering operation purchases a Reserved Instance for use with your account. With Amazon EC2 Reserved Instances, you purchase the right to launch Amazon EC2 instances for a period of time (without getting insufficient capacity errors) and pay a lower usage rate for the actual time used.
	*
	* @param string $reserved_instances_offering_id
	* @param integer $instance_count
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function purchase_reserved_instances_offering($reserved_instances_offering_id, $instance_count, $opt=null){}

	/**
	* The RebootInstances operation requests a reboot of one or more instances. This operation is asynchronous; it only queues a request to reboot the specified instance(s). The operation will succeed if the instances are valid and belong to the user. Requests to reboot terminated instances are ignored.
	*
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function reboot_instances($instance_id, $opt=null){}

	/**
	* The RegisterImage operation registers an AMI with Amazon EC2. Images must be registered before they can be launched. For more information, see RunInstances.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function register_image($opt=null){}

	/**
	* The ReleaseAddress operation releases an elastic IP address associated with your account.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function release_address($opt=null){}

	/**
	* Changes which network ACL a subnet is associated with. By default when you create a subnet, it's automatically associated with the default network ACL. For more information about network ACLs, go to Network ACLs in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $association_id
	* @param string $network_acl_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function replace_network_acl_association($association_id, $network_acl_id, $opt=null){}

	/**
	* Replaces an entry (i.e., rule) in a network ACL. For more information about network ACLs, go to Network ACLs in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $network_acl_id
	* @param integer $rule_number
	* @param string $protocol
	* @param string $rule_action
	* @param boolean $egress
	* @param string $cidr_block
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function replace_network_acl_entry($network_acl_id, $rule_number, $protocol, $rule_action, $egress, $cidr_block, $opt=null){}

	/**
	* Replaces an existing route within a route table in a VPC. For more information about route tables, go to <a href="http://docs.amazonwebservices.com/AmazonVPC/latest/UserGuide/VPC_Route_Tables.html">Route Tables</a> in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $route_table_id
	* @param string $destination_cidr_block
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function replace_route($route_table_id, $destination_cidr_block, $opt=null){}

	/**
	* Changes the route table associated with a given subnet in a VPC. After you execute this action, the subnet uses the routes in the new route table it's associated with. For more information about route tables, go to <a href="http://docs.amazonwebservices.com/AmazonVPC/latest/UserGuide/VPC_Route_Tables.html">Route Tables</a> in the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $association_id
	* @param string $route_table_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function replace_route_table_association($association_id, $route_table_id, $opt=null){}

	/**
	* Creates a Spot Instance request.
	*
	* @param string $spot_price
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function request_spot_instances($spot_price, $opt=null){}

	/**
	* The ResetImageAttribute operation resets an attribute of an AMI to its default value.
	*
	* @param string $image_id
	* @param string $attribute
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function reset_image_attribute($image_id, $attribute, $opt=null){}

	/**
	* Resets an attribute of an instance to its default value.
	*
	* @param string $instance_id
	* @param string $attribute
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function reset_instance_attribute($instance_id, $attribute, $opt=null){}

	/**
	* Resets permission settings for the specified snapshot.
	*
	* @param string $snapshot_id
	* @param string $attribute
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function reset_snapshot_attribute($snapshot_id, $attribute, $opt=null){}

	/**
	* This action applies only to security groups in a VPC. It doesn't work with EC2 security groups. For information about Amazon Virtual Private Cloud and VPC security groups, go to the Amazon Virtual Private Cloud User Guide.
	*
	* @param string $group_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function revoke_security_group_egress($group_id, $opt=null){}

	/**
	* The RevokeSecurityGroupIngress operation revokes permissions from a security group. The permissions used to revoke must be specified using the same values used to grant the permissions.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function revoke_security_group_ingress($opt=null){}

	/**
	* The RunInstances operation launches a specified number of instances.
	*
	* @param string $image_id
	* @param integer $min_count
	* @param integer $max_count
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function run_instances($image_id, $min_count, $max_count, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

	/**
	* Starts an instance that uses an Amazon EBS volume as its root device. Instances that use Amazon EBS volumes as their root devices can be quickly stopped and started. When an instance is stopped, the compute resources are released and you are not billed for hourly instance usage. However, your root partition Amazon EBS volume remains, continues to persist your data, and you are charged for Amazon EBS volume usage. You can restart your instance at any time.
	*
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function start_instances($instance_id, $opt=null){}

	/**
	* Stops an instance that uses an Amazon EBS volume as its root device. Instances that use Amazon EBS volumes as their root devices can be quickly stopped and started. When an instance is stopped, the compute resources are released and you are not billed for hourly instance usage. However, your root partition Amazon EBS volume remains, continues to persist your data, and you are charged for Amazon EBS volume usage. You can restart your instance at any time.
	*
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function stop_instances($instance_id, $opt=null){}

	/**
	* The TerminateInstances operation shuts down one or more instances. This operation is idempotent; if you terminate an instance more than once, each call will succeed.
	*
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function terminate_instances($instance_id, $opt=null){}

	/**
	* Disables monitoring for a running instance.
	*
	* @param string $instance_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function unmonitor_instances($instance_id, $opt=null){}

}
class EC2_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonElastiCache extends CFRuntime{
	/**
	* Authorizes ingress to a CacheSecurityGroup using EC2 Security Groups as authorization (therefore the application using the cache must be running on EC2 clusters). This API requires the following parameters: EC2SecurityGroupName and EC2SecurityGroupOwnerId.
	*
	* @param string $cache_security_group_name
	* @param string $ec2_security_group_name
	* @param string $ec2_security_group_owner_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function authorize_cache_security_group_ingress($cache_security_group_name, $ec2_security_group_name, $ec2_security_group_owner_id, $opt=null){}

	/**
	* Creates a new Cache Cluster.
	*
	* @param string $cache_cluster_id
	* @param integer $num_cache_nodes
	* @param string $cache_node_type
	* @param string $engine
	* @param string $cache_security_group_names
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_cache_cluster($cache_cluster_id, $num_cache_nodes, $cache_node_type, $engine, $cache_security_group_names, $opt=null){}

	/**
	* Creates a new Cache Parameter Group. Cache Parameter groups control the parameters for a Cache Cluster.
	*
	* @param string $cache_parameter_group_name
	* @param string $cache_parameter_group_family
	* @param string $description
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_cache_parameter_group($cache_parameter_group_name, $cache_parameter_group_family, $description, $opt=null){}

	/**
	* Creates a new Cache Security Group. Cache Security groups control access to one or more Cache Clusters.
	*
	* @param string $cache_security_group_name
	* @param string $description
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_cache_security_group($cache_security_group_name, $description, $opt=null){}

	/**
	* Deletes a previously provisioned Cache Cluster. A successful response from the web service indicates the request was received correctly.
	*
	* @param string $cache_cluster_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_cache_cluster($cache_cluster_id, $opt=null){}

	/**
	* This API deletes a particular CacheParameterGroup. The CacheParameterGroup cannot be deleted if it is associated with any cache clusters.
	*
	* @param string $cache_parameter_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_cache_parameter_group($cache_parameter_group_name, $opt=null){}

	/**
	* Deletes a Cache Security Group.
	*
	* @param string $cache_security_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_cache_security_group($cache_security_group_name, $opt=null){}

	/**
	* Returns information about all provisioned Cache Clusters if no Cache Cluster identifier is specified, or about a specific Cache Cluster if a Cache Cluster identifier is supplied.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_cache_clusters($opt=null){}

	/**
	* This API returns a list of CacheParameterGroup descriptions. If a CacheParameterGroupName is specified, the list will contain only the descriptions of the specified CacheParameterGroup.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_cache_parameter_groups($opt=null){}

	/**
	* Returns the detailed parameter list for a particular CacheParameterGroup.
	*
	* @param string $cache_parameter_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_cache_parameters($cache_parameter_group_name, $opt=null){}

	/**
	* Returns a list of CacheSecurityGroup descriptions. If a CacheSecurityGroupName is specified, the list will contain only the description of the specified CacheSecurityGroup.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_cache_security_groups($opt=null){}

	/**
	* This API returns the default engine and system parameter information for the specified cache engine.
	*
	* @param string $cache_parameter_group_family
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_engine_default_parameters($cache_parameter_group_family, $opt=null){}

	/**
	* This API returns events related to Cache Clusters, Cache Security Groups, and Cache Parameter Groups for the past 14 days. Events specific to a particular Cache Cluster, cache security group, or cache parameter group can be obtained by providing the name as a parameter. By default, the past hour of events are returned.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_events($opt=null){}

	/**
	* Modifies Cache Cluster settings. You can change one or more Cache Cluster configuration parameters by specifying the parameters and the new values in the request.
	*
	* @param string $cache_cluster_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function modify_cache_cluster($cache_cluster_id, $opt=null){}

	/**
	* This API modifies the parameters of a CacheParameterGroup. To modify more than one parameter submit a list of the following: ParameterName and ParameterValue. A maximum of 20 parameters can be modified in a single request.
	*
	* @param string $cache_parameter_group_name
	* @param array $parameter_name_values
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function modify_cache_parameter_group($cache_parameter_group_name, $parameter_name_values, $opt=null){}

	/**
	* The RebootCacheCluster API reboots some (or all) of the cache cluster nodes within a previously provisioned ElastiCache cluster. This API results in the application of modified CacheParameterGroup parameters to the cache cluster. This action is taken as soon as possible, and results in a momentary outage to the cache cluster during which the cache cluster status is set to rebooting. During that momentary outage the contents of the cache (for each cache cluster node being rebooted) are lost. A CacheCluster event is created when the reboot is completed.
	*
	* @param string $cache_cluster_id
	* @param string $cache_node_ids_to_reboot
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function reboot_cache_cluster($cache_cluster_id, $cache_node_ids_to_reboot, $opt=null){}

	/**
	* This API modifies the parameters of a CacheParameterGroup to the engine/system default value. To reset specific parameters submit a list of the parameter names. To reset the entire CacheParameterGroup specify the CacheParameterGroup name and ResetAllParameters parameters.
	*
	* @param string $cache_parameter_group_name
	* @param array $parameter_name_values
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function reset_cache_parameter_group($cache_parameter_group_name, $parameter_name_values, $opt=null){}

	/**
	* Revokes ingress from a CacheSecurityGroup for previously authorized EC2 Security Groups.
	*
	* @param string $cache_security_group_name
	* @param string $ec2_security_group_name
	* @param string $ec2_security_group_owner_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function revoke_cache_security_group_ingress($cache_security_group_name, $ec2_security_group_name, $ec2_security_group_owner_id, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

}
class ElastiCache_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonElasticBeanstalk extends CFRuntime{
	/**
	* Checks if the specified CNAME is available.
	*
	* @param string $cname_prefix
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function check_dns_availability($cname_prefix, $opt=null){}

	/**
	* Creates an application that has one configuration template named <code>default</code> and no application versions.
	*
	* @param string $application_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_application($application_name, $opt=null){}

	/**
	* Creates an application version for the specified application.
	*
	* @param string $application_name
	* @param string $version_label
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_application_version($application_name, $version_label, $opt=null){}

	/**
	* Creates a configuration template. Templates are associated with a specific application and are used to deploy different versions of the application with the same configuration settings.
	*
	* @param string $application_name
	* @param string $template_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_configuration_template($application_name, $template_name, $opt=null){}

	/**
	* Launches an environment for the specified application using the specified configuration.
	*
	* @param string $application_name
	* @param string $environment_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_environment($application_name, $environment_name, $opt=null){}

	/**
	* Creates the Amazon S3 storage location for the account.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_storage_location($opt=null){}

	/**
	* Deletes the specified application along with all associated versions and configurations.
	*
	* @param string $application_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_application($application_name, $opt=null){}

	/**
	* Deletes the specified version from the specified application.
	*
	* @param string $application_name
	* @param string $version_label
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_application_version($application_name, $version_label, $opt=null){}

	/**
	* Deletes the specified configuration template.
	*
	* @param string $application_name
	* @param string $template_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_configuration_template($application_name, $template_name, $opt=null){}

	/**
	* Deletes the draft configuration associated with the running environment.
	*
	* @param string $application_name
	* @param string $environment_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_environment_configuration($application_name, $environment_name, $opt=null){}

	/**
	* Returns descriptions for existing application versions.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_application_versions($opt=null){}

	/**
	* Returns the descriptions of existing applications.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_applications($opt=null){}

	/**
	* Describes the configuration options that are used in a particular configuration template or environment, or that a specified solution stack defines. The description includes the values the options, their default values, and an indication of the required action on a running environment if an option value is changed.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_configuration_options($opt=null){}

	/**
	* Returns a description of the settings for the specified configuration set, that is, either a configuration template or the configuration set associated with a running environment.
	*
	* @param string $application_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_configuration_settings($application_name, $opt=null){}

	/**
	* Returns AWS resources for this environment.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_environment_resources($opt=null){}

	/**
	* Returns descriptions for existing environments.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_environments($opt=null){}

	/**
	* Returns list of event descriptions matching criteria up to the last 6 weeks.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_events($opt=null){}

	/**
	* Returns a list of the available solution stack names.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_available_solution_stacks($opt=null){}

	/**
	* Deletes and recreates all of the AWS resources (for example: the Auto Scaling group, load balancer, etc.) for a specified environment and forces a restart.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function rebuild_environment($opt=null){}

	/**
	* Initiates a request to compile the specified type of information of the deployed environment.
	*
	* @param string $info_type
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function request_environment_info($info_type, $opt=null){}

	/**
	* Causes the environment to restart the application container server running on each Amazon EC2 instance.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function restart_app_server($opt=null){}

	/**
	* Retrieves the compiled information from a RequestEnvironmentInfo request.
	*
	* @param string $info_type
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function retrieve_environment_info($info_type, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

	/**
	* Swaps the CNAMEs of two environments.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function swap_environment_cnames($opt=null){}

	/**
	* Terminates the specified environment.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function terminate_environment($opt=null){}

	/**
	* Updates the specified application to have the specified properties.
	*
	* @param string $application_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_application($application_name, $opt=null){}

	/**
	* Updates the specified application version to have the specified properties.
	*
	* @param string $application_name
	* @param string $version_label
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_application_version($application_name, $version_label, $opt=null){}

	/**
	* Updates the specified configuration template to have the specified properties or configuration option values.
	*
	* @param string $application_name
	* @param string $template_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_configuration_template($application_name, $template_name, $opt=null){}

	/**
	* Updates the environment description, deploys a new application version, updates the configuration settings to an entirely new configuration template, or updates select configuration option values in the running environment.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_environment($opt=null){}

	/**
	* Takes a set of configuration settings and either a configuration template or environment, and determines whether those values are valid.
	*
	* @param string $application_name
	* @param array $option_settings
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function validate_configuration_settings($application_name, $option_settings, $opt=null){}

}
class ElasticBeanstalk_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonELB extends CFRuntime{
	/**
	* Enables the client to define an application healthcheck for the instances.
	*
	* @param string $load_balancer_name
	* @param array $health_check
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function configure_health_check($load_balancer_name, $health_check, $opt=null){}

	/**
	* Generates a stickiness policy with sticky session lifetimes that follow that of an application-generated cookie. This policy can be associated only with HTTP/HTTPS listeners.
	*
	* @param string $load_balancer_name
	* @param string $policy_name
	* @param string $cookie_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_app_cookie_stickiness_policy($load_balancer_name, $policy_name, $cookie_name, $opt=null){}

	/**
	* Generates a stickiness policy with sticky session lifetimes controlled by the lifetime of the browser (user-agent) or a specified expiration period. This policy can be associated only with HTTP/HTTPS listeners.
	*
	* @param string $load_balancer_name
	* @param string $policy_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_lb_cookie_stickiness_policy($load_balancer_name, $policy_name, $opt=null){}

	/**
	* Creates a new LoadBalancer.
	*
	* @param string $load_balancer_name
	* @param array $listeners
	* @param string $availability_zones
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_load_balancer($load_balancer_name, $listeners, $availability_zones, $opt=null){}

	/**
	* Creates one or more listeners on a LoadBalancer for the specified port. If a listener with the given port does not already exist, it will be created; otherwise, the properties of the new listener must match the properties of the existing listener.
	*
	* @param string $load_balancer_name
	* @param array $listeners
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_load_balancer_listeners($load_balancer_name, $listeners, $opt=null){}

	/**
	* Deletes the specified LoadBalancer.
	*
	* @param string $load_balancer_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_load_balancer($load_balancer_name, $opt=null){}

	/**
	* Deletes listeners from the LoadBalancer for the specified port.
	*
	* @param string $load_balancer_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_load_balancer_listeners($load_balancer_name, $load_balancer_ports, $opt=null){}

	/**
	* Deletes a policy from the LoadBalancer. The specified policy must not be enabled for any listeners.
	*
	* @param string $load_balancer_name
	* @param string $policy_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_load_balancer_policy($load_balancer_name, $policy_name, $opt=null){}

	/**
	* Deregisters instances from the LoadBalancer. Once the instance is deregistered, it will stop receiving traffic from the LoadBalancer.
	*
	* @param string $load_balancer_name
	* @param array $instances
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function deregister_instances_from_load_balancer($load_balancer_name, $instances, $opt=null){}

	/**
	* Returns the current state of the instances of the specified LoadBalancer. If no instances are specified, the state of all the instances for the LoadBalancer is returned.
	*
	* @param string $load_balancer_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_instance_health($load_balancer_name, $opt=null){}

	/**
	* Returns detailed configuration information for the specified LoadBalancers. If no LoadBalancers are specified, the operation returns configuration information for all LoadBalancers created by the caller.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_load_balancers($opt=null){}

	/**
	* Removes the specified EC2 Availability Zones from the set of configured Availability Zones for the LoadBalancer.
	*
	* @param string $load_balancer_name
	* @param string $availability_zones
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function disable_availability_zones_for_load_balancer($load_balancer_name, $availability_zones, $opt=null){}

	/**
	* Adds one or more EC2 Availability Zones to the LoadBalancer.
	*
	* @param string $load_balancer_name
	* @param string $availability_zones
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function enable_availability_zones_for_load_balancer($load_balancer_name, $availability_zones, $opt=null){}

	/**
	* Adds new instances to the LoadBalancer.
	*
	* @param string $load_balancer_name
	* @param array $instances
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function register_instances_with_load_balancer($load_balancer_name, $instances, $opt=null){}

	/**
	* Sets the certificate that terminates the specified listener's SSL connections. The specified certificate replaces any prior certificate that was used on the same LoadBalancer and port.
	*
	* @param string $load_balancer_name
	* @param integer $load_balancer_port
	* @param string $ssl_certificate_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_load_balancer_listener_ssl_certificate($load_balancer_name, $load_balancer_port, $ssl_certificate_id, $opt=null){}

	/**
	* Associates, updates, or disables a policy with a listener on the load balancer. Currently only zero (0) or one (1) policy can be associated with a listener.
	*
	* @param string $load_balancer_name
	* @param integer $load_balancer_port
	* @param string $policy_names
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_load_balancer_policies_of_listener($load_balancer_name, $load_balancer_port, $policy_names, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

}
class ELB_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonEMR extends CFRuntime{
	/**
	* AddInstanceGroups adds an instance group to a running cluster.
	*
	* @param array $instance_groups
	* @param string $job_flow_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function add_instance_groups($instance_groups, $job_flow_id, $opt=null){}

	/**
	* AddJobFlowSteps adds new steps to a running job flow. A maximum of 256 steps are allowed in each job flow.
	*
	* @param string $job_flow_id
	* @param array $steps
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function add_job_flow_steps($job_flow_id, $steps, $opt=null){}

	/**
	* DescribeJobFlows returns a list of job flows that match all of the supplied parameters. The parameters can include a list of job flow IDs, job flow states, and restrictions on job flow creation date and time.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_job_flows($opt=null){}

	/**
	* ModifyInstanceGroups modifies the number of nodes and configuration settings of an instance group. The input parameters include the new target instance count for the group and the instance group ID. The call will either succeed or fail atomically.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function modify_instance_groups($opt=null){}

	/**
	* RunJobFlow creates and starts running a new job flow. The job flow will run the steps specified. Once the job flow completes, the cluster is stopped and the HDFS partition is lost. To prevent loss of data, configure the last step of the job flow to store results in Amazon S3.
	*
	* @param string $name
	* @param array $instances
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function run_job_flow($name, $instances, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

	/**
	* SetTerminationProtection locks a job flow so the Amazon EC2 instances in the cluster cannot be terminated by user intervention, an API call, or in the event of a job-flow error. The cluster still terminates upon successful completion of the job flow. Calling SetTerminationProtection on a job flow is analogous to calling the Amazon EC2 DisableAPITermination API on all of the EC2 instances in a cluster.
	*
	* @param string $job_flow_ids
	* @param boolean $termination_protected
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_termination_protection($job_flow_ids, $termination_protected, $opt=null){}

	/**
	* TerminateJobFlows shuts a list of job flows down. When a job flow is shut down, any step not yet completed is canceled and the EC2 instances on which the job flow is running are stopped. Any log files not already saved are uploaded to Amazon S3 if a LogUri was specified when the job flow was created.
	*
	* @param string $job_flow_ids
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function terminate_job_flows($job_flow_ids, $opt=null){}

}
class EMR_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonIAM extends CFRuntime{
	/**
	* Adds the specified User to the specified group.
	*
	* @param string $group_name
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function add_user_to_group($group_name, $user_name, $opt=null){}

	/**
	* Creates a new AWS Secret Access Key and corresponding AWS Access Key ID for the specified User. The default status for new keys is <code>Active</code>.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_access_key($opt=null){}

	/**
	* This action creates an alias for your AWS Account. For information about using an AWS Account alias, see <a href="http://docs.amazonwebservices.com/IAM/latest/UserGuide/AccountAlias.html">Using an Alias for Your AWS Account ID</a> in <i>Using AWS Identity and Access Management</i>.
	*
	* @param string $account_alias
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_account_alias($account_alias, $opt=null){}

	/**
	* Creates a new group.
	*
	* @param string $group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_group($group_name, $opt=null){}

	/**
	* Creates a login profile for the specified User, giving the User the ability to access AWS services such as the AWS Management Console. For more information about login profiles, see <a href="http://docs.amazonwebservices.com/IAM/latest/UserGuide/index.html?Using_ManagingLoginsAndMFA.html">Managing Login Profiles and MFA Devices</a> in <i>Using AWS Identity and Access Management</i>.
	*
	* @param string $user_name
	* @param string $password
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_login_profile($user_name, $password, $opt=null){}

	/**
	* Creates a new User for your AWS Account.
	*
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_user($user_name, $opt=null){}

	/**
	* Deactivates the specified MFA device and removes it from association with the User name for which it was originally enabled.
	*
	* @param string $user_name
	* @param string $serial_number
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function deactivate_mfa_device($user_name, $serial_number, $opt=null){}

	/**
	* Deletes the access key associated with the specified User.
	*
	* @param string $access_key_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_access_key($access_key_id, $opt=null){}

	/**
	* Deletes the specified AWS Account alias. For information about using an AWS Account alias, see <a href="http://docs.amazonwebservices.com/IAM/latest/UserGuide/AccountAlias.html">Using an Alias for Your AWS Account ID</a> in <i>Using AWS Identity and Access Management</i>.
	*
	* @param string $account_alias
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_account_alias($account_alias, $opt=null){}

	/**
	* Deletes the specified group. The group must not contain any Users or have any attached policies.
	*
	* @param string $group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_group($group_name, $opt=null){}

	/**
	* Deletes the specified policy that is associated with the specified group.
	*
	* @param string $group_name
	* @param string $policy_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_group_policy($group_name, $policy_name, $opt=null){}

	/**
	* Deletes the login profile for the specified User, which terminates the User's ability to access AWS services through the IAM login page.
	*
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_login_profile($user_name, $opt=null){}

	/**
	* Deletes the specified server certificate.
	*
	* @param string $server_certificate_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_server_certificate($server_certificate_name, $opt=null){}

	/**
	* Deletes the specified signing certificate associated with the specified User.
	*
	* @param string $certificate_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_signing_certificate($certificate_id, $opt=null){}

	/**
	* Deletes the specified User. The User must not belong to any groups, have any keys or signing certificates, or have any attached policies.
	*
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_user($user_name, $opt=null){}

	/**
	* Deletes the specified policy associated with the specified User.
	*
	* @param string $user_name
	* @param string $policy_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_user_policy($user_name, $policy_name, $opt=null){}

	/**
	* Enables the specified MFA device and associates it with the specified User name. When enabled, the MFA device is required for every subsequent login by the User name associated with the device.
	*
	* @param string $user_name
	* @param string $serial_number
	* @param string $authentication_code1
	* @param string $authentication_code2
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function enable_mfa_device($user_name, $serial_number, $authentication_code1, $authentication_code2, $opt=null){}

	/**
	* Retrieves account level information about account entity usage and IAM quotas.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_account_summary($opt=null){}

	/**
	* Returns a list of Users that are in the specified group. You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters.
	*
	* @param string $group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_group($group_name, $opt=null){}

	/**
	* Retrieves the specified policy document for the specified group. The returned policy is URL-encoded according to RFC 3986. For more information about RFC 3986, go to <a href="http://www.faqs.org/rfcs/rfc3986.html">http://www.faqs.org/rfcs/rfc3986.html</a>.
	*
	* @param string $group_name
	* @param string $policy_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_group_policy($group_name, $policy_name, $opt=null){}

	/**
	* Retrieves the login profile for the specified User.
	*
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_login_profile($user_name, $opt=null){}

	/**
	* Retrieves information about the specified server certificate.
	*
	* @param string $server_certificate_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_server_certificate($server_certificate_name, $opt=null){}

	/**
	* Retrieves information about the specified User, including the User's path, GUID, and ARN.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_user($opt=null){}

	/**
	* Retrieves the specified policy document for the specified User. The returned policy is URL-encoded according to RFC 3986. For more information about RFC 3986, go to <a href="http://www.faqs.org/rfcs/rfc3986.html">http://www.faqs.org/rfcs/rfc3986.html</a>.
	*
	* @param string $user_name
	* @param string $policy_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_user_policy($user_name, $policy_name, $opt=null){}

	/**
	* Returns information about the Access Key IDs associated with the specified User. If there are none, the action returns an empty list.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_access_keys($opt=null){}

	/**
	* Lists the account aliases associated with the account. For information about using an AWS Account alias, see <a href="http://docs.amazonwebservices.com/IAM/latest/UserGuide/AccountAlias.html">Using an Alias for Your AWS Account ID</a> in <i>Using AWS Identity and Access Management</i>.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_account_aliases($opt=null){}

	/**
	* Lists the names of the policies associated with the specified group. If there are none, the action returns an empty list.
	*
	* @param string $group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_group_policies($group_name, $opt=null){}

	/**
	* Lists the groups that have the specified path prefix.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_groups($opt=null){}

	/**
	* Lists the groups the specified User belongs to.
	*
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_groups_for_user($user_name, $opt=null){}

	/**
	* Lists the MFA devices associated with the specified User name.
	*
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_mfa_devices($user_name, $opt=null){}

	/**
	* Lists the server certificates that have the specified path prefix. If none exist, the action returns an empty list.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_server_certificates($opt=null){}

	/**
	* Returns information about the signing certificates associated with the specified User. If there are none, the action returns an empty list.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_signing_certificates($opt=null){}

	/**
	* Lists the names of the policies associated with the specified User. If there are none, the action returns an empty list.
	*
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_user_policies($user_name, $opt=null){}

	/**
	* Lists the Users that have the specified path prefix. If there are none, the action returns an empty list.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_users($opt=null){}

	/**
	* Adds (or updates) a policy document associated with the specified group. For information about policies, refer to <a href="http://docs.amazonwebservices.com/IAM/latest/UserGuide/index.html?PoliciesOverview.html">Overview of Policies</a> in <i>Using AWS Identity and Access Management</i>.
	*
	* @param string $group_name
	* @param string $policy_name
	* @param string $policy_document
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function put_group_policy($group_name, $policy_name, $policy_document, $opt=null){}

	/**
	* Adds (or updates) a policy document associated with the specified User. For information about policies, refer to <a href="http://docs.amazonwebservices.com/IAM/latest/UserGuide/index.html?PoliciesOverview.html">Overview of Policies</a> in <i>Using AWS Identity and Access Management</i>.
	*
	* @param string $user_name
	* @param string $policy_name
	* @param string $policy_document
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function put_user_policy($user_name, $policy_name, $policy_document, $opt=null){}

	/**
	* Removes the specified User from the specified group.
	*
	* @param string $group_name
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function remove_user_from_group($group_name, $user_name, $opt=null){}

	/**
	* Synchronizes the specified MFA device with AWS servers.
	*
	* @param string $user_name
	* @param string $serial_number
	* @param string $authentication_code1
	* @param string $authentication_code2
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function resync_mfa_device($user_name, $serial_number, $authentication_code1, $authentication_code2, $opt=null){}

	/**
	* Changes the status of the specified access key from Active to Inactive, or vice versa. This action can be used to disable a User's key as part of a key rotation workflow.
	*
	* @param string $access_key_id
	* @param string $status
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_access_key($access_key_id, $status, $opt=null){}

	/**
	* Updates the name and/or the path of the specified group.
	*
	* @param string $group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_group($group_name, $opt=null){}

	/**
	* Updates the login profile for the specified User. Use this API to change the User's password.
	*
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_login_profile($user_name, $opt=null){}

	/**
	* Updates the name and/or the path of the specified server certificate.
	*
	* @param string $server_certificate_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_server_certificate($server_certificate_name, $opt=null){}

	/**
	* Changes the status of the specified signing certificate from active to disabled, or vice versa. This action can be used to disable a User's signing certificate as part of a certificate rotation workflow.
	*
	* @param string $certificate_id
	* @param string $status
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_signing_certificate($certificate_id, $status, $opt=null){}

	/**
	* Updates the name and/or the path of the specified User.
	*
	* @param string $user_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_user($user_name, $opt=null){}

	/**
	* Uploads a server certificate entity for the AWS Account. The server certificate entity includes a public key certificate, a private key, and an optional certificate chain, which should all be PEM-encoded.
	*
	* @param string $server_certificate_name
	* @param string $certificate_body
	* @param string $private_key
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function upload_server_certificate($server_certificate_name, $certificate_body, $private_key, $opt=null){}

	/**
	* Uploads an X.509 signing certificate and associates it with the specified User. Some AWS services use X.509 signing certificates to validate requests that are signed with a corresponding private key. When you upload the certificate, its default status is <code>Active</code>.
	*
	* @param string $certificate_body
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function upload_signing_certificate($certificate_body, $opt=null){}

}
class IAM_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonImportExport extends CFRuntime{
	/**
	* This operation cancels a specified job. Only the job owner can cancel it. The operation fails if the job has already started or is complete.
	*
	* @param string $job_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function cancel_job($job_id, $opt=null){}

	/**
	* This operation initiates the process of scheduling an upload or download of your data. You include in the request a manifest that describes the data transfer specifics. The response to the request includes a job ID, which you can use in other operations, a signature that you use to identify your storage device, and the address where you should ship your storage device.
	*
	* @param string $job_type
	* @param string $manifest
	* @param boolean $validate_only
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_job($job_type, $manifest, $validate_only, $opt=null){}

	/**
	* This operation returns information about a job, including where the job is in the processing pipeline, the status of the results, and the signature value associated with the job. You can only return information about jobs you own.
	*
	* @param string $job_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_status($job_id, $opt=null){}

	/**
	* This operation returns the jobs associated with the requester. AWS Import/Export lists the jobs in reverse chronological order based on the date of creation. For example if Job Test1 was created 2009Dec30 and Test2 was created 2010Feb05, the ListJobs operation would return Test2 followed by Test1.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_jobs($opt=null){}

	/**
	* You use this operation to change the parameters specified in the original manifest file by supplying a new manifest file. The manifest file attached to this request replaces the original manifest file. You can only use the operation after a CreateJob request but before the data transfer starts and you can only use it on jobs you own.
	*
	* @param string $job_id
	* @param string $manifest
	* @param string $job_type
	* @param boolean $validate_only
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_job($job_id, $manifest, $job_type, $validate_only, $opt=null){}

}
class ImportExport_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonRDS extends CFRuntime{
	/**
	* Enables ingress to a DBSecurityGroup using one of two forms of authorization. First, EC2 Security Groups can be added to the DBSecurityGroup if the application using the database is running on EC2 instances. Second, IP ranges are available if the application accessing your database is running on the Internet. Required parameters for this API are one of CIDR range or (EC2SecurityGroupName AND EC2SecurityGroupOwnerId).
	*
	* @param string $db_security_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function authorize_db_security_group_ingress($db_security_group_name, $opt=null){}

	/**
	* Creates a new DB instance.
	*
	* @param string $db_instance_identifier
	* @param integer $allocated_storage
	* @param string $db_instance_class
	* @param string $engine
	* @param string $master_username
	* @param string $master_user_password
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_db_instance($db_instance_identifier, $allocated_storage, $db_instance_class, $engine, $master_username, $master_user_password, $opt=null){}

	/**
	* Creates a DB Instance that acts as a Read Replica of a source DB Instance.
	*
	* @param string $db_instance_identifier
	* @param string $source_db_instance_identifier
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_db_instance_read_replica($db_instance_identifier, $source_db_instance_identifier, $opt=null){}

	/**
	* Creates a new database parameter group.
	*
	* @param string $db_parameter_group_name
	* @param string $db_parameter_group_family
	* @param string $description
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_db_parameter_group($db_parameter_group_name, $db_parameter_group_family, $description, $opt=null){}

	/**
	* Creates a new database security group. Database Security groups control access to a database instance.
	*
	* @param string $db_security_group_name
	* @param string $db_security_group_description
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_db_security_group($db_security_group_name, $db_security_group_description, $opt=null){}

	/**
	* Creates a DBSnapshot. The source DBInstance must be in "available" state.
	*
	* @param string $db_snapshot_identifier
	* @param string $db_instance_identifier
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_db_snapshot($db_snapshot_identifier, $db_instance_identifier, $opt=null){}

	/**
	* The DeleteDBInstance API deletes a previously provisioned RDS instance. A successful response from the web service indicates the request was received correctly. If a final DBSnapshot is requested the status of the RDS instance will be "deleting" until the DBSnapshot is created. DescribeDBInstance is used to monitor the status of this operation. This cannot be canceled or reverted once submitted.
	*
	* @param string $db_instance_identifier
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_db_instance($db_instance_identifier, $opt=null){}

	/**
	* Deletes a specified DBParameterGroup. The DBParameterGroup cannot be associated with any RDS instances to be deleted.
	*
	* @param string $db_parameter_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_db_parameter_group($db_parameter_group_name, $opt=null){}

	/**
	* Deletes a database security group.
	*
	* @param string $db_security_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_db_security_group($db_security_group_name, $opt=null){}

	/**
	* Deletes a DBSnapshot.
	*
	* @param string $db_snapshot_identifier
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_db_snapshot($db_snapshot_identifier, $opt=null){}

	/**
	* Returns a list of the available DB engines.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_db_engine_versions($opt=null){}

	/**
	* Returns information about provisioned RDS instances. This API supports pagination.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_db_instances($opt=null){}

	/**
	* Returns a list of DBParameterGroup descriptions. If a DBParameterGroupName is specified, the list will contain only the descriptions of the specified DBParameterGroup.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_db_parameter_groups($opt=null){}

	/**
	* Returns the detailed parameter list for a particular DBParameterGroup.
	*
	* @param string $db_parameter_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_db_parameters($db_parameter_group_name, $opt=null){}

	/**
	* Returns a list of DBSecurityGroup descriptions. If a DBSecurityGroupName is specified, the list will contain only the descriptions of the specified DBSecurityGroup.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_db_security_groups($opt=null){}

	/**
	* Returns information about DBSnapshots. This API supports pagination.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_db_snapshots($opt=null){}

	/**
	* Returns the default engine and system parameter information for the specified database engine.
	*
	* @param string $db_parameter_group_family
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_engine_default_parameters($db_parameter_group_family, $opt=null){}

	/**
	* Returns events related to DB Instances, DB Security Groups, DB Snapshots and DB Parameter Groups for the past 14 days. Events specific to a particular DB Instance, database security group, database snapshot or database parameter group can be obtained by providing the name as a parameter. By default, the past hour of events are returned.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_events($opt=null){}

	/**
	* Returns a list of orderable DB Instance options for the specified engine.
	*
	* @param string $engine
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_orderable_db_instance_options($engine, $opt=null){}

	/**
	* Returns information about reserved DB Instances for this account, or about a specified reserved DB Instance.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_reserved_db_instances($opt=null){}

	/**
	* Lists available reserved DB Instance offerings.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function describe_reserved_db_instances_offerings($opt=null){}

	/**
	* Modify settings for a DB Instance. You can change one or more database configuration parameters by specifying these parameters and the new values in the request.
	*
	* @param string $db_instance_identifier
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function modify_db_instance($db_instance_identifier, $opt=null){}

	/**
	* Modifies the parameters of a DBParameterGroup. To modify more than one parameter submit a list of the following: ParameterName, ParameterValue, and ApplyMethod. A maximum of 20 parameters can be modified in a single request.
	*
	* @param string $db_parameter_group_name
	* @param array $parameters
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function modify_db_parameter_group($db_parameter_group_name, $parameters, $opt=null){}

	/**
	* Purchases a reserved DB Instance offering.
	*
	* @param string $reserved_db_instances_offering_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function purchase_reserved_db_instances_offering($reserved_db_instances_offering_id, $opt=null){}

	/**
	* Reboots a previously provisioned RDS instance. This API results in the application of modified DBParameterGroup parameters with ApplyStatus of pending-reboot to the RDS instance. This action is taken as soon as possible, and results in a momentary outage to the RDS instance during which the RDS instance status is set to rebooting. A DBInstance event is created when the reboot is completed.
	*
	* @param string $db_instance_identifier
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function reboot_db_instance($db_instance_identifier, $opt=null){}

	/**
	* Modifies the parameters of a DBParameterGroup to the engine/system default value. To reset specific parameters submit a list of the following: ParameterName and ApplyMethod. To reset the entire DBParameterGroup specify the DBParameterGroup name and ResetAllParameters parameters. When resetting the entire group, dynamic parameters are updated immediately and static parameters are set to pending-reboot to take effect on the next DB instance restart or RebootDBInstance request.
	*
	* @param string $db_parameter_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function reset_db_parameter_group($db_parameter_group_name, $opt=null){}

	/**
	* Restores a DB Instance to an arbitrary point-in-time. Users can restore to any point in time before the latestRestorableTime for up to backupRetentionPeriod days. The target database is created from the source database with the same configuration as the original database except that the DB instance is created with the default DB security group.
	*
	* @param string $db_instance_identifier
	* @param string $db_snapshot_identifier
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function restore_db_instance_from_db_snapshot($db_instance_identifier, $db_snapshot_identifier, $opt=null){}

	/**
	* Creates a new DB Instance from a point-in-time system snapshot. The target database is created from the source database restore point with the same configuration as the original source database, except that the new RDS instance is created with the default security group.
	*
	* @param string $source_db_instance_identifier
	* @param string $target_db_instance_identifier
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function restore_db_instance_to_point_in_time($source_db_instance_identifier, $target_db_instance_identifier, $opt=null){}

	/**
	* Revokes ingress from a DBSecurityGroup for previously authorized IP ranges or EC2 Security Groups. Required parameters for this API are one of CIDRIP or (EC2SecurityGroupName AND EC2SecurityGroupOwnerId).
	*
	* @param string $db_security_group_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function revoke_db_security_group_ingress($db_security_group_name, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

}
class RDS_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class S3_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonS3 extends CFRuntime{
	/** 
	* The base XML elements to use for access control policy methods.
	*/
	var $base_acp_xml = null;
	/** 
	* The base XML elements to use for creating buckets in regions.
	*/
	var $base_location_constraint = null;
	/** 
	* The base XML elements to use for logging methods.
	*/
	var $base_logging_xml = null;
	/** 
	* The base XML elements to use for notifications.
	*/
	var $base_notification_xml = null;
	/** 
	* The base XML elements to use for versioning.
	*/
	var $base_versioning_xml = null;
	/** 
	* The base XML elements to use for completing a multipart upload.
	*/
	var $complete_mpu_xml = null;
	/** 
	* The DNS vs. Path-style setting.
	*/
	var $path_style = false;
	/** 
	* The request URL.
	*/
	var $request_url = null;
	/** 
	* The state of whether the prefix change is temporary or permanent.
	*/
	var $temporary_prefix = false;
	/** 
	* The virtual host setting.
	*/
	var $vhost = null;
	/** 
	* The base XML elements to use for website support.
	*/
	var $website_config_xml = null;
	/**
	* Aborts an in-progress multipart upload. This operation cannot be reversed.
	*
	* @param string $bucket
	* @param string $filename
	* @param string $upload_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function abort_multipart_upload($bucket, $filename, $upload_id, $opt=null){}

	/**
	* Aborts all multipart uploads initiated before the specified date. This operation cannot be reversed.
	*
	* @param string $bucket
	* @param string $when
	*
	* @return \CFArray
	*/
	public function abort_multipart_uploads_by_date($bucket, $when=null){}

	/**
	* Changes the content type for an existing Amazon S3 object.
	*
	* @param string $bucket
	* @param string $filename
	* @param string $contentType
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function change_content_type($bucket, $filename, $contentType, $opt=null){}

	/**
	* Changes the storage redundancy for an existing object.
	*
	* @param string $bucket
	* @param string $filename
	* @param string $storage
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function change_storage_redundancy($bucket, $filename, $storage, $opt=null){}

	/**
	* Completes an in-progress multipart upload. A multipart upload is completed by describing the part numbers and corresponding ETag values in order, and submitting that data to Amazon S3 as an XML document.
	*
	* @param string $bucket
	* @param string $filename
	* @param string $upload_id
	* @param string $parts
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function complete_multipart_upload($bucket, $filename, $upload_id, $parts, $opt=null){}

	/**
	* Copies an Amazon S3 object to a new location, whether in the same Amazon S3 region, bucket, or otherwise.
	*
	* @param array $source
	* @param array $dest
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function copy_object($source, $dest, $opt=null){}

	/**
	* Since Amazon S3's standard <copy_object()> operation only supports copying objects that are smaller than 5 GB, the ability to copy large objects (greater than 5 GB) requires the use of "Multipart Copy".
	*
	* @param array $source
	* @param array $dest
	* @param string $upload_id
	* @param integer $part_number
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function copy_part($source, $dest, $upload_id, $part_number, $opt=null){}

	/**
	* Creates an Amazon S3 bucket.
	*
	* @param string $bucket
	* @param string $region
	* @param string $acl
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_bucket($bucket, $region, $acl="private", $opt=null){}

	/**
	* Enables notifications of specified events for an Amazon S3 bucket. Currently, the `s3:ReducedRedundancyLostObject` event is the only event supported for notifications. The `s3:ReducedRedundancyLostObject` event is triggered when Amazon S3 detects that it has lost all copies of an Amazon S3 object and can no longer service requests for that object.
	*
	* @param string $bucket
	* @param string $topic_arn
	* @param string $event
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_bucket_notification($bucket, $topic_arn, $event, $opt=null){}

	/**
	* Creates an Amazon S3 object using the multipart upload APIs. It is analogous to <create_object()>.
	*
	* @param string $bucket
	* @param string $filename
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_mpu_object($bucket, $filename, $opt=null){}

	/**
	* Creates an Amazon S3 object. After an Amazon S3 bucket is created, objects can be stored in it.
	*
	* @param string $bucket
	* @param string $filename
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_object($bucket, $filename, $opt=null){}

	/**
	* Enables and configures an Amazon S3 website using the corresponding bucket as the content source.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_website_config($bucket, $opt=null){}

	/**
	* Deletes all of the versions of all Amazon S3 objects inside the specified bucket.
	*
	* @param string $bucket
	* @param string $pcre
	*
	* @return boolean
	*/
	public function delete_all_object_versions($bucket, $pcre=null){}

	/**
	* Deletes all Amazon S3 objects inside the specified bucket.
	*
	* @param string $bucket
	* @param string $pcre
	*
	* @return boolean
	*/
	public function delete_all_objects($bucket, $pcre="/.*/i"){}

	/**
	* Deletes a bucket from an Amazon S3 account. A bucket must be empty before the bucket itself can be deleted.
	*
	* @param string $bucket
	* @param boolean $force
	* @param array $opt
	*
	* @return mixed
	*/
	public function delete_bucket($bucket, $force=false, $opt=null){}

	/**
	* Empties the list of SNS topics to send notifications to.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_bucket_notification($bucket, $opt=null){}

	/**
	* Deletes the bucket policy for the specified Amazon S3 bucket. To delete the policy, the caller must be the bucket owner and have `DeletePolicy` permissions for the specified bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_bucket_policy($bucket, $opt=null){}

	/**
	* Deletes an Amazon S3 object from the specified bucket.
	*
	* @param string $bucket
	* @param string $filename
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_object($bucket, $filename, $opt=null){}

	/**
	* Removes the website configuration for a bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_website_config($bucket, $opt=null){}

	/**
	* Disables access logging for the specified Amazon S3 bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function disable_logging($bucket, $opt=null){}

	/**
	* Disables versioning support for the specified Amazon S3 bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function disable_versioning($bucket, $opt=null){}

	/**
	* Enables access logging for the specified Amazon S3 bucket.
	*
	* @param string $bucket
	* @param string $target_bucket
	* @param string $target_prefix
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function enable_logging($bucket, $target_bucket, $target_prefix, $opt=null){}

	/**
	* Enables the use of the older path-style URI access for all requests.
	*
	* @param string $style
	*
	* @return $this
	*/
	public function enable_path_style($style=true){}

	/**
	* Enables versioning support for the specified Amazon S3 bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function enable_versioning($bucket, $opt=null){}

	/**
	* Generates the XML to be used for the Access Control Policy.
	*
	* @param string $canonical_id
	* @param string $canonical_name
	* @param array $users
	*
	* @return string
	*/
	public function generate_access_policy($canonical_id, $canonical_name, $users){}

	/**
	* Gets the access control list (ACL) settings for the specified Amazon S3 bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_bucket_acl($bucket, $opt=null){}

	/**
	* Gets the cumulative file size of the contents of the Amazon S3 bucket.
	*
	* @param string $bucket
	* @param boolean $friendly_format
	*
	* @return integer|string
	*/
	public function get_bucket_filesize($bucket, $friendly_format=false){}

	/**
	* Gets the HTTP headers for the specified Amazon S3 bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_bucket_headers($bucket, $opt=null){}

	/**
	* Gets a simplified list of bucket names on an Amazon S3 account.
	*
	* @param string $pcre
	*
	* @return array
	*/
	public function get_bucket_list($pcre=null){}

	/**
	* Gets the notification configuration of a bucket. Currently, the `s3:ReducedRedundancyLostObject` event is the only event supported for notifications. The `s3:ReducedRedundancyLostObject` event is triggered when Amazon S3 detects that it has lost all replicas of a Reduced Redundancy Storage object and can no longer service requests for that object.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_bucket_notifications($bucket, $opt=null){}

	/**
	* Gets the number of Amazon S3 objects in the specified bucket.
	*
	* @param string $bucket
	*
	* @return integer
	*/
	public function get_bucket_object_count($bucket){}

	/**
	* Gets the policy of the specified Amazon S3 bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_bucket_policy($bucket, $opt=null){}

	/**
	* Gets the region in which the specified Amazon S3 bucket is located.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_bucket_region($bucket, $opt=null){}

	/**
	* Gets the canonical user ID and display name from the Amazon S3 server.
	* @return array
	*/
	public function get_canonical_user_id(){}

	/**
	* Gets the access logs associated with the specified Amazon S3 bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_logs($bucket, $opt=null){}

	/**
	* Calculates the correct values for sequentially reading a file for multipart upload. This method should be used in conjunction with <upload_part()>.
	*
	* @param integer $filesize
	* @param integer $part_size
	*
	* @return array
	*/
	public function get_multipart_counts($filesize, $part_size){}

	/**
	* Gets the contents of an Amazon S3 object in the specified bucket.
	*
	* @param string $bucket
	* @param string $filename
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_object($bucket, $filename, $opt=null){}

	/**
	* Gets the access control list (ACL) settings for the specified Amazon S3 object.
	*
	* @param string $bucket
	* @param string $filename
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_object_acl($bucket, $filename, $opt=null){}

	/**
	* Gets the file size of the specified Amazon S3 object.
	*
	* @param string $bucket
	* @param string $filename
	* @param boolean $friendly_format
	*
	* @return integer|string
	*/
	public function get_object_filesize($bucket, $filename, $friendly_format=false){}

	/**
	* Gets the HTTP headers for the specified Amazon S3 object.
	*
	* @param string $bucket
	* @param string $filename
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_object_headers($bucket, $filename, $opt=null){}

	/**
	* Gets a simplified list of Amazon S3 object file names contained in a bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return array
	*/
	public function get_object_list($bucket, $opt=null){}

	/**
	* Gets the collective metadata for the given Amazon S3 object.
	*
	* @param string $bucket
	* @param string $filename
	* @param array $opt
	*
	* @return mixed
	*/
	public function get_object_metadata($bucket, $filename, $opt=null){}

	/**
	* Gets the web-accessible URL for the Amazon S3 object or generates a time-limited signed request for a private file.
	*
	* @param string $bucket
	* @param string $filename
	* @param integer $preauth
	* @param array $opt
	*
	* @return string
	*/
	public function get_object_url($bucket, $filename, $preauth="0", $opt=null){}

	/**
	* Gets the web-accessible URL to a torrent of the Amazon S3 object. The Amazon S3 object's access control list settings (ACL) MUST be set to <ACL_PUBLIC> for a valid URL to be returned.
	*
	* @param string $bucket
	* @param string $filename
	* @param integer $preauth
	*
	* @return string
	*/
	public function get_torrent_url($bucket, $filename, $preauth="0"){}

	/**
	* Gets an Amazon S3 bucket's versioning status.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_versioning_status($bucket, $opt=null){}

	/**
	* Retrieves the website configuration for a bucket. The contents of this response are identical to the content submitted by the user during the website creation operation. If a website configuration has never been set, Amazon S3 will return a 404 error.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_website_config($bucket, $opt=null){}

	/**
	* Gets whether or not the specified Amazon S3 bucket exists in Amazon S3. This includes buckets that do not belong to the caller.
	*
	* @param string $bucket
	*
	* @return boolean
	*/
	public function if_bucket_exists($bucket){}

	/**
	* Gets whether or not the specified Amazon S3 bucket has a bucket policy associated with it.
	*
	* @param string $bucket
	*
	* @return boolean
	*/
	public function if_bucket_policy_exists($bucket){}

	/**
	* Gets whether or not the specified Amazon S3 object exists in the specified bucket.
	*
	* @param string $bucket
	* @param string $filename
	*
	* @return boolean
	*/
	public function if_object_exists($bucket, $filename){}

	/**
	* Initiates a multipart upload and returns an `UploadId`.
	*
	* @param string $bucket
	* @param string $filename
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function initiate_multipart_upload($bucket, $filename, $opt=null){}

	/**
	* Gets a list of all the versions of Amazon S3 objects in the specified bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_bucket_object_versions($bucket, $opt=null){}

	/**
	* Gets a list of all buckets contained in the caller's Amazon S3 account.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_buckets($opt=null){}

	/**
	* Lists the in-progress multipart uploads.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_multipart_uploads($bucket, $opt=null){}

	/**
	* Gets a list of all Amazon S3 objects in the specified bucket.
	*
	* @param string $bucket
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_objects($bucket, $opt=null){}

	/**
	* Lists the completed parts of an in-progress multipart upload.
	*
	* @param string $bucket
	* @param string $filename
	* @param string $upload_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_parts($bucket, $filename, $upload_id, $opt=null){}

	/**
	* Sets the access control list (ACL) settings for the specified Amazon S3 bucket.
	*
	* @param string $bucket
	* @param string $acl
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_bucket_acl($bucket, $acl="private", $opt=null){}

	/**
	* Sets the policy sub-resource for the specified Amazon S3 bucket. The specified policy replaces any policy the bucket already has.
	*
	* @param string $bucket
	* @param \CFPolicy $policy
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_bucket_policy($bucket, $policy, $opt=null){}

	/**
	* Sets the access control list (ACL) settings for the specified Amazon S3 object.
	*
	* @param string $bucket
	* @param string $filename
	* @param string $acl
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_object_acl($bucket, $filename, $acl="private", $opt=null){}

	/**
	* Sets the region to use for subsequent Amazon S3 operations. This will also reset any prior use of <enable_path_style()>.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

	/**
	* Sets the virtual host to use in place of the default `bucket.s3.amazonaws.com` domain.
	*
	* @param string $vhost
	*
	* @return $this
	*/
	public function set_vhost($vhost){}

	/**
	* Updates an Amazon S3 object with new headers or other metadata. To replace the content of the specified Amazon S3 object, call <create_object()> with the same bucket and file name parameters.
	*
	* @param string $bucket
	* @param string $filename
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function update_object($bucket, $filename, $opt=null){}

	/**
	* Uploads a single part of a multipart upload. The part size cannot be smaller than 5 MB or larger than 5 TB. A multipart upload can have no more than 10,000 parts.
	*
	* @param string $bucket
	* @param string $filename
	* @param string $upload_id
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function upload_part($bucket, $filename, $upload_id, $opt=null){}

	/**
	* Validates whether or not the specified Amazon S3 bucket name is valid for DNS-style access. This method is leveraged by any method that creates buckets.
	*
	* @param string $bucket
	*
	* @return boolean
	*/
	public function validate_bucketname_create($bucket){}

	/**
	* Validates whether or not the specified Amazon S3 bucket name is valid for path-style access. This method is leveraged by any method that reads from buckets.
	*
	* @param string $bucket
	*
	* @return boolean
	*/
	public function validate_bucketname_support($bucket){}

}
class AmazonSDB extends CFRuntime{
	/**
	* Performs multiple DeleteAttributes operations in a single call, which reduces round trips and latencies.
	*
	* @param string $domain_name
	* @param array $item_keypairs
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function batch_delete_attributes($domain_name, $item_keypairs, $opt=null){}

	/**
	* The BatchPutAttributes operation creates or replaces attributes within one or more items.
	*
	* @param string $domain_name
	* @param array $item_keypairs
	* @param boolean $replace
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function batch_put_attributes($domain_name, $item_keypairs, $replace=null, $opt=null){}

	/**
	* The <code>CreateDomain</code> operation creates a new domain. The domain name should be unique among the domains associated with the Access Key ID provided in the request. The <code>CreateDomain</code> operation may take 10 or more seconds to complete.
	*
	* @param string $domain_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_domain($domain_name, $opt=null){}

	/**
	* Deletes one or more attributes associated with the item. If all attributes of an item are deleted, the item is deleted.
	*
	* @param string $domain_name
	* @param string $item_name
	* @param array $attributes
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_attributes($domain_name, $item_name, $attributes=null, $opt=null){}

	/**
	* The <code>DeleteDomain</code> operation deletes a domain. Any items (and their attributes) in the domain are deleted as well. The <code>DeleteDomain</code> operation might take 10 or more seconds to complete.
	*
	* @param string $domain_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_domain($domain_name, $opt=null){}

	/**
	* Returns information about the domain, including when the domain was created, the number of items and attributes in the domain, and the size of the attribute names and values.
	*
	* @param string $domain_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function domain_metadata($domain_name, $opt=null){}

	/**
	* Returns all of the attributes associated with the item. Optionally, the attributes returned can be limited to one or more specified attribute name parameters.
	*
	* @param string $domain_name
	* @param string $item_name
	* @param string $attribute_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_attributes($domain_name, $item_name, $attribute_name=null, $opt=null){}

	/**
	* ONLY lists the domains, as an array, on the SimpleDB account.
	*
	* @param string $pcre
	*
	* @return array
	*/
	public function get_domain_list($pcre=null){}

	/**
	* The <code>ListDomains</code> operation lists all domains associated with the Access Key ID. It returns domain names up to the limit set by <a href="#MaxNumberOfDomains">MaxNumberOfDomains</a>. A <a href="#NextToken">NextToken</a> is returned if there are more than <code>MaxNumberOfDomains</code> domains. Calling <code>ListDomains</code> successive times with the <code>NextToken</code> provided by the operation returns up to <code>MaxNumberOfDomains</code> more domain names with each successive operation call.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_domains($opt=null){}

	/**
	* The PutAttributes operation creates or replaces attributes in an item.
	*
	* @param string $domain_name
	* @param string $item_name
	* @param array $keypairs
	* @param boolean $replace
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function put_attributes($domain_name, $item_name, $keypairs, $replace=null, $opt=null){}

	/**
	* Remaps the custom item-key-value format used by Batch* operations to the more common ComplexList format. Internal use only.
	*
	* @param array $keys
	* @param boolean $replace
	*
	* @return array
	*/
	public function remap_attribute_items_for_complextype($keys, $replace=false){}

	/**
	* Remaps the custom item-key-value format used by Batch* operations to the more common ComplexList format. Internal use only.
	*
	* @param array $items
	* @param boolean $replace
	*
	* @return array
	*/
	public function remap_batch_items_for_complextype($items, $replace=false){}

	/**
	* The <code>Select</code> operation returns a set of attributes for <code>ItemNames</code> that match the select expression.
	*
	* @param string $select_expression
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function select($select_expression, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

}
class SDB_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonSES extends CFRuntime{
	/**
	* Deletes the specified email address from the list of verified addresses.
	*
	* @param string $email_address
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_verified_email_address($email_address, $opt=null){}

	/**
	* Returns the user's current activity limits.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_send_quota($opt=null){}

	/**
	* Returns the user's sending statistics. The result is a list of data points, representing the last two weeks of sending activity.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_send_statistics($opt=null){}

	/**
	* Returns a list containing all of the email addresses that have been verified.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_verified_email_addresses($opt=null){}

	/**
	* Composes an email message based on input data, and then immediately queues the message for sending.
	*
	* @param string $source
	* @param array $destination
	* @param array $message
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function send_email($source, $destination, $message, $opt=null){}

	/**
	* Sends an email message, with header and content specified by the client. The <code>SendRawEmail</code> action is useful for sending multipart MIME emails. The raw text of the message must comply with Internet email standards; otherwise, the message cannot be sent.
	*
	* @param array $raw_message
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function send_raw_email($raw_message, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

	/**
	* Verifies an email address. This action causes a confirmation email message to be sent to the specified address.
	*
	* @param string $email_address
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function verify_email_address($email_address, $opt=null){}

}
class Email_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonSNS extends CFRuntime{
	/**
	* The AddPermission action adds a statement to a topic's access control policy, granting access for the specified AWS accounts to the specified actions.
	*
	* @param string $topic_arn
	* @param string $label
	* @param string $account_id
	* @param string $action_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function add_permission($topic_arn, $label, $account_id, $action_name, $opt=null){}

	/**
	* The ConfirmSubscription action verifies an endpoint owner's intent to receive messages by validating the token sent to the endpoint by an earlier Subscribe action. If the token is valid, the action creates a new subscription and returns its Amazon Resource Name (ARN). This call requires an AWS signature only when the AuthenticateOnUnsubscribe flag is set to "true".
	*
	* @param string $topic_arn
	* @param string $token
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function confirm_subscription($topic_arn, $token, $opt=null){}

	/**
	* The CreateTopic action creates a topic to which notifications can be published. Users can create at most 25 topics. This action is idempotent, so if the requester already owns a topic with the specified name, that topic's ARN will be returned without creating a new topic.
	*
	* @param string $name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_topic($name, $opt=null){}

	/**
	* The DeleteTopic action deletes a topic and all its subscriptions. Deleting a topic might prevent some messages previously sent to the topic from being delivered to subscribers. This action is idempotent, so deleting a topic that does not exist will not result in an error.
	*
	* @param string $topic_arn
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_topic($topic_arn, $opt=null){}

	/**
	* The GetTopicAttribtues action returns all of the properties of a topic customers have created. Topic properties returned might differ based on the authorization of the user.
	*
	* @param string $topic_arn
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_topic_attributes($topic_arn, $opt=null){}

	/**
	* Gets a simple list of Topic ARNs.
	*
	* @param string $pcre
	*
	* @return array
	*/
	public function get_topic_list($pcre=null){}

	/**
	* The ListSubscriptions action returns a list of the requester's subscriptions. Each call returns a limited list of subscriptions. If there are more subscriptions, a NextToken is also returned. Use the NextToken parameter in a new ListSubscriptions call to get further results.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_subscriptions($opt=null){}

	/**
	* The ListSubscriptionsByTopic action returns a list of the subscriptions to a specific topic. Each call returns a limited list of subscriptions. If there are more subscriptions, a NextToken is also returned. Use the NextToken parameter in a new ListSubscriptionsByTopic call to get further results.
	*
	* @param string $topic_arn
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_subscriptions_by_topic($topic_arn, $opt=null){}

	/**
	* The ListTopics action returns a list of the requester's topics. Each call returns a limited list of topics. If there are more topics, a NextToken is also returned. Use the NextToken parameter in a new ListTopics call to get further results.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_topics($opt=null){}

	/**
	* The Publish action sends a message to all of a topic's subscribed endpoints. When a messageId is returned, the message has been saved and Amazon SNS will attempt to deliver it to the topic's subscribers shortly. The format of the outgoing message to each subscribed endpoint depends on the notification protocol selected.
	*
	* @param string $topic_arn
	* @param string $message
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function publish($topic_arn, $message, $opt=null){}

	/**
	* The RemovePermission action removes a statement from a topic's access control policy.
	*
	* @param string $topic_arn
	* @param string $label
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function remove_permission($topic_arn, $label, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

	/**
	* The SetTopicAttributes action allows a topic owner to set an attribute of the topic to a new value.
	*
	* @param string $topic_arn
	* @param string $attribute_name
	* @param string $attribute_value
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_topic_attributes($topic_arn, $attribute_name, $attribute_value, $opt=null){}

	/**
	* The Subscribe action prepares to subscribe an endpoint by sending the endpoint a confirmation message. To actually create a subscription, the endpoint owner must call the ConfirmSubscription action with the token from the confirmation message. Confirmation tokens are valid for twenty-four hours.
	*
	* @param string $topic_arn
	* @param string $protocol
	* @param string $endpoint
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function subscribe($topic_arn, $protocol, $endpoint, $opt=null){}

	/**
	* The Unsubscribe action deletes a subscription. If the subscription requires authentication for deletion, only the owner of the subscription or the its topic's owner can unsubscribe, and an AWS signature is required. If the Unsubscribe call does not require authentication and the requester is not the subscription owner, a final cancellation message is delivered to the endpoint, so that the endpoint owner can easily resubscribe to the topic if the Unsubscribe request was unintended.
	*
	* @param string $subscription_arn
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function unsubscribe($subscription_arn, $opt=null){}

}
class SNS_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonSQS extends CFRuntime{
	/**
	* The AddPermission action adds a permission to a queue for a specific <a href="http://docs.amazonwebservices.com/AWSSimpleQueueService/latest/APIReference/Glossary.html#d0e3892">principal</a>. This allows for sharing access to the queue.
	*
	* @param string $queue_url
	* @param string $label
	* @param string $account_id
	* @param string $action_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function add_permission($queue_url, $label, $account_id, $action_name, $opt=null){}

	/**
	* The <code>ChangeMessageVisibility</code> action changes the visibility timeout of a specified message in a queue to a new value. The maximum allowed timeout value you can set the value to is 12 hours. This means you can't extend the timeout of a message in an existing queue to more than a total visibility timeout of 12 hours. (For more information visibility timeout, see <a href="http://docs.amazonwebservices.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/AboutVT.html">Visibility Timeout</a> in the Amazon SQS Developer Guide.)
	*
	* @param string $queue_url
	* @param string $receipt_handle
	* @param integer $visibility_timeout
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function change_message_visibility($queue_url, $receipt_handle, $visibility_timeout, $opt=null){}

	/**
	* The <code>CreateQueue</code> action creates a new queue, or returns the URL of an existing one. When you request <code>CreateQueue</code>, you provide a name for the queue. To successfully create a new queue, you must provide a name that is unique within the scope of your own queues. If you provide the name of an existing queue, a new queue isn't created and an error isn't returned. Instead, the request succeeds and the queue URL for the existing queue is returned.
	*
	* @param string $queue_name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function create_queue($queue_name, $opt=null){}

	/**
	* The <code>DeleteMessage</code> action unconditionally removes the specified message from the specified queue. Even if the message is locked by another reader due to the visibility timeout setting, it is still deleted from the queue.
	*
	* @param string $queue_url
	* @param string $receipt_handle
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_message($queue_url, $receipt_handle, $opt=null){}

	/**
	* This action unconditionally deletes the queue specified by the queue URL. Use this operation WITH CARE! The queue is deleted even if it is NOT empty.
	*
	* @param string $queue_url
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function delete_queue($queue_url, $opt=null){}

	/**
	* Converts a queue URI into a queue ARN.
	*
	* @param string $queue_url
	*
	* @return string
	*/
	public function get_queue_arn($queue_url){}

	/**
	* Gets one or all attributes of a queue. Queues currently have two attributes you can get: <code>ApproximateNumberOfMessages</code> and <code>VisibilityTimeout</code>.
	*
	* @param string $queue_url
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_queue_attributes($queue_url, $opt=null){}

	/**
	* ONLY lists the queue URLs, as an array, on the SQS account.
	*
	* @param string $pcre
	*
	* @return array
	*/
	public function get_queue_list($pcre=null){}

	/**
	* Returns the approximate number of messages in the queue.
	*
	* @param string $queue_url
	*
	* @return mixed
	*/
	public function get_queue_size($queue_url){}

	/**
	* Returns a list of your queues.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function list_queues($opt=null){}

	/**
	* Retrieves one or more messages from the specified queue, including the message body and message ID of each message. Messages returned by this action stay in the queue until you delete them. However, once a message is returned to a <code>ReceiveMessage</code> request, it is not returned on subsequent <code>ReceiveMessage</code> requests for the duration of the <code>VisibilityTimeout</code>. If you do not specify a <code>VisibilityTimeout</code> in the request, the overall visibility timeout for the queue is used for the returned messages.
	*
	* @param string $queue_url
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function receive_message($queue_url, $opt=null){}

	/**
	* The <code>RemovePermission</code> action revokes any permissions in the queue policy that matches the specified <code>Label</code> parameter. Only the owner of the queue can remove permissions.
	*
	* @param string $queue_url
	* @param string $label
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function remove_permission($queue_url, $label, $opt=null){}

	/**
	* The <code>SendMessage</code> action delivers a message to the specified queue.
	*
	* @param string $queue_url
	* @param string $message_body
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function send_message($queue_url, $message_body, $opt=null){}

	/**
	* Sets an attribute of a queue. Currently, you can set only the <code>VisibilityTimeout</code> attribute for a queue.
	*
	* @param string $queue_url
	* @param array $attribute
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function set_queue_attributes($queue_url, $attribute, $opt=null){}

	/**
	* This allows you to explicitly sets the region for the service to use.
	*
	* @param string $region
	*
	* @return $this
	*/
	public function set_region($region){}

}
class SQS_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class AmazonSTS extends CFRuntime{
	/**
	* The GetFederationToken action returns a set of temporary credentials for a federated user with the user name and policy specified in the request. The credentials consist of an Access Key ID, a Secret Access Key, and a security token. The credentials are valid for the specified duration, between one and 36 hours.
	*
	* @param string $name
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_federation_token($name, $opt=null){}

	/**
	* The GetSessionToken action returns a set of temporary credentials for an AWS account or IAM User. The credentials consist of an Access Key ID, a Secret Access Key, and a security token. These credentials are valid for the specified duration only. The session duration for IAM users can be between one and 36 hours, with a default of 12 hours. The session duration for AWS account owners is restricted to one hour.
	*
	* @param array $opt
	*
	* @return \CFResponse
	*/
	public function get_session_token($opt=null){}

}
class STS_Exception extends Exception{
	public function getCode(){}

	public function getFile(){}

	public function getLine(){}

	public function getMessage(){}

	public function getPrevious(){}

	public function getTrace(){}

	public function getTraceAsString(){}

}
class CacheCore{
	/** 
	* The number of seconds before a cache object is considered stale.
	*/
	var $expires = null;
	/** 
	* Stores whether or not the content should be gzipped when stored
	*/
	var $gzip = null;
	/** 
	* Used internally to uniquely identify the location + name of the cache object.
	*/
	var $id = null;
	/** 
	* Where to store the cache.
	*/
	var $location = null;
	/** 
	* A name to uniquely identify the cache object by.
	*/
	var $name = null;
	/** 
	* Stores the time when the cache object was created.
	*/
	var $timestamp = null;
	/**
	* Allows for chaining from the constructor. Requires PHP 5.3 or newer.
	*
	* @param string $name
	* @param string $location
	* @param integer $expires
	* @param boolean $gzip
	*
	* @return object
	*/
	public function init($name, $location, $expires, $gzip=true){}

	/**
	* Provides a simple, straightforward cache-logic mechanism. Useful for non-complex response caches.
	*
	* @param string $callback
	*
	* @return array
	*/
	public function response_manager($callback, $params=null){}

}
class CacheAPC extends CacheCore implements ICacheCore{
	/**
	* Creates a new cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function create($data){}

	/**
	* Deletes a cache.
	* @return boolean
	*/
	public function delete(){}

	/**
	* Implemented here, but always returns `false`. APC manages its own expirations.
	* @return boolean
	*/
	public function is_expired(){}

	/**
	* Reads a cache.
	* @return mixed
	*/
	public function read(){}

	/**
	* Implemented here, but always returns `false`. APC manages its own expirations.
	* @return boolean
	*/
	public function reset(){}

	/**
	* Implemented here, but always returns `false`. APC manages its own expirations.
	* @return mixed
	*/
	public function timestamp(){}

	/**
	* Updates an existing cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function update($data){}

}
class CacheFile extends CacheCore implements ICacheCore{
	/**
	* Creates a new cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function create($data){}

	/**
	* Deletes a cache.
	* @return boolean
	*/
	public function delete(){}

	/**
	* Checks whether the cache object is expired or not.
	* @return boolean
	*/
	public function is_expired(){}

	/**
	* Reads a cache.
	* @return mixed
	*/
	public function read(){}

	/**
	* Resets the freshness of the cache.
	* @return boolean
	*/
	public function reset(){}

	/**
	* Retrieves the timestamp of the cache.
	* @return mixed
	*/
	public function timestamp(){}

	/**
	* Updates an existing cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function update($data){}

}
class CacheMC extends CacheCore implements ICacheCore{
	/** 
	* Whether the Memcached extension is being used (as opposed to Memcache).
	*/
	var $is_memcached = false;
	/** 
	* Holds the Memcache object.
	*/
	var $memcache = null;
	/**
	* Creates a new cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function create($data){}

	/**
	* Deletes a cache.
	* @return boolean
	*/
	public function delete(){}

	/**
	* Implemented here, but always returns `false`. Memcache manages its own expirations.
	* @return boolean
	*/
	public function is_expired(){}

	/**
	* Reads a cache.
	* @return mixed
	*/
	public function read(){}

	/**
	* Implemented here, but always returns `false`. Memcache manages its own expirations.
	* @return boolean
	*/
	public function reset(){}

	/**
	* Implemented here, but always returns `false`. Memcache manages its own expirations.
	* @return mixed
	*/
	public function timestamp(){}

	/**
	* Updates an existing cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function update($data){}

}
class CachePDO extends CacheCore implements ICacheCore{
	/** 
	* Holds the prepared statement for creating an entry.
	*/
	var $create = null;
	/** 
	* Holds the prepared statement for deleting an entry.
	*/
	var $delete = null;
	/** 
	* Holds the parsed URL components.
	*/
	var $dsn = null;
	/** 
	* Holds the PDO-friendly version of the connection string.
	*/
	var $dsn_string = null;
	/** 
	* Reference to the PDO connection object.
	*/
	var $pdo = null;
	/** 
	* Holds the prepared statement for reading an entry.
	*/
	var $read = null;
	/** 
	* Holds the prepared statement for resetting the expiry of an entry.
	*/
	var $reset = null;
	/** 
	* Holds the response of the read so we only need to fetch it once instead of doing multiple queries.
	*/
	var $store_read = null;
	/** 
	* Holds the prepared statement for updating an entry.
	*/
	var $update = null;
	/**
	* Creates a new cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function create($data){}

	/**
	* Deletes a cache.
	* @return boolean
	*/
	public function delete(){}

	/**
	* Returns a list of supported PDO database drivers. Identical to <PDO::getAvailableDrivers()>.
	* @return array
	*/
	public function get_drivers(){}

	/**
	* Checks whether the cache object is expired or not.
	* @return boolean
	*/
	public function is_expired(){}

	/**
	* Reads a cache.
	* @return mixed
	*/
	public function read(){}

	/**
	* Resets the freshness of the cache.
	* @return boolean
	*/
	public function reset(){}

	/**
	* Retrieves the timestamp of the cache.
	* @return mixed
	*/
	public function timestamp(){}

	/**
	* Updates an existing cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function update($data){}

}
class CacheXCache extends CacheCore implements ICacheCore{
	/**
	* Creates a new cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function create($data){}

	/**
	* Deletes a cache.
	* @return boolean
	*/
	public function delete(){}

	/**
	* Defined here, but always returns false. XCache manages it's own expirations. It's worth mentioning that if the server is configured for a long xcache.var_gc_interval then it IS possible for expired data to remain in the var cache, though it is not possible to access it.
	* @return boolean
	*/
	public function is_expired(){}

	/**
	* Reads a cache.
	* @return mixed
	*/
	public function read(){}

	/**
	* Implemented here, but always returns `false`. XCache manages its own expirations.
	* @return boolean
	*/
	public function reset(){}

	/**
	* Implemented here, but always returns `false`. XCache manages its own expirations.
	* @return mixed
	*/
	public function timestamp(){}

	/**
	* Updates an existing cache.
	*
	* @param mixed $data
	*
	* @return boolean
	*/
	public function update($data){}

}
class S3BrowserUpload extends AmazonS3{
	/**
	* Returns the URI of the web page that this script is currently running on. This method only works correctly when run from a publicly-accessible web page.
	*/
	public function current_uri(){}

	/**
	* Returns the domain (and port) of the web page that this script is currently running on. This method only works correctly when run from a publicly-accessible web page.
	*/
	public function domain(){}

	/**
	* The <code>POST</code> operation adds an object to a specified bucket using HTML forms. POST is an alternate form of <code>PUT</code> that enables browser-based uploads as a way of putting objects in buckets.
	*
	* @param string $bucket
	* @param string $expires
	* @param array $opt
	*
	* @return array
	*/
	public function generate_upload_parameters($bucket, $expires="+1 hour", $opt=null){}

	/**
	* Returns the protocol of the web page that this script is currently running on. This method only works correctly when run from a publicly-accessible web page.
	*/
	public function protocol(){}

}
class modAws{
	/** 
	* The current selected bucket
	* @var string $bucket
	*/
	var $bucket = "";
	/** 
	* The AmazonS3 class instance
	* @var AmazonS3 $s3
	*/
	var $s3 = null;
	/**
	* Check with S3 to confirm the currently selected bucket exists
	* @return bool
	*/
	public function bucketExists(){}

	/**
	* Attempt to create the bucket for the given region
	*
	* @param string $region
	*
	* @return bool
	*/
	public function createBucket($region="us-west-1"){}

	/**
	* Get the S3 absolute URL for the specified path
	*
	* @param string $path
	* @param string $expires
	*
	* @return bool|mixed|string
	*/
	public function getFileUrl($path, $expires=null){}

	/**
	* Get the AmazonS3 client class instance
	* @return \AmazonS3|null
	*/
	public function getS3(){}

	/**
	* Set the bucket for the connection to S3
	*
	* @param string $bucket
	*
	* @return void
	*/
	public function setBucket($bucket){}

	/**
	* Upload an array of files to S3
	*
	* @param string $target
	* @param array $options
	*
	* @return array|bool
	*/
	public function upload($files, $target="", $options=array()){}

	/**
	* Upload a single item to S3
	*
	* @param array $file
	* @param string $target
	* @param array $options
	*
	* @return bool|string
	*/
	public function uploadSingle($file, $target, $options=array()){}

}
class xPDOAPCCache extends xPDOCache{
}
class xPDOWinCache extends xPDOCache{
}
class xPDOMemCache extends xPDOCache{
}
class xPDOMemCached extends xPDOCache{
}
class xPDOZip{
	var $xpdo = null;
	/**
	* Close the archive.
	*/
	public function close(){}

	/**
	* Return any errors from operations on the archive.
	*/
	public function getErrors(){}

	/**
	* Get an option from supplied options, the xPDOZip instance options, or xpdo itself.
	*
	* @param string $key
	* @param array $options
	* @param mixed $default
	*
	* @return mixed
	*/
	public function getOption($key, $options=null, $default=null){}

	/**
	* Detect if errors occurred during any operations.
	* @return boolean
	*/
	public function hasError(){}

	/**
	* Pack the contents from the source into the archive.
	*
	* @param string $source
	* @param array $options
	*
	* @return array
	*/
	public function pack($source, $options=array()){}

	/**
	* Unpack the compressed contents from the archive to the target.
	*
	* @param string $target
	* @param array $options
	*
	* @return array
	*/
	public function unpack($target, $options=array()){}

}
abstract class xPDOVehicle{
	var $class = "xPDOVehicle";
	/** 
	* Represents the artifact and related attributes stored in the vehicle.
	* @var array
	*/
	var $payload = array();
	/**
	* Retrieve an artifact represented in this vehicle.
	*
	* @param \xPDOTransport $transport
	* @param array $options
	* @param array $element
	*
	*/
	public function get($transport, $options=array(), $element=null){}

	/**
	* Install the vehicle artifact into a transport host.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function install($transport, $options){}

	/**
	* Put an artifact representation into this vehicle.
	*
	* @param \xPDOTransport $transport
	* @param array $attributes
	*
	*/
	public function put($transport, $object, $attributes=array()){}

	/**
	* Build a manifest entry to be registered in a transport for this vehicle.
	* @return array
	*/
	public function register($transport){}

	/**
	* Resolve any dependencies of the artifact represented in this vehicle.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function resolve($transport, $object, $options=array()){}

	/**
	* Store this xPDOVehicle instance into an xPDOTransport.
	* @return boolean
	*/
	public function store($transport){}

	/**
	* Uninstalls the vehicle artifact from a transport host.
	*
	* @param array $options
	*
	*/
	public function uninstall($transport, $options){}

	/**
	* Validate any dependencies for the object represented in this vehicle.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function validate($transport, $object, $options=array()){}

}
class xPDOFileVehicle extends xPDOVehicle{
}
class xPDOObjectVehicle extends xPDOVehicle{
	/**
	* Installs a related object from the vehicle.
	*
	* @param array $element
	* @param array $options
	*
	* @return bool
	*/
	public function _installRelated($transport, $parent, $element, $options, $owner=""){}

	/**
	* Uninstall the xPDOObjects represented by a vehicle element from the transport host.
	*/
	public function _uninstallObject($transport, $options, $element, $parentObject, $fkMeta){}

	/**
	* Uninstalls related objects from the vehicle.
	*/
	public function _uninstallRelated($transport, $parent, $element, $options){}

}
class xPDOScriptVehicle extends xPDOVehicle{
}
class xPDOTransport{
	/** 
	* An map of preserved objects from an install used by uninstall.
	* @var array
	*/
	var $_preserved = array();
	/** 
	* Stores various attributes about the transport package.
	* @var array
	*/
	var $attributes = array();
	/** 
	* The current manifest version for this transport.
	* @var string
	*/
	var $manifestVersion = "1.1";
	/** 
	* A unique name used to identify the package without the version.
	* @var string
	*/
	var $name = null;
	/** 
	* The physical location of the transport package.
	* @var string
	*/
	var $path = null;
	/** 
	* A unique signature to identify the package.
	* @var string
	*/
	var $signature = null;
	/** 
	* Indicates the state of the xPDOTransport instance.
	* @var integer
	*/
	var $state = null;
	/** 
	* A map of object vehicles containing payloads of data for transport.
	* @var array
	*/
	var $vehicles = array();
	/** 
	* The package version, as a PHP-standardized version number string.
	* @var string
	*/
	var $version = null;
	/** 
	* An {@link xPDO} reference controlling this transport instance.
	* @var xPDO
	*/
	var $xpdo = null;
	/**
	* Pack the resources from path relative to source into an archive with filename.
	*
	* @param string $filename
	* @param string $path
	* @param string $source
	*
	* @return boolean
	*/
	public function _pack($xpdo, $filename, $path, $source){}

	/**
	* Unpack a zip archive to a specified location.
	*
	* @param string $from
	* @param string $to
	*
	* @return array|boolean
	*/
	public function _unpack($xpdo, $from, $to){}

	/**
	* Compares two package versions by signature.
	* @return bool|int
	*/
	public function compareSignature($signature1, $signature2){}

	/**
	* Get an {@link xPDOVehicle} instance from an unpacked transport package.
	*
	* @param string $objFile
	* @param array $options
	*
	* @return \xPDOVehicle
	*/
	public function get($objFile, $options=array()){}

	/**
	* Get an attribute of the package manifest.
	*
	* @param string $key
	*
	* @return mixed
	*/
	public function getAttribute($key){}

	/**
	* Install vehicles in the package into the sponsor {@link xPDO} instance.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function install($options=array()){}

	/**
	* Load preserved objects from the previous install().
	* @return array
	*/
	public function loadPreserved(){}

	/**
	* Returns the structure version of the given manifest array.
	*
	* @param array $manifest
	*
	* @return string
	*/
	public function manifestVersion($manifest){}

	/**
	* Pack the {@link xPDOTransport} instance in preparation for distribution.
	* @return boolean
	*/
	public function pack(){}

	/**
	* Parse the name and version from a package signature.
	*
	* @param string $signature
	*
	* @return array
	*/
	public function parseSignature($signature){}

	/**
	* Wrap artifact with an {@link xPDOVehicle} and register in the transport.
	*
	* @param mixed $artifact
	* @param array $attributes
	*
	*/
	public function put($artifact, $attributes=array()){}

	/**
	* Register an xPDOVehicle with this transport instance.
	*/
	public function registerVehicle($vehicle){}

	/**
	* Get an existing {@link xPDOTransport} instance.
	*/
	public function retrieve($xpdo, $source, $target, $state="1"){}

	/**
	* Set an attribute of the package manifest.
	*
	* @param string $key
	* @param mixed $value
	*
	*/
	public function setAttribute($key, $value){}

	/**
	* Store the package to a specified resource location.
	*
	* @param mixed $location
	*
	*/
	public function store($location){}

	/**
	* Uninstall vehicles in the package from the sponsor {@link xPDO} instance.
	*
	* @param array $options
	*
	* @return boolean
	*/
	public function uninstall($options=array()){}

	/**
	* Unpack the package to prepare for installation and return a manifest.
	*
	* @param string $from
	* @param string $to
	* @param integer $state
	*
	* @return array
	*/
	public function unpack($xpdo, $from, $to, $state="1"){}

	/**
	* Write the package manifest file.
	* @return boolean
	*/
	public function writeManifest(){}

	/**
	* Write objects preserved during install() to file for use by uninstall().
	* @return boolean
	*/
	public function writePreserved(){}

}
class xPDOTransportVehicle extends xPDOVehicle{
}
class xPDORevisionControl{
	public function _split($text){}

	public function cut_head($str, $key, $prefix){}

	/**
	* Computes the difference between two string linewise.
	*/
	public function diff($text1, $text2){}

	/**
	* Compute the manhatten distance of two points
	*/
	public function dist($a, $b){}

	/**
	* Checks, if there is a line number-entry in $r_array for $line, that is behind $where.
	*/
	public function nextOccurence($line, $r_array, $where){}

	public function patch($text, $patch){}

	public function restore($revisions=array(), $restore="0"){}

}
abstract class xPDODriver{
	/** 
	* An array of DB constants/functions that represent date values.
	* @var array
	*/
	var $_currentDates = array();
	/** 
	* An array of DB constants/functions that represent time values.
	* @var array
	*/
	var $_currentTimes = array();
	/** 
	* An array of DB constants/functions that represent timestamp values.
	* @var array
	*/
	var $_currentTimestamps = array();
	/** 
	* @var array Describes the physical database types.
	*/
	var $dbtypes = array();
	var $escapeCloseChar = "";
	var $escapeOpenChar = "";
	var $quoteChar = "";
	/** 
	* @var xPDO A reference to the XPDO instance using this manager.
	*/
	var $xpdo = null;
	/**
	* Gets the PHP field type based upon the specified database type.
	*
	* @param string $dbtype
	*
	* @return string
	*/
	public function getPhpType($dbtype){}

}
abstract class xPDOGenerator{
	/** 
	* @var string $classTemplate The class template string to build the class
files from.
	*/
	var $classTemplate = "";
	/** 
	* @var array $classes The stored classes array.
	*/
	var $classes = array();
	/** 
	* @var xPDOManager $manager A reference to the xPDOManager using this
generator.
	*/
	var $manager = null;
	/** 
	* @var array $map The stored map array.
	*/
	var $map = array();
	/** 
	* @var string $mapFooter The map footer string to build the map files from.
	*/
	var $mapFooter = "";
	/** 
	* @var string $mapHeader The map header string to build the map files from.
	*/
	var $mapHeader = "";
	/** 
	* @var string $metaTemplate The class platform template string to build
the meta class map files from.
	*/
	var $metaTemplate = "";
	/** 
	* @var array $model The stored model array.
	*/
	var $model = array();
	/** 
	* @var string $outputDir The absolute path to output the class and map
files to.
	*/
	var $outputDir = "";
	/** 
	* @var string $platformTemplate The class platform template string to build
the class platform files from.
	*/
	var $platformTemplate = "";
	/** 
	* @var SimpleXMLElement
	*/
	var $schema = null;
	/** 
	* @var string $schemaContent The stored content of the newly-created schema
file.
	*/
	var $schemaContent = "";
	/** 
	* @var string $schemaFile An absolute path to the schema file.
	*/
	var $schemaFile = "";
	/** 
	* @var xPDOSchemaManager $schemaManager
	*/
	var $schemaManager = null;
	/**
	* Compile the packages into a single file for quicker loading.
	*
	* @param string $path
	*
	* @return boolean
	*/
	public function compile($path=""){}

	/**
	* Gets a class name from a table name by splitting the string by _ and capitalizing each token.
	*
	* @param string $string
	*
	* @return string
	*/
	public function getClassName($string){}

	/**
	* Return the class platform template for the class files.
	* @return string
	*/
	public function getClassPlatformTemplate($platform){}

	/**
	* Return the class template for the class files.
	* @return string
	*/
	public function getClassTemplate(){}

	/**
	* Format the passed default value as an XML attribute.
	*
	* @param string $value
	*
	* @return string
	*/
	public function getDefault($value){}

	/**
	* Format the passed database index value as an XML attribute.
	*
	* @param string $index
	*
	* @return string
	*/
	public function getIndex($index){}

	/**
	* Gets the map footer template.
	* @return string
	*/
	public function getMapFooter(){}

	/**
	* Gets the map header template.
	* @return string
	*/
	public function getMapHeader(){}

	/**
	* Gets the meta template.
	* @return string
	*/
	public function getMetaTemplate(){}

	/**
	* Formats a class name to a specific value, stripping the prefix if specified.
	*
	* @param string $string
	* @param string $prefix
	* @param boolean $prefixRequired
	*
	* @return string
	*/
	public function getTableName($string, $prefix="", $prefixRequired=false){}

	/**
	* Write the generated class files to the specified path.
	*
	* @param string $path
	*
	*/
	public function outputClasses($path){}

	/**
	* Write the generated class maps to the specified path.
	*
	* @param string $path
	*
	*/
	public function outputMaps($path){}

	/**
	* Write the generated meta map to the specified path.
	*
	* @param string $path
	*
	* @return bool
	*/
	public function outputMeta($path){}

	/**
	* Parses an XPDO XML schema and generates classes and map files from it.
	*
	* @param string $schemaFile
	* @param string $outputDir
	* @param boolean $compile
	*
	* @return boolean
	*/
	public function parseSchema($schemaFile, $outputDir="", $compile=false){}

}
abstract class xPDOManager{
	/** 
	* @var xPDOGenerator The generator class for forward and reverse
engineering tasks (loaded only on demand).
	*/
	var $generator = null;
	/** 
	* @var xPDOTransport The data transport class for migrating data.
	*/
	var $transport = null;
	/** 
	* @var xPDO A reference to the XPDO instance using this manager.
	*/
	var $xpdo = null;
	/**
	* Add a constraint to an object container, e.g. ADD CONSTRAINT.
	*
	* @param string $class
	* @param string $name
	* @param array $options
	*
	* @return boolean
	*/
	public function addConstraint($class, $name, $options=array()){}

	/**
	* Add a field to an object container, e.g. ADD COLUMN.
	*
	* @param string $class
	* @param string $name
	* @param array $options
	*
	* @return boolean
	*/
	public function addField($class, $name, $options=array()){}

	/**
	* Add an index to an object container, e.g. ADD INDEX.
	*
	* @param string $class
	* @param string $name
	* @param array $options
	*
	* @return boolean
	*/
	public function addIndex($class, $name, $options=array()){}

	/**
	* Alter an existing field of an object container, e.g. ALTER COLUMN.
	*
	* @param string $class
	* @param string $name
	* @param array $options
	*
	* @return boolean
	*/
	public function alterField($class, $name, $options=array()){}

	/**
	* Alter the structure of an existing persistent data object container.
	*
	* @param string $className
	* @param array $options
	*
	* @return boolean
	*/
	public function alterObjectContainer($className, $options=array()){}

	/**
	* Creates the container for a persistent data object.
	*
	* @param string $className
	*
	* @return boolean
	*/
	public function createObjectContainer($className){}

	/**
	* Creates the physical container representing a data source.
	*
	* @param array $dsnArray
	* @param string $username
	* @param string $password
	* @param array $containerOptions
	*
	* @return boolean
	*/
	public function createSourceContainer($dsnArray=null, $username=null, $password=null, $containerOptions=array()){}

	/**
	* Gets an XML schema parser / generator for this manager instance.
	* @return \xPDOGenerator
	*/
	public function getGenerator(){}

	/**
	* Gets a data transport mechanism for this xPDOManager instance.
	*/
	public function getTransport(){}

	/**
	* Remove a constraint from an object container, e.g. DROP CONSTRAINT.
	*
	* @param string $class
	* @param string $name
	* @param array $options
	*
	* @return boolean
	*/
	public function removeConstraint($class, $name, $options=array()){}

	/**
	* Remove a field from an object container, e.g. DROP COLUMN.
	*
	* @param string $class
	* @param string $name
	* @param array $options
	*
	* @return boolean
	*/
	public function removeField($class, $name, $options=array()){}

	/**
	* Remove an index from an object container, e.g. DROP INDEX.
	*
	* @param string $class
	* @param string $name
	* @param array $options
	*
	* @return boolean
	*/
	public function removeIndex($class, $name, $options=array()){}

	/**
	* Drop an object container (i.e. database table), if it exists.
	*
	* @param string $className
	*
	* @return boolean
	*/
	public function removeObjectContainer($className){}

	/**
	* Drops a physical data source container, if it exists.
	*
	* @param string $username
	* @param string $password
	* @param string $dsn
	*
	* @return boolean
	*/
	public function removeSourceContainer($dsnArray=null, $username=null, $password=null, $dsn){}

}
class xPDODriver_mysql extends xPDODriver{
}
class xPDOGenerator_mysql extends xPDOGenerator{
	/**
	* Write an xPDO XML Schema from your database.
	*
	* @param string $schemaFile
	* @param string $package
	* @param string $baseClass
	* @param string $tablePrefix
	* @param boolean $restrictPrefix
	*
	* @return boolean
	*/
	public function writeSchema($schemaFile, $package="", $baseClass="", $tablePrefix="", $restrictPrefix=false){}

}
class xPDOManager_mysql extends xPDOManager{
}
class xPDOObject_mysql extends xPDOObject{
}
class xPDOSimpleObject_mysql extends xPDOSimpleObject{
}
class xPDOQuery_mysql extends xPDOQuery{
}
