<?php
/**
 * 排序算法抽象类，定义所有排序算法的基本行为
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 10:25:01
 */

abstract class SortAlgorithm{
	//有序样本
	protected $_order_samples;

	//排序开始时间
	protected $_sort_start;

	//排序结束时间
	protected $_sort_end;

	/**
	 * 对样本进行排序
	 * @Author:  chaogao
	 * @DateTime 2016-06-07T11:29:00+0800
	 * @Since:   1.0.0
	 * @param    array                    $arr 排序样本
	 */
    abstract public function sort(array $arr);

    /**
     * 获得算法名称
     * @Author:  chaogao
     * @DateTime 2016-06-07T11:43:54+0800
     * @Since:   1.0.0
     * @return   string                   算法名
     */
    abstract public function getName();

    /**
     * 获得排序消耗时间
     * @Author:  chaogao
     * @DateTime 2016-06-07T11:43:29+0800
     * @Since:   1.0.0
     * @return   float                  	消耗时间
     */
    public function getSortTime(){
    	if (empty($this->_sort_start) || empty($this->_sort_end)) {
    		throw new Exception("Please call sort before call getSortTime");exit();
    	}

    	return round($this->_sort_end - $this->_sort_start,6);
    }

    /**
     * 返回排序结果的字符串
     * @Author:  chaogao
     * @DateTime 2016-06-07T12:05:35+0800
     * @Since:   1.0.0
     * @param    integer                   $count 
     * @return   string                          
     */
    public function getOrderResult($count = 10){
    	return implode(",", array_slice($this->_order_samples,0,$count));
    }
}