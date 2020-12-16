# CASE A

LCP ( リスコフの置換原則 ) が守られている設計。

## クラス図

![クラス図](https://kroki.io/plantuml/svg/eNq1UrFuAjEM3f0VGQ9V_oEOiAp1YGpV2FCHcDGH1fRyin1IqOXfm5AW6IGEOjRLovfs52c7E1EbtX_3ALW3ImZh5e2FuiCsIe7MByAimHTuGtK5Wu2F5Gn92HFdiUZuG8NudG8KZVeelq-wB-BWKa5tTWZ2ogZyM1elzKIyqFEdJQvB8lArbynjqxD8Dzr1Qcgd0f15G6lajkJ25ZaTHiqrp_LsbKQ2ebltbZGTruDP3wr_1k2e9u1uLvwPvEw37F1ympg8nrSnC5d5aw3Fv7o8TBv7Dj_H5-uGg-8r-OCTYeRmo_g7BibUuvQxvwBPGszG)

- Task と Epic が共に Statusable を実装することで、 Repository が両方のクラスを同じインターフェースを介して利用できる。
