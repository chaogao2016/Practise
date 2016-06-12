<?php
/**
 * 程序入口
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-06 11:33:15
 */

require_once(BASE_PATH."common/Function.php");

require_once(BASE_PATH."common/AbstractSington.php");

require_once(BASE_PATH.'autoLoad/AutoLoader.php');

class Front extends AbstractSington {

	static protected $_instance;

    /**
     * 启动应用
     * @Author:  chaogao
     * @DateTime 2016-06-06T11:47:39+0800
     * @Since:   1.0.0
     * @param    string          $target 目标目录
     * @return   Front                   返回实例
     */
    public function run($target){
    	register_shutdown_function("global_error_handle");

    	AutoLoader::getInstance()->init();

        require_once(BASE_PATH.$target."/index.php");

    	return static::$_instance;
    }
}