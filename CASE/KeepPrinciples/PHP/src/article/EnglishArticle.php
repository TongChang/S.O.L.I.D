<?php

namespace Article;

use Article\IArticle;

/**
 * アメリカ英語記事
 */
class EnglishArticle implements IArticle
{

    /**
     * 日付のフォーマット
     *
     * @var string 日付のフォーマット
     * @see {@link https://mommysenglish.com/date-1423}
     */
    private $FORMAT_DATE = "F d, Y";

    /**
     * タイトル
     *
     * @var string
     */
    private $title;

    /**
     * 日付
     *
     * @var int
     */
    private $date;

    /**
     * 内容
     *
     * @var string
     */
    private $contents;

    /**
     * コンストラクタ
     *
     * @param string $title    タイトル
     * @param int    $date     日付
     * @param string $contents 内容
     */
    public function __construct(string $title, int $date, string $contents)
    {
        $this->title = $title;
        $this->date = $date;
        $this->contents = $contents;
    }

    /**
     * 内容を返却する
     *
     * @return string 内容
     */
    public function getContents(): string
    {
        return $this->contents;
    }

    /**
     * 日付を返却する
     *
     * @return string 日付
     */
    public function getDate(): string
    {
        return date($this->FORMAT_DATE, $this->date);
    }

    /**
     * 記事タイトルを返却する
     *
     * @return string 記事タイトル
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
