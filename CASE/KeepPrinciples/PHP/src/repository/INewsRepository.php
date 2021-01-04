<?php

namespace Repository;

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
    public function getTopByLangAsArticle(string $lang): IArticle;
}
