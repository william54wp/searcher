<?php
/**
 * Controller of Searcher
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

// 引用 search api
require_once 'api.php';
// 传入参数
$path = $_POST['path'];
$id = intval($_POST['index']);
// 构造地址
$filepath = sprintf("/webroot/H/%s", $path);
// 检测并导入
if (is_file($filepath)) {
    try {
        $content = file_get_contents($filepath);
        $coding = mb_detect_encoding($content, ['GBK', 'gb2312', 'UTF-8', 'UTF-16LE', 'UTF-16BE', 'ISO-8859-1']);
        if ($coding == 'ISO-8859-1') {
            $coding = 'gb2312';
        }
        $content = mb_convert_encoding($content, 'UTF-8', $coding);
        $doc = [
            'id' => $id,
            'path' => $path,
            'title' => basename($filepath),
            'content' => $content,
        ];
        $search = new api\Searcher;
        $search->addDoc($doc);
        $status = true;
        $msg = 'add Successful';
    } catch (\XSException $e) {
        $status = false;
        $msg = $e->message;
    }
} else {
    $status = false;
    $msg = 'not a file';
}

$result = [
    'status' => $status,
    'msg' => $msg,
];

echo json_encode($result);
