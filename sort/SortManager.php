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

    //排序数组
    static private $_sort_arr = array();

    //排序完成后打印的样本数量
    const SAMPLE_COUNT = 10;

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
     * @param    integer                  $sample_index 样本索引
     */
    public function printSamples($sample_index = 0){
    	$target = array();
    	
    	if (empty($sample_index)) {
    		$target = reset(static::$_sample_arr);
    	}else if(isset(static::$_sample_arr[$sample_index])){
    		$target = static::$_sample_arr[$sample_index];
    	}

    	$capacity = count($target);

    	echo "一共生成".$capacity."个样本数据！";

    	echo '<hr/>';
    	foreach ($target as $key => $val) {
    		if ($key % 40 == 0) {
    			echo "<br />";
    		}
    		echo $val.",";
    	}
    	echo '<hr/>';
    }

    /**
     * 打印排序结果
     * @Author:  chaogao
     * @DateTime 2016-06-07T10:35:47+0800
     * @Since:   1.0.0
     * @param    integer                  $sample_index 样本索引
     */
    public function printSortResult($sample_index = 0){
    	$target = array();
    	
    	if (empty($sample_index)) {
    		$target = reset(static::$_sample_arr);
    	}else if(isset(static::$_sample_arr[$sample_index])){
    		$target = static::$_sample_arr[$sample_index];
    	}

    	$capacity = count($target);

    	foreach (static::$_sort_arr as $sort) {
    		echo "使用\"".$sort->getName()."\"对".$capacity."个样本数据进行排序<br />";

    		$sort->sort($target);

    		echo "排序结果：".$sort->getOrderResult(self::SAMPLE_COUNT)."<br />";

    		echo "消耗时间：".$sort->getSortTime()."<br />";

            echo "消耗内存：".$sort->getSortMemory()."<br />";

    		echo '<hr/>';
    	}
    }

    /**
     * 添加排序算法
     * @Author:  chaogao
     * @DateTime 2016-06-07T12:19:14+0800
     * @Since:   1.0.0
     * @param    array/SortAlgorithm                   $algorithm 算法
     */
    public function addSort($algorithm){
    	if (is_array($algorithm)) {
    		foreach ($algorithm as $val) {
    			if (!($val INSTANCEOF SortAlgorithm)) {
    				throw new Exception("addSort required SortAlgorithm type");exit();
    			}
    		}

    		static::$_sort_arr = array_merge(static::$_sort_arr,$algorithm);
    	}else if($algorithm INSTANCEOF SortAlgorithm){
    		array_push(static::$_sort_arr, $algorithm);
    	}else{
    		throw new Exception("params type error!");
    	}
    }

    /**
     * 获得所有算法
     * @Author:  chaogao
     * @DateTime 2016-06-07T11:06:40+0800
     * @Since:   1.0.0
     * @return   array           由排序名组成的数组
     */
    public function getAllSort(){
    	$arr = array();

    	foreach (static::$_sort_arr as $val) {
    		array_push($arr, $val->getName());
    	}

    	return $arr;
    }	
}