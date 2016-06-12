<?php

require_once(dirname(__FILE__)."/config/Config.php");

require_once(dirname(__FILE__)."/common/Front.php");

Front::getInstance()->run("sort");