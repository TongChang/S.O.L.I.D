<?php

namespace Task;

use \Exception;

/**
 * チーム値クラス
 */
class Team
{
    /**
     * インフラチーム
     */
    public const NAME_INFRA = "infra";

    /**
     * デザインチーム
     */
    public const NAME_DESIGN = "design";

    /**
     * アプリチーム
     */
    public const NAME_APP = "app";

    private $teams = [
        Team::NAME_INFRA,
        Team::NAME_APP,
        Team::NAME_DESIGN
    ];

    /**
     * チーム名
     *
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        if (!in_array($name, $this->teams)) {
            throw new Exception("想定外のチーム名が入力されまた");
        }
        $this->name = $name;
    }

    /**
     * チーム名を返却します
     *
     * @return string チーム名
     */
    public function getName(): string
    {
        return $this->name;
    }
}
