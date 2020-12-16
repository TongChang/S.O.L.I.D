<?php

namespace Task;

use Task\ITask;
use Task\Status;
use Task\Team;

/**
 * インフラタスク
 */
class InfraTask extends ITask
{
    /**
     * ID
     *
     * @var string
     */
    private $id;

    /**
     * タイトル
     *
     * @var string
     */
    private $title;

    /**
     * ステータス
     *
     * @var Status
     */
    private $status;

    /**
     * 親の ID
     *
     * @var string
     */
    private $parentId;

    public function __construct(string $id, string $title, string $parentId = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->status = new Status(Status::STATUS_TODO);
        $this->parentId = $parentId;
    }

    /**
     * ID を返却する。
     *
     * @return string ID
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * ステータスを返却する。
     *
     * @return Status ステータス
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * ステータスがアクティブかを返却します。
     *
     * @return boolean
     */
    public function isActive(): bool
    {
        return $this->status->isActive();
    }

    /**
     * ステータスが完了かを返却します。
     *
     * @return boolean
     */
    public function isClosed(): bool
    {
        return $this->status->isClosed();
    }

    /**
     * 親があるか
     *
     * @return boolean
     */
    public function hasParent(): bool
    {
        return !empty($this->parentId);
    }

    /**
     * 親 ID が指定と一致するか
     *
     * @param string $parentId 親 ID
     * @return boolean
     */
    public function checkParentId(string $parentId): bool
    {
        return $this->parentId === $parentId;
    }
}
