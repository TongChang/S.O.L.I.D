<?php

namespace News;

/**
 * JSON ファイルからニュースの内容を取得する
 */
class JsonNewsReader implements INewsReader
{

    /**
     * ファイルパス
     * @var string
     */
    private $jsonFilePath;

    public function __construct(string $filePath)
    {
        $this->jsonFilePath = $filePath;
    }

    /**
     * JSON ファイルパスから内容を配列で取得します。
     * @param string $filePath ファイルパス
     * @return object
     */
    private function fetchJsonAsObjectFromFilePath(string $filePath): object
    {
        return json_decode(
            mb_convert_encoding(
                file_get_contents($filePath),
                'UTF8',
                'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN'
            )
        );
    }

    /**
     * 最初のデータを取得します。
     */
    public function fetchFirst(): News
    {
        $json = $this->fetchJsonAsObjectFromFilePath($this->jsonFilePath);
        $count = $json->count;
        if ($count > 0) {
            $news = $json->news_data[0];
            return new News($news);
        } else {
            return null;
        }
    }
}
