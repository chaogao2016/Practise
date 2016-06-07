<?php
/**
 * 插入排序
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-07 11:54:57
 */

class Insert extends SortAlgorithm {
    
    public function sort(array $arr){
		$this->_sort_start = microtime(true);

		$length = count($arr);

		for ($i = 1; $i < $length; $i++) { 
			$temp = $arr[$i];
			$j = $i - 1;
			while ($j > -1 AND $temp < $arr[$j]) {
				$arr[$j + 1] =  $arr[$j];
				--$j;
			}
			$arr[$j + 1] = $temp;
		}

		$this->_sort_end = microtime(true);
		
		$this->_order_samples = $arr;
	}

	public function getName(){
		return "插入排序";
	}
}