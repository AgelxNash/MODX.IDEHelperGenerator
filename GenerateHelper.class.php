<?php
class GenerateHelper{
	protected $files;
	private $classMap = array();
	private $customMap = array();
    private $template = '';

    public function setFiles($files){
        $this->files = $files;
    }
    public function setMap($data){
        $this->customMap = $data;
    }
    public function setTemplate($tpl){
        $this->template = $tpl;
    }
    public static function getClassList($files){
        $out = array();
        $base = get_declared_classes();
        foreach($files as $item){
            include_once($item);
            $tmp = array_diff(get_declared_classes(),$base);
            foreach($tmp as $class){
                if(!isset($out[$class])){
                    $out[$class] = $item;
                }
            }
        }
        return $out;
    }
    public static function findFile($dir){
        $class = array();
        if ($fh = opendir($dir)) {
            while(false !== ($elem = readdir($fh))) {
                switch(true){
                    case ($elem!='.' && $elem!='..' && is_dir($dir.$elem)):{
                        $class = array_merge(self::findFile($dir.$elem."/"), $class);
                        break;
                    }
                    case is_file($dir.$elem):{
                        $class[] = $dir.$elem;
                        break;
                    }
                }
            }
            closedir($fh);
        }
        return $class;
    }

	public function run($FName_IDEHelper)
	{
		foreach ($this->files as $class => $file) {
			include_once($file);
			$classReflect = new \ReflectionClass($class);
			
			$propertySignatures = array();
			$publicProperties = $classReflect->getProperties(\ReflectionMethod::IS_PUBLIC);
			$propertyValues   = $classReflect->getDefaultProperties();
			foreach ($publicProperties as $property) {
				$propertyArray = array();
				//get the name
				$propertyName = $property->getName();
				//get the default value
				$propertyArray['value'] = $propertyValues[$propertyName];

				//create a new docBlock
				$propertyDoc                       = new \phpDocumentor\Reflection\DocBlock($property);
				//get the description
				$propertyArray['description']      = self::stripReturns($propertyDoc->getShortDescription());
				//get the type
				$varTag                            = $propertyDoc->getTagsByName("var");
				$propertyArray['type']             = isset($varTag[0]) ? $varTag[0]->getContent() : '';
				//add it to the property signatures
				$propertySignatures[$propertyName] = $propertyArray;
			}//end foreach $publicProperties
			
			$publicMethods    = $classReflect->getMethods(\ReflectionMethod::IS_PUBLIC);
			$methodSignatures = array();
			
			foreach ($publicMethods as $method) {
				//get the method name
				$methodName = $method->getName();
				//skip the magic methods
				if (preg_match('/^__.*\Z/', $methodName)) {
					continue;
				}

				$methodArray         = array();
				$methodArray['name'] = $methodName;

				//get the docblock
				$methodDoc = new \phpDocumentor\Reflection\DocBlock($method);

				//get the description from the docblock
				$methodArray['description'] = self::stripReturns($methodDoc->getShortDescription());

				//get the return type
				$returnTags            = $methodDoc->getTagsByName("return");
				$returnType            = isset($returnTags[0]) ? $returnTags[0]->getType() : '';
				$methodArray['return'] = $returnType;

				//get the params for the method from reflection
				$methodParams = $method->getParameters();
				foreach ($methodParams as $param) {
					$paramArray = array();

					//get the reflect properties name
					$paramArray['type'] = $param->isArray() ? "array" : '';

					//get the hint, if set
					$paramArray['classHint'] = $param->getClass() ? $param->getClass()->getName() : '';

					//get the default value
					if ($param->isOptional()) {
						$paramArray['optional'] = true;
						if ($param->isDefaultValueAvailable()) {
							$paramArray['default'] = $param->getDefaultValue();
						}
					}
					$methodArray['params']["$" . $param->getName()] = $paramArray;
				}

				//get the params from the docblock
				$paramTags = $methodDoc->getTagsByName("param");
				foreach ($paramTags as $param) {
					$paramName = $param->getVariableName();
					if (!$paramName) {
						$methodErrors[$class][$methodName][$paramName] = $param;
					}
					If (!isset($methodArray['params'][$paramName])) {
						$paramArray = array();
						$methodErrors[$class][$methodName][$paramName] = $param;
					} else {
						$paramArray = $methodArray['params'][$paramName];
					}
					$paramArray['docType']             = $param->getType();
					$paramArray['docContent']          = $param->getContent();
					$paramArray['docName']             = $param->getVariableName();
					$methodArray['params'][$paramName] = $paramArray;
				}
				$methodSignatures[$methodName] = $methodArray;
			}

			ksort($methodSignatures);
			$this->classMap[$classReflect->getName()] = $data = array();

			//output the public properties
			if (isset($propertySignatures))
			{
				ksort($propertySignatures);
				foreach ($propertySignatures as $name => $property) {
					$default = '';
					if (array_key_exists('value', $property)) {
						$default = self::getDefault($property['value']);
					}
					$data[$name] = array(
						'name' => $name,
						'type' => $property['type'],
						'default'=> $default,
						'desc'=> trim($property['description'])
					);
				}
			}
			
			$this->classMap[$classReflect->getName()]['var'] = $data;

			$data = array();
			$longest = 0;
			
			foreach ($methodSignatures as $sig) {
				if (strlen($sig['return']) > $longest) {
					$longest = strlen($sig['return']);
				}
			}

			//output the public methods

			foreach ($methodSignatures as $name => $method) {
				$func = array(
					'name'=>$name,
					'type'=>$method['return'],
					'param' => array(),
					'desc'=>$method['description']
				);

				if (isset($method['params'])) {
					$tmp = array();
					foreach ($method['params'] as $paramName => $param) {
						if (!$paramName) {
							continue;
						}

						$type = (isset($param['docType']) and !empty($param['type'])) ? $param['type'] : '';

						$type = (empty($type)  and isset($param['docType']) and !empty($param['docType'])) ?
								$param['docType'] : $type;

						$type = (empty($type)  and isset($param['classHint']) and !empty($param['classHint'])) ?
								$param['classHint'] : $type;
						$type = preg_replace('/(\|.*)/', '', $type);

						$default = '';
						if (isset($param['optional']) and $param['optional']) {
							if (array_key_exists('default', $param)) {
								$default = self::getDefault($param['default']);
							}
						}
						$tmp[] = array('name'=>$paramName, 'type'=>$type,'default'=>$default);
					}
					$func['param'] = array_merge($func['param'], $tmp);
				}
				$data[$name]  = $func;
			}
			$this->classMap[$classReflect->getName()]['function'] = $data;
            $parent = $classReflect->getParentClass();
            $this->classMap[$classReflect->getName()]['parent'] = ($parent) ? $parent->getName() : '';
            $this->classMap[$classReflect->getName()]['implements'] = $classReflect->getInterfaceNames();
            $this->classMap[$classReflect->getName()]['abstract'] = $classReflect->isAbstract();
            $this->classMap[$classReflect->getName()]['interface'] = $classReflect->isInterface();
		}
        $this->classMap = array_replace_recursive($this->classMap, $this->customMap);

		return $this->makeHelper($FName_IDEHelper);
	}

