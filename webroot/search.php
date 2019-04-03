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

$searchResult = $search->search($keyword);

var_dump($searchResult);

echo json_encode(['size' => $searchResult['size'], 'data' => $data]);
