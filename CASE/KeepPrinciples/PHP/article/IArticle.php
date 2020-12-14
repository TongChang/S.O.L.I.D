<?php

namespace Article;

/**
 * 記事のインターフェース
 */
interface IArticle
{
    /**
     * 記事タイトルを取得する。
     *
     * @return string 記事タイトル
     */
    function getTitle(): string;

    /**
     * 記事の日付を取得する。
     *
     * @return string 記事の日付
     */
    function getDate(): string;

    /**
     * 記事の内容を取得する。
     *
     * @return string 記事の内容
     */
    function getContents(): string;
}
