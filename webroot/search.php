<?php
/**
 * Index Page of search
 *
 * PHP Version 7.3.3
 *
 * @category  Controller
 * @package   Controller
 * @author    william_wp <william_wp@hotmail.com>
 * @copyright 2019 william_wp
 * @license   https://localhost/license.txt license
 * @link      http://url.com
 */

require_once 'api.php';
$search = new api\Searcher;

$keyword = $_GET['s'];
$page = $_GET['p'];

$searchResult = $search->searchPage($keyword, 8, $page);

echo json_encode($searchResult);
