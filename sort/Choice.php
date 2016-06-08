<?php
/**
 * 选择排序
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 13:58:38
 */

class Choice extends SortAlgorithm {

	public function exerciser(array $arr){
		$length = count($arr);

		for ($i = 0; $i < $length; ++$i) { 
			$min = $i;
			for ($j = $i; $j < $length; ++$j) { 
				if ($arr[$j] < $arr[$min]) {
					$min = $j;
				}
			}

			$temp = $arr[$min];
			$arr[$min] = $arr[$i];
			$arr[$i] = $temp;
		}
		
		return $arr;
	}

	public function getName(){
		return "选择排序";
	}

}