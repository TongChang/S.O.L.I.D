<?php

namespace Repository;

use Article\IArticle;
use Article\ArticleBuilder;
use News\INewsReader;
use Repository\INewsRepository;

/**
 * ニュース関連のリポジトリ
 */
class NewsRepository implements INewsRepository
{

    /**
     * ニュース読み取りくん
     *
     * @var INewsReader
     */
    private $newsReader;

    /**
     * コンストラクタ
     *
     * @param INewsReader $newsReader
     */
    public function __construct(INewsReader $newsReader)
    {
        $this->newsReader = $newsReader;
    }
    /**
     * 今日のニュースを取得します。
     *
     * @param  string $lang 言語
     * @return IArticle 記事内容
     */
    public function getTopByLangAsArticle(string $lang): IArticle
    {
        $news = $this->newsReader->fetchFirst();
        $articleBuilder = new ArticleBuilder();
        return $articleBuilder->build($lang, $news);
    }
}
