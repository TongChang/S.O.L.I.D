<?php

require_once 'vendor/autoload.php';

use Repository\NewsRepository;
use News\JsonNewsReader;
use Usecase\ArticleUsecase;

/**
 * LSP のサンプルコード
 *
 * @param string $lang
 * @return void
 */
function main(string $lang)
{
    date_default_timezone_set('Asia/Tokyo');

    // 依存性を注入しちゃうぞ(ここ差し替えれば DB でも API でも切り替えられる・・・本来は DI or Facade でおこなうべき)
    // プロダクション環境ではこの呼出がベースとなるが、 UT 環境ではこれを差し替えて細かいロジッテストをする
    $newsReader = new JsonNewsReader("../../news.json");
    $repository = new NewsRepository($newsReader);
    $usecase = new ArticleUsecase($repository);

    try {

        $todayNews = $usecase->getArticleByLang($lang);
        print($lang . "のニュースです。\n");
        print("\n");

        print($todayNews);

        print("\n");
        print("以上です。");
    } catch (\Error $error) {
        print($lang . "のニュースの取得に失敗しました。\n");
        print($error->getMessage());
    }
}

main($argv[1]);
