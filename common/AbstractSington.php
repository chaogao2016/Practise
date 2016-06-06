<?php
/**
 * 单例基类
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-06 15:13:09
 */

abstract class AbstractSington {

    /**
     * 构造函数
     * @Author:  chaogao
     * @DateTime 2016-06-06T11:40:43+0800
     * @Since:   1.0.0
     */
    protected function __construct(){
        
    }

    /**
     * clone回调
     * @Author:  chaogao
     * @DateTime 2016-06-06T11:41:08+0800
     * @Since:   1.0.0
     */
    protected function __clone(){}

    /**
     * 获得实例
     * @Author:  chaogao
     * @DateTime 2016-06-06T11:42:30+0800
     * @Since:   1.0.0
     * @return   Front                   返回实例
     */
    static public function getInstance(){
    	empty(static::$_instance) && static::$_instance = new static();

    	return static::$_instance;
    }
}