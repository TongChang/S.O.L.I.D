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

![クラス図 from KroKi](https://kroki.io/plantuml/svg/eNrFldFOwjAUhu_7FL2EaF8AEwIqJBKjRuXa1O1sKynd0nYhRH13262FroV4Q-INWf_zn6-Hs55upjSVut1yhDJOlcJzqVnGYa0gowrwFyKEoKsS9Hud072L3u4fqShHSksmSszN8xj9IMSEBlnQDPDDE-zUKzS1YrqW-wGm6bPnysEGmAm2mRbWl3Mpji-8ZTwH6TmfdhnmXXdpWJif-B85QlgC02bX8aTPv-m0e6pj6a42EKFVIB_KWtGGClAQwLWlTrC3ktwQJ9gUYp4zhwrCl6tl_bYQJWeq-t9ikkNEgxdWgM6qJZNKj84clcBNOvdcPX9uINNLWW-XjMML1ZV_5YVbG1bdmf7ewbL7LvQM16OPDT0qvjMDsZV8sO7TQJxIC0WbFq5di107vXzo-opGqm9yElhLnmgdYiHOIJKAQQw006jo-iCSlZUm0_hCSHx5vRPW5nSEosEnbUO-U0xic5zhuCeuqCp7ZjyqOz_D3egR0Uc5FDa7OxwoulkO7C4aBw13Gg_9aVM8jQih-LLwVXpHMsCxISX0xZ7YbAYiN1-FX-vYGhY=)
