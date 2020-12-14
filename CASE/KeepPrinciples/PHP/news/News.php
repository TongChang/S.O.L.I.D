<?php

namespace News;

/**
 * ニュースの API レスポンスの 1 記事の内容を抽象化するクラス。
 */
class News
{
    /**
     * 記事の公開日
     *
     * @var string
     */
    private $date;

    /**
     * (日本語)タイトル
     *
     * @var string
     */
    private $title_ja;

    /**
     * (日本語)本文
     *
     * @var string
     */
    private $contents_ja;

    /**
     * (日本語)URL
     *
     * @var string
     */
    private $url_ja;

    /**
     * (英語)タイトル
     *
     * @var string
     */
    private $title_en;

    /**
     * (英語)本文
     *
     * @var string
     */
    private $contents_en;

    /**
     * (英語)URL
     *
     * @var string
     */
    private $url_en;

    /**
     * コンストラクタ
     *
     * @param object $news ニュースを JSON から Object にしたやつ
     */
    public function __construct(object $news)
    {
        $this->date = str_replace(".", "-", $news->date);

        $this->title_ja = $news->title_ja;
        $this->contents_ja = $news->contents_ja;
        $this->url_ja = $news->url_ja;

        $this->title_en = $news->title_en;
        $this->contents_en = $news->contents_en;
        $this->url_en = $news->url_en;
    }

    /**
     * 日付を返却する
     *
     * @return string 日付
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * (日本語)タイトルを返却する
     *
     * @return string (日本語)タイトル
     */
    public function getTitleJa(): string
    {
        return $this->title_ja;
    }

    /**
     * (日本語)本文を返却する
     *
     * @return string (日本語)本文
     */
    public function getContentsJa(): string
    {
        return $this->contents_ja;
    }

    /**
     * (日本語)URLを返却する
     *
     * @return string (日本語)URL
     */
    public function getUrlJa(): string
    {
        return $this->url_ja;
    }

    /**
     * (英語)タイトルを返却する
     *
     * @return string (英語)タイトル
     */
    public function getTitleEn(): string
    {
        return $this->title_ja;
    }

    /**
     * (英語)本文を返却する
     *
     * @return string (英語)本文
     */
    public function getContentsEn(): string
    {
        return $this->contents_ja;
    }

    /**
     * (英語)URLを返却する
     *
     * @return string (英語)URL
     */
    public function getUrlEn(): string
    {
        return $this->url_ja;
    }
}
