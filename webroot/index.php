<?php
require_once('./api.php');
$api = new xunsearch\api\searcher;
echo $api->cleanIndex();