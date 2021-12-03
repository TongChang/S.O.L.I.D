<?php

namespace Task;

interface ITask
{
    /**
     * ID を返却します
     *
     * @return string ID
     */
    public function getId(): string;

    /**
     * ステータスを返却します
     *
     * @return string ステータス
     */
    public function getStatus(): string;

    /**
     * チケットのタイトルを返却します
     *
     * @return string タイトル
     */
    public function getTitle(): string;

    /**
     * このチケットがアクティブであるかを返却します
     *
     * @return boolean
     */
    public function isActive(): bool;

    /**
     * このチケットがクローズ済みであるかを返却します
     *
     * @return boolean
     */
    public function isClosed(): bool;

    /**
     * チームのものかを返却します
     *
     * @return string
     */
    public function inTeam(): string;
}
