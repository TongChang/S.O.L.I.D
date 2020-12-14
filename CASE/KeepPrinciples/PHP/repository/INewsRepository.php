<?php

namespace Repository;

require_once "./article/IArticle.php";

use Article\IArticle;

/**
 * News Repository のインターフェースです。
 */
interface INewsRepository
{
    /**
     * Top を 1 件取得する。
     *
     * @param string $lang
     * @return void
     */
    function getTopByLangAsArticle(string $lang): IArticle;
}
