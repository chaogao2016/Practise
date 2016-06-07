<?php
/**
 * 插入排序
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-07 11:54:57
 */

class Insert extends SortAlgorithm {

	public function exerciser(array $arr){
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

		return $arr;
	}

	public function getName(){
		return "插入排序";
	}
}