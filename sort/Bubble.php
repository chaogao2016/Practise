<?php
/**
 * 冒泡排序
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 13:58:38
 */

class Bubble extends SortAlgorithm {

	public function sort(array $arr){
		$this->_sort_start = microtime(true);

		$length = count($arr);

		for ($i = 0; $i < $length; ++$i) { 
			for ($j = 0; $j < $length - $i - 1; ++$j) { 
				if ($arr[$j] > $arr[$j + 1]) {
					$temp = $arr[$j];
					$arr[$j] = $arr[$j + 1];
					$arr[$j + 1] = $temp;
				}
			}
		}
		$this->_sort_end = microtime(true);
		
		$this->_order_samples = $arr;
	}

	public function getName(){
		return "冒泡排序";
	}

}