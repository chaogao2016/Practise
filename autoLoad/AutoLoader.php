<?php
/**
 * 自动加载类(每个方法使用不同的加载规则)
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 18:08:32
 */

class AutoLoader extends AbstractSington {
    
    static protected $_instance;

	private $_load_func_arr = array();

    /**
     * 初始化部分自动加载方法
     * @Author:  chaogao
     * @DateTime 2016-06-06T15:23:47+0800
     * @Since:   1.0.0
     * @return   AutoLoader                   返回实例
     */
    public function init(){
        $reflect = new ReflectionClass(__CLASS__);

        $methods = $reflect->getMethods();

        foreach ($methods as $method) {
            $endstr = substr($method->name, -6);
            if ($endstr == "Loader" && $method->name != "addLoader") {
                array_push($this->_load_func_arr, $method->name);
            }
        }
        
        foreach ($this->_load_func_arr as $func) {
            $result = spl_autoload_register(array($this,$func));

            if($result === false){
                throw new Exception("{$func} autoload failed");
            }
        }

        return static::$_instance;
    }

    /**
     * 注册自动加载方法
     * @Author:  chaogao
     * @DateTime 2016-06-06T10:23:38+0800
     * @Since:   1.0.0
     * @param    callable                 $function 回调方法
     */
    public function addLoader(callable $function){
    	(!empty($function)) && array_push($this->_load_func_arr, $function);
    	if (!empty($function)) {
    		array_push($this->_load_func_arr, $function);

    		$result = spl_autoload_register($function);

            if($result === false){
                throw new Exception("{$function} autoload failed");
            }
    	}

        return static::$_instance;
    }

    /**
     * 排序加载器，专用于加载sort下文件
     * @Author:  chaogao
     * @DateTime 2016-06-06T10:25:44+0800
     * @Since:   1.0.0
     * @param    string                   $class_name 类名
     */
    private function sortLoader($class_name){
    	$file = SORT_PATH.$class_name.".php";

		if (is_file($file)) {  
			require_once($file);  
		} 
    }

    /**
     * 公用加载器
     * @Author:  chaogao
     * @DateTime 2016-06-06T16:25:16+0800
     * @Since:   1.0.0
     * @param    string                   $class_name 类名
     */
    private function commonLoader($class_name){
        $file = COMMON_PATH.$class_name.".php";

        if (is_file($file)) {  
            require_once($file);  
        } 
    }
}