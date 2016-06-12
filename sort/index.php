<?php
/**
 * 排序入口
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-12 17:56:23
 */

$sort_manager = SortManager::getInstance();

//创建样本
$sort_index = $sort_manager->createSample(6000);

//添加算法
$arr = array(
	new Original(),
	new Insert(),
	new Bubble(),
	new Quick(),
	new Choice(),
	new Merge(),
	new Heap(),
	new Shell(),
	);
$sort_manager->addSort($arr);

//排序并打印结果
$sort_manager->printSortResult();