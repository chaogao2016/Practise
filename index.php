<?php

require_once('./autoLoad/AutoLoader.php');

AutoLoader::addLoader(function(){});

$temp = new Bubble();

$temp->sort();