<?php
/**
 * 原生排序
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 13:58:38
 */

class Original extends SortAlgorithm {

	public function exerciser(array $arr){
		sort($arr,SORT_NUMERIC);
		
		return $arr;
	}

	public function getName(){
		return "PHP原生排序";
	}

}