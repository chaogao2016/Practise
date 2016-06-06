<?php
/**
 * 排序管理器
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-06 15:08:12
 */

class SortManager extends AbstractSington {
    
    static protected $_instance;

    //样本数组
    static private $_sample_arr = array();

    /**
     * 生成排序样本(压入样本数组中)
     * @Author:  chaogao
     * @DateTime 2016-06-06T16:39:19+0800
     * @Since:   1.0.0
     * @param    integer                  $capacity 样本容量
     * @param    array                    $range    样本范围
     */
    public function createSample($capacity,array $range = array()){
    	if (empty($capacity)) {
    		throw new Exception("Samples capacity can't be empty");	exit();
    	}

    	$range = empty($range) ? array(1,$capacity) : $range; 

    	$temp_arr = array();

    	for ($i = 0; $i < $capacity; ++$i) { 
    		$temp_arr[] = rand($range[0],$range[1]);
    	}

    	return array_push(static::$_sample_arr, $temp_arr) - 1;
    }

    /**
     * 打印样本
     * @Author:  chaogao
     * @DateTime 2016-06-06T17:10:14+0800
     * @Since:   1.0.0
     */
    public function printSamples($sample_index){
    	$target = array();
    	
    	if (empty($sample_index)) {
    		$target = reset(static::$_sample_arr);
    	}else if(isset(static::$_sample_arr[$sample_index])){
    		$target = static::$_sample_arr[$sample_index];
    	}

    	echo '<hr/>';
    	foreach ($target as $key => $val) {
    		if ($key % 40 == 0) {
    			echo "<br />";
    		}
    		echo $val.",";
    	}
    	echo '<hr/>';
    }
}