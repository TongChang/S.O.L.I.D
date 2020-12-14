<?php

namespace Usecase;

require_once "./repository/INewsRepository.php";

use Repository\INewsRepository;

/**
 * 記事関連のユースケースです。
 */
class ArticleUsecase
{
    /**
     * リポジトリ
     *
     * @var INewsRepository
     */
    private $newsRepository;

    /**
     * コンスト
     *
     * @param INewsRepository $repository リポジトリ
     */
    public function __construct(INewsRepository $repository)
    {
        $this->newsRepository = $repository;
    }
    /**
     * 言語を元に記事内容を取得する。
     *
     * @param  string $lang 言語
     * @return string 記事内容をよしなにフォーマットしたもの
     */
    function getArticleByLang(string $lang): string
    {
        date_default_timezone_set('Asia/Tokyo');

        $article = $this->newsRepository->getTopByLangAsArticle($lang);

        return $article->getTitle() . "\n" .
            $article->getDate() . "\n" .
            "===================================\n" .
            $article->getContents() . "\n";
    }
}
