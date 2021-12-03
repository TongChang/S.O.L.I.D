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
    private $titleJa;

    /**
     * (日本語)本文
     *
     * @var string
     */
    private $contentsJa;

    /**
     * (日本語)URL
     *
     * @var string
     */
    private $urlJa;

    /**
     * (英語)タイトル
     *
     * @var string
     */
    private $titleEn;

    /**
     * (英語)本文
     *
     * @var string
     */
    private $contentsEn;

    /**
     * (英語)URL
     *
     * @var string
     */
    private $urlEn;

    /**
     * コンストラクタ
     *
     * @param object $news ニュースを JSON から Object にしたやつ
     */
    public function __construct(object $news)
    {
        $this->date = str_replace(".", "-", $news->date);

        $this->titleJa = $news->title_ja;
        $this->contentsJa = $news->contents_ja;
        $this->urlJa = $news->url_ja;

        $this->titleEn = $news->title_en;
        $this->contentsEn = $news->contents_en;
        $this->urlEn = $news->url_en;
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
        return $this->titleJa;
    }

    /**
     * (日本語)本文を返却する
     *
     * @return string (日本語)本文
     */
    public function getContentsJa(): string
    {
        return $this->contentsJa;
    }

    /**
     * (日本語)URLを返却する
     *
     * @return string (日本語)URL
     */
    public function getUrlJa(): string
    {
        return $this->urlJa;
    }

    /**
     * (英語)タイトルを返却する
     *
     * @return string (英語)タイトル
     */
    public function getTitleEn(): string
    {
        return $this->titleEn;
    }

    /**
     * (英語)本文を返却する
     *
     * @return string (英語)本文
     */
    public function getContentsEn(): string
    {
        return $this->contentsEn;
    }

    /**
     * (英語)URLを返却する
     *
     * @return string (英語)URL
     */
    public function getUrlEn(): string
    {
        return $this->urlEn;
    }
}
