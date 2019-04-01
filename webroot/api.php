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
    /**
     * Add Doc
     *
     * @param  XSDoc $doc doc for add to index
     *
     * @return void
     */
    public function addDoc($docItem)
    {
        try {
            $xs = new \XS('novel');
            $index = $xs->index;
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
     * @return string result
     */
    public function search($query)
    {
        $xs = new \XS('novel');
        $search = $xs->search;
        $search->setQuery($query);
        $result = $search->search();
        return $result;
    }

    public function clear()
    {
        $xs = new \XS('novel');
        $xs->index->clean();
    }
}
