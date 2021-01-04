<?php

namespace Article;

use Article\IArticle;
use Article\EnglishArticle;
use Article\JapaneseArticle;
use News\News;

/**
 * ニュースオブジェクトを元に記事オブジェクトを生成する
 */
class ArticleBuilder
{
    /**
     * 記事オブジェクトを組み立てて返却します。
     *
     * @param string $lang 言語
     * @param array $news ニュース内容
     * @return News 記事
     */
    public function build(string $lang, News $news): IArticle
    {
        switch ($lang) {
            case "ja":
                return new JapaneseArticle($news->getTitleJa(), strtotime($news->getDate()), $news->getContentsJa());
                break;
            case "en":
                return new EnglishArticle($news->getTitleEn(), strtotime($news->getDate()), $news->getContentsEn());
                break;
            default:
                throw new \Error("その言語には対応していません。");
        }
    }
}
