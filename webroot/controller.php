<?php
/**
 * Controller Novel Searcher
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
$api = new api\Searcher;
$action = $_GET['action'];
switch ($action) {
    // action for clear index;
    case 'clear':
        $result = $api->clear();
        break;
    // action for rebuild index
    case 'rebuild';
        break;
    default:
        break;
}
