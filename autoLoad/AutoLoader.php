<?php
/**
 * 自动加载类(每个方法使用不同的加载规则)
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 18:08:32
 */

require_once("/config/config.php");

class AutoLoader {
    
	private $_load_func_arr = array();

	static private $_instance;

    private function __construct(){
    	$reflect = new ReflectionClass(__CLASS__);

    	$methods = $reflect->getMethods();

    	array_splice($methods,0,3);
    	
    	$this->_load_func_arr = $methods;

    	foreach ($this->_load_func_arr as $func) {
    		spl_autoload_register(array($this,$func->name));
    	}
    }

    static function addLoader(callable $function){
    	empty(static::$_instance) && static::$_instance = new static;

    	$instance = static::$_instance;

    	(!empty($function)) && array_push($instance->_load_func_arr, $function);
    	if (!empty($function)) {
    		array_push($instance->_load_func_arr, $function);

    		spl_autoload_register(array($instance,'sortLoader'));
    	}
    }

    private function __clone(){}

    private function sortLoader($class_name){
    	$file = SORT_PATH.$class_name.".php";
    	require_once($file);  
		if (is_file($file)) {  
			require_once($file);  
		} 
    }
}