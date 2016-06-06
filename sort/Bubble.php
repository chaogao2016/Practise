<?php
/**
 * 冒泡排序
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 13:58:38
 */

class Bubble extends SortAlgorithm {

	private function sort(){
		$this->_sort_start = microtime(true);

		$length = count($this->_sample);

		for ($i = 0; $i < $length; ++$i) { 
			for ($j = 0; $j < $length - $i - 1; ++$j) { 
				if ($this->_sample[$j] > $this->_sample[$j + 1]) {
					$temp = $this->_sample[$j];
					$this->_sample[$j] = $this->_sample[$j + 1];
					$this->_sample[$j + 1] = $temp;
				}
			}
		}
		$this->_sort_end = microtime(true);
		return array("time"=>($aft_sort_time - $pre_sort_time),"arr"=>$arr);
	}

}