	protected function makeHelper($FName_IDEHelper){
        $str = "<?php die(\"IDE Helper for MODX\");\r\n\r\n";
        $str .= $this->template."\r\n\r\n";

		foreach($this->classMap as $name => $data){
            switch(true){
                case (!empty($data['interface'])):{
                    $str .= 'interface';
                    break;
                }
                case (!empty($data['abstract'])):{
                    $str .= 'abstract class';
                    break;
                }
                default:{
                    $str .= 'class';
                }
            }
            $str .= " ".$name;
            if(!empty($data['parent'])){
                $str .= " extends ".$data['parent'];
                $parent = $data['parent'];
            }else{
                $parent = '';
            }

            if(!empty($data['implements'])){
                $str .= " implements ".implode(",", array_values($data['implements']));
            }
            $str .= "{\r\n";
				foreach($data['var'] as $vars){
                    if($this->checkParentVars($parent, $vars['name'])){
                        if($vars['desc'] != '' || $vars['type']!=''){
                            $str.="\t/** \r\n";
                        }
                        if($vars['desc']!=''){
                            $str.="\t* ".$vars['desc']."\r\n";
                        }
                        if($vars['type']!=''){
                            $str.="\t* @var ".$vars['type']."\r\n";
                        }
                        if($vars['desc'] != '' || $vars['type']!=''){
                            $str.="\t*/\r\n";
                        }
                        $str .= "\tvar \$".$vars['name'];
                        if($vars['default']!=''){
                            $str .= " = ".$vars['default'];
                        }
                        $str .= ";\r\n";
                    }
				}
				foreach($data['function'] as $func){
                    if($this->checkParentFunction($parent, $func['name'])){
                        $pname = array();
                        $comment = '';

                        foreach($func['param'] as $param){
                            if(!empty($param['name'])){
                                $tmp = $param['name'];
                                if($param['default']!=''){
                                    $tmp .= "=".$param['default'];
                                }
                                if($param['type']!=''){
                                    $comment .= "\t* @param ".$param['type']." ".$param['name']."\r\n";
                                }
                                $pname[] = $tmp;
                            }
                        }
                        if($comment!='' || $func['desc']!='' || $func['type']!=''){
                            $str .= "\t/**\r\n";
                            if($func['desc']!=''){
                                $str .= "\t* ".$func['desc']."\r\n";
                            }
                            if($comment!=''){
                                $str .= "\t*\r\n".$comment."\t*\r\n";
                            }
                            if($func['type']!=''){
                                $str .= "\t* @return ".$func['type']."\r\n";
                            }
                            $str .= "\t*/\r\n";
                        }
                        $str .= "\tpublic function ".$func['name']."(".implode(", ", $pname)."){}\r\n\r\n";
                    }
				}
			$str .= "}\r\n";
		}
		return $this->save($str, $FName_IDEHelper);
	}
    public function checkParentFunction($parent, $name){
        return $this->checkParent($parent, 'function', $name);
    }
    public function checkParentVars($parent, $name){
        return $this->checkParent($parent, 'var', $name);
    }

