<?php

require("/common/Front.php");

Front::getInstance()->run();

$sort_manager = SortManager::getInstance();

//创建样本
$sort_manager->createSample(900);