<?php
/**
 * 快速排序
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 13:58:38
 */

class Quick extends SortAlgorithm {

	public function exerciser(array $arr){
		$length = count($arr);

		$quick_func = function (&$basic_arr,$start,$end) use (&$quick_func){
			if ($start >= $end) {
				return;
			}

			$first = $start;
			$last = $end;
			$flag = $basic_arr[$start];

			while ($first < $last) {
				while ($first < $last && $basic_arr[$last] >= $flag) {
					--$last;
				}
				$temp = $basic_arr[$last];
				$basic_arr[$last] = $basic_arr[$first];
				$basic_arr[$first] = $temp; 

				while ($first < $last && $basic_arr[$first] <= $flag) {
					++$first;
				}
				$temp = $basic_arr[$first];
				$basic_arr[$first] = $basic_arr[$last];
				$basic_arr[$last] = $temp; 
			}

			$basic_arr[$first] = $flag;
			$quick_func($basic_arr,$start,$first - 1);
			$quick_func($basic_arr,$first + 1,$end);
		};

		$quick_func($arr,0,$length - 1);
		return $arr;
	}

	public function getName(){
		return "快速排序";
	}

}