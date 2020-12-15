# PHP

## 気をつけた点

### SRP

- 1 つのモジュール ( クラス ) が単一責務になるように気をつけた

| class(モジュール) | 責務                                                                                                               | 知っていること                                                          | 変更理由                                                                                                                |
| ----------------- | ------------------------------------------------------------------------------------------------------------------ | ----------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------- |
| Article           | 言語ごとの表示内容の変換方法を担う。                                                                               | 左記の通り                                                              | 言語ごとの表示内容の変換方法が変わったら変更。                                                                          |
| ArticleUsecase    | どこからとか気にすることなく、ただ設定されているものに準じて記事を取得するだけ。                                   | INewsRepository の public メソッドと IArticle の public メソッド。      | ニュース取得の手続きの種類が増えた、既存に変更があったら変更(Repository の呼び方を増やす、新しい Repository を呼ぶなど) |
| NewsRepository    | ニュースを取得する処理を隠蔽する(自分を呼び出すもの=usecaseは、ソースが何だとか気にしないで同じ処理を実行できる)。 | INewsReader のメソッドと Builder の public メソッドと IArticle の存在。 | Reader の扱い方が変わったら変更。                                                                                       |
| ArticleBuilder    | ニュース内容と言語から記事を生成するだけ。                                                                         | 言語と News の public メソッドと Article の作り方。                     | 言語が増えたら変更。                                                                                                    |
| NewsReader        | ニュースを読み込むだけ。                                                                                           | ニュースのソースの内容と News の作り方。                                | ニュースのソースに変更があったら変更。                                                                                  |
| News              | ニュースの内容を変換する。                                                                                         | ニュース 1 件の内容。                                                   | このアプリで扱いたいニュース 1 件の情報に変更があったら変更。                                                           |

### OCP

- ニュースのソースが変更になったら、既存に手を入れるのではなく、クラスを作って注入することで使えるようになっている。
- 言語が増えた時、言語クラスを追加して、 Builder を変更することで言語を追加できるようになっている。
  - 言語クラスごとに表示内容を切り替えられるようにっている。

### LSP

- 言語ごとの記事クラスについて、同じインターフェースを実装することで置換原則を守るようにした。
- また、 Repository や NewsReader に関しても同様に同じインターフェースを実装することで置換原則を守るようにした。

### IDP

- OCP に記載した通り。また、Pure PHP を超えてフレームワークなどに今の所依存していない。
- もしフレームワークに依存する場合、インターフェースを実装する箇所でフレームワークに依存するようにすべきと考える。

### DIP

- それぞれのレイヤ間では、インターフェースに依存し、実体は外部から選択して組み合わせできるようにしている。

## クラス図

![クラス図 from KroKi](https://kroki.io/plantuml/svg/eNrNVt1OE0EYvd-n2Esa3RfAhAAKicSgMXJthu20LC67ze40hChJZ1eoQhtQUJQawQgIXtRwo4gWH2a6bXkLZ2Zny3amohea2DTtdr4z5_s7802HfQQ8VJyzNa0AzAcgD_WiD03gQ_2hptOXaQPf10c8ZJk2nOoxGYbBv6_kIbrnZsGCQI0u3AJOfsBHnuXkdZs-ZzhuUVvUHBdB3bPyM0h3c4krbiXhBglOSFglwVcSHpDwO3sIjuOH9uYhwXV9HJggC_WBaGmfBCvR2vuMToJPJDzi2OcEnxF8SAJMglUSPiNhmBCcaNDJMucXeXqw4PoWcr0Fmg8PwXIQ9HLAhPrNSTjv300D1IQLcZ4jvki7J-FBnTGItFOF_Lu8op42zPFyXmQkKlrmuf8gQUOUE9ejtZfR2RYJHkd7T1trtdZGtdl4Q0t3vr3b2WwQ_JqVDu-wGuK6VENSCjhxohCKaJ58azY2WNHxR150xSWlxietlbcEvyC4xtkrpIQ7e-Vo_QnBW9RZK1yKdo8pUgTHg2gd7XTCBl1sVWgoe8y30kIQVyjpX49WR4uWnYWeXOJptpwu6VVeUd2hH5l0v1JiGOm6UbplIdqgzGDMd627fgOgfsvXXUrqIF8yCY_UYqEFfQIUgAN9KHlFzNWgnt5nZKmbQRap-G0Kfgn2jwMec_K25c_83_HKo0dIh5uj8mm0UotHTOfwVfN0lWs_kTKut78cnteWqRY77yoEL3fPR1Q-aK8v9wwealIPjSJcpjZRKGXogD6qzUFkzoxbno8GfjNa-uw2-O4R__b0LDTRuOfOjVs2vAPQTHIOcuI35XY56E-8iu5PXqQi-huTplRwfxb0riZ9VwxFz1bWYgro_IJCNjAKeS0lKCGctLmrswnQx5JIqq9xyrP7rnO6MecSur5GSqesq7emkzQiGZf0fUDwGp-_9L3fHfakVEkw9dbT1fbnbYKrpFRlWi1V0mAxginsw-p5aZdhupP3Ej1L_wsMHqMxJN-fCi7rzjsMJtY1TboXjWLBeKTSKDDB0zvyFZQUFTsiCRU_Lr3ewAVFbGXXK93N9a9Jt0uXm1tlI-Udkud5f1DvDNU0Tb4FkhgThDR0ZbO6Pw5UcTRMe0n__v0EJsjcYw==)
