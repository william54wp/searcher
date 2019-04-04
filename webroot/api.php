<?php
/**
 * Api for Xunsearch
 * PHP Version 7.3.3
 * this is Api for xunsearch
 *
 * @category  Api
 * @package   Api
 * @author    william_wp <william_wp@hotmail.com>
 * @copyright 2019 william_wp
 * @license   https://localhost/license.txt license
 * @link      http://url.com
 */

namespace api;

require_once 'api/xunsearch/lib/XS.php';
/**
 * Class Search
 *
 * @category  Api
 * @package   Api
 * @author    william_wp <william_wp@hotmail.com>
 * @copyright 2019 william_wp
 * @license   https://localhost/license.txt license
 * @link      http://url.com
 */

class Searcher
{
    protected $xs;

    /**
     * Class Init
     */
    public function __construct()
    {
        $this->xs = new \XS('novel');
    }

    /**
     * Public API action add Doc to Index
     *
     * @param array $docItem doc for add to index
     *
     * @return void
     */
    public function addDoc($docItem)
    {
        try {
            $index = $this->xs->index;
            $doc = new \XSDocument();
            $doc->setFields($docItem);
            $result = $index->add($doc);
            return $result;
        } catch (\XSException $e) {
            var_dump($e);
        }

    }

    /**
     * Public action for Search from xunsearch server
     *
     * @param string $query content
     *
     * @return array result
     */
    public function search($query)
    {
        try {
            $search = $this->xs->search;
            $search->setQuery($query);
            $search->setLimit(8);
            $data = $search->search();
            $count = $search->count();
            $result = [];
            foreach ($data as $item) {
                $searchResultItem = [
                    'id' => $item->id,
                    'title' => $item->title,
                    'content' => $item->content,
                    'path' => $item->path,
                ];
                array_push($result, $searchResultItem);
            }
            return ['status' => true, 'size' => $count, 'data' => $result];
        } catch (\Exception $e) {
            return ['status' => false,
                'msg' => $e,
            ];
        }
    }
    /**
     * Public action for Search from xunsearch server
     *
     * @param string $query    content
     * @param int    $pagesize pagesize of return
     * @param int    $page     page of return
     *
     * @return array result
     */
    public function searchPage($query, $pagesize = 10, $page = 1)
    {
        $offset = $pagesize * ($page - 1);
        try {
            $search = $this->xs->search;
            $search->setQuery($query);
            $search->setLimit($pagesize, $offset);
            $data = $search->search();
            $count = $search->count();
            $result = [];
            foreach ($data as $item) {
                $searchResultItem = [
                    'id' => $item->id,
                    'title' => $item->title,
                    'content' => $item->content,
                    'path' => $item->path,
                ];
                array_push($result, $searchResultItem);
            }
            return ['status' => true, 'size' => $count, 'data' => $result];
        } catch (\Exception $e) {
            return ['status' => false,
                'msg' => $e,
            ];
        }
    }

    /**
     * Api action for clear Index
     *
     * @return bool result
     */
    public function clear()
    {
        try {
            $this->xs->index->clean();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
