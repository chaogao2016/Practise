<?php

require("/common/Front.php");

Front::getInstance()->run();

$sort_manager = SortManager::getInstance();

//创建样本
$sort_index = $sort_manager->createSample(4000);

//添加算法
$arr = array(
	new Insert(),
	new Bubble(),
	);
$sort_manager->addSort($arr);

//排序
$sort_manager->printSortResult();

