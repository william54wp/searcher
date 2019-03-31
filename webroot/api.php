<?php
namespace xunsearch\api;
require_once('/webroot/api/xunsearch/lib/XS.php');

class searcher {
    function cleanIndex(){
        $xs = new XS('novel');
        $xs->index()->clean();
    }
} 