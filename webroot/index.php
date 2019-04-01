<?php
include_once 'api.php';

$search = new api\Searcher;
$str = '乳房';
$result = $search->search($str);
var_dump($result);