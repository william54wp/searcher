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

if (isset($_GET['p']) && $_GET['p'] > 1) {
    $page = $_GET['p'];
} else {
    $page = 1;
}
;
$pagesize = 20;
$result = $search->search($keyword, $pagesize, $page);

printf("共计%s条记录，共%s页，第%s页", $result['size'], ceil($result['size'] / $pagesize), $page);

echo "<dl>";
foreach ($result['data'] as $item) {
    printf("<dt>%s:<b>[%s]</b>&nbsp;%s</dt>", $item->id, $item->title, $item->path);
    printf("<dd>%s</dd>", $item->content);
    printf("<hr/>");
}
echo "</dl>";