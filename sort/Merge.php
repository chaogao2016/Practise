<?php
/**
 * 归并排序
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 13:58:38
 */

class Merge extends SortAlgorithm {

	public function exerciser(array $arr){
		$length = count($arr);

		//merge函数将指定的两个有序数组(arr1,arr2)合并并且排序
		function al_merge($arrA,$arrB)
		{
		    $arrC = array();
		    while(count($arrA) && count($arrB)){
		        $arrC[] = $arrA['0'] < $arrB['0'] ? array_shift($arrA) : array_shift($arrB);
		    }
		    return array_merge($arrC, $arrA, $arrB);
		}

		//归并排序主程序
		function al_merge_sort($arr){
		    $len=count($arr);
		    if($len <= 1)
		        return $arr;
		    $mid = intval($len/2);
		    $left_arr = array_slice($arr, 0, $mid);
		    $right_arr = array_slice($arr, $mid);
		    $left_arr = al_merge_sort($left_arr);
		    $right_arr = al_merge_sort($right_arr);
		    $arr=al_merge($left_arr, $right_arr);
		    return $arr;
		}

		return al_merge_sort($arr);
	}

	public function getName(){
		return "归并排序";
	}

}