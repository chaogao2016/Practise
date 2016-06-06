<?php
/**
 * 排序算法抽象类，定义所有排序算法的基本行为
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 10:25:01
 */

abstract class SortAlgorithm{

	//样本
	protected $_sample;

	//排序开始时间
	protected $_sort_start;

	//排序结束时间
	protected $_sort_end;

	protected function __construct(array &$sample){
		$this->_sample = $sample;
	}

	/**
	 * 对样本进行排序
	 * @Author:  chaogao
	 * @DateTime 2016-06-06T17:52:35+0800
	 * @Since:   1.0.0
	 */
    abstract protected function sort();

    
}