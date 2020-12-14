<?php

namespace News;

require_once "./news/News.php";

use News\News;

/**
 * ニュース取得処理のインターフェース
 */
interface INewsReader
{
    /**
     * ニュースを 1 件取得する
     */
    public function fetchFirst(): News;
}