    public function checkParent($parent, $type, $name){
        $flag = true;
        if(!empty($parent) && isset($this->classMap[$parent], $this->classMap[$parent][$type], $this->classMap[$parent][$type][$name])){
                $flag = false;
        }
        return $flag;
    }
    protected function save($str, $FName_IDEHelper = array()){
        $dir = dirname(__FILE__) . '/out';
        foreach($FName_IDEHelper as $folder){
            $dir = $dir."/".$folder;
            if(!file_exists($dir)){
                mkdir($dir);
            }
        }
        return file_put_contents("{$dir}/_ide_helper.php", $str);
    }
	/**
	 * Return a string as the default value
	 * @param mixed $value
	 *
	 * @return string
	 */
	protected static function getDefault($value)
	{
		if (is_array($value)) {
			$value   = isset($value[0]) ? $value[0] : '';
			return "array(" . $value . ")";
		}
		if (is_bool($value)) {
			return ($value) ? "true" : "false";
		}
		if (is_null($value)) {
			return "null";
		}
		return '"' . $value . '"';
	}
	
	/**
	 * Strips hard returns in the description
	 * @param string $value
	 *
	 * @return string
	 */
	protected static function stripReturns($value)
	{
		return trim(preg_replace('/\s+/', ' ', $value));
	}
}