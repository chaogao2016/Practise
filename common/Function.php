<?php
/**
 * 通用函数
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-06 10:44:01
 */

/**
 * 将变量信息以易于阅读的格式输出
 * @Author:  chaogao
 * @DateTime 2016-06-06T11:05:18+0800
 * @Since:   1.0.0
 * @param    mix                   $data 	要输出的变量
 */
function debug_echo($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	exit();
}

/**
 * 全局错误处理
 * @Author:  chaogao
 * @DateTime 2016-06-06T11:53:44+0800
 * @Since:   1.0.0
 */
function global_error_handle(){

}