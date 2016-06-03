<?php
header("Content-Type:text/html;charset=utf-8");
//定义常量
define("RAND_COUNT", 8000);
// define("IS_ALL_SORT",FALSE);
define("IS_ALL_SORT",TRUE);
//未排序数组
$sort_arr = array('3','2','10','7','9','5','4','1','8','6');

echo "未排序数组：<br/>";
echo implode(',',$sort_arr);
echo '<hr/>';

//冒泡排序
/**
 * [bubble description]
 * @Author:  chaogao
 * @DateTime 2016-06-03T09:58:11+0800
 * @Since:   1.3.0
 * @param    [type]                   $arr     [description]
 * @param    [type]                   $arr_len [description]
 * @return   [type]                            [description]
 */
function bubble($arr,$arr_len){
	$pre_sort_time = microtime(true);
	for ($i = 0; $i < $arr_len; ++$i) { 
		for ($j = 0; $j < $arr_len - $i - 1; ++$j) { 
			if ($arr[$j] > $arr[$j + 1]) {
				$temp = $arr[$j];
				$arr[$j] = $arr[$j + 1];
				$arr[$j + 1] = $temp;
			}
		}
	}
	$aft_sort_time = microtime(true);
	return array("time"=>($aft_sort_time - $pre_sort_time),"arr"=>$arr);
}

//插入排序
// 直接插入排序的算法思路：
// （1） 设置监视哨r[0]，将待插入纪录的值赋值给r[0]；
// （2） 设置开始查找的位置j；
// （3） 在数组中进行搜索，搜索中将第j个纪录后移，直至r[0].key≥r[j].key为止；
// （4） 将r[0]插入r[j+1]的位置上。
function insert($arr,$arr_len){
	$pre_sort_time = microtime(true);
	for ($i = 1; $i < $arr_len; $i++) { 
		$temp = $arr[$i];
		$j = $i - 1;
		while ($j > -1 AND $temp < $arr[$j]) {
			$arr[$j + 1] =  $arr[$j];
			--$j;
		}
		$arr[$j + 1] = $temp;
	}
	$aft_sort_time = microtime(true);
	return array("time"=>($aft_sort_time - $pre_sort_time),"arr"=>$arr);
}

$func_name_arr = array("bubble","insert");

$func_index = 1;
//给1-10排序
$sort_arr = $func_name_arr[$func_index]($sort_arr,10);

 echo $func_name_arr[$func_index]."排序后数组：<br/>";
echo implode(',',$sort_arr['arr']);
if(IS_ALL_SORT)
{
	echo '<hr/>';
	//产生一些个随机数
	$sort_more_arr = array();

	for ($i=0; $i < RAND_COUNT; $i++) { 
		$sort_more_arr[] = rand(1,RAND_COUNT);
	}
	//给大量数字排序
	foreach ($func_name_arr as $func_key => $func_val) {
		$sort_arr = $func_val($sort_more_arr,RAND_COUNT);
		echo "<br/>".$func_val."排序"."给".RAND_COUNT."个数字排序耗时".$sort_arr['time'].'秒';
	}
}