<?php
/**
 * 程序入口
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-06 11:33:15
 */

require_once("/config/Config.php");

require_once("/common/Function.php");

require_once("/common/AbstractSington.php");

require_once('/autoLoad/AutoLoader.php');

class Front extends AbstractSington {

	static protected $_instance;

    /**
     * 启动应用
     * @Author:  chaogao
     * @DateTime 2016-06-06T11:47:39+0800
     * @Since:   1.0.0
     * @return   Front                   返回实例
     */
    public function run(){
    	register_shutdown_function("global_error_handle");

    	AutoLoader::getInstance()->init();

    	return static::$_instance;
    }
}