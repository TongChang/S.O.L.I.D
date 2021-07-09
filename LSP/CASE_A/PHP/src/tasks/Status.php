<?php

namespace Task;

use \Exception;

/**
 * ステータス値クラス
 */
class Status
{
    /**
     * ステータス : TODO
     */
    public const STATUS_TODO = "TODO";

    /**
     * ステータス : WIP
     */
    public const STATUS_WIP = "WIP";

    /**
     * ステータス : In Review
     */
    public const STATUS_IN_REVIEW = "In Review";

    /**
     * ステータス : Done
     */
    public const STATUS_DONE = "Done";

    /**
     * ステータスの配列
     *
     * @param string $status
     */
    private $statuses = [
        Status::STATUS_TODO,
        Status::STATUS_WIP,
        Status::STATUS_IN_REVIEW,
        Status::STATUS_DONE,
    ];

    /**
     * アクティブなステータス
     *
     * @var array
     */
    private $actives = [
        Status::STATUS_WIP,
        Status::STATUS_IN_REVIEW
    ];

    /**
     * 遷移可能ステータス一覧
     *
     * @var array
     */
    private $canTransition = [
        Status::STATUS_TODO => [
            Status::STATUS_WIP,
            Status::STATUS_DONE
        ],
        Status::STATUS_WIP => [
            Status::STATUS_TODO,
            Status::STATUS_DONE,
            Status::STATUS_IN_REVIEW
        ],
        Status::STATUS_IN_REVIEW => [
            Status::STATUS_TODO,
            Status::STATUS_DONE,
            Status::STATUS_WIP
        ],
        Status::STATUS_DONE => [
            Status::STATUS_IN_REVIEW,
            Status::STATUS_TODO
        ]
    ];

    /**
     * ステータス
     *
     * @var string
     */
    private $status;

    public function __construct(string $status)
    {
        if (!in_array($status, $this->statuses)) {
            throw new Exception("未定義のステータスで初期化されました。");
        }
        $this->status = $status;
    }

    /**
     * ステータス遷移します。
     *
     * @param string $transitionToStatus
     * @return void
     */
    public function transitionTo(string $transitionToStatus): void
    {
        if (!in_array($transitionToStatus, $this->canTransition[$this->status])) {
            throw new Exception("遷移できません。");
        }
        $this->status = $transitionToStatus;
    }

    /**
     * アクティブかどうかを返却します。
     *
     * @return boolean
     */
    public function isActive(): bool
    {
        return in_array($this->status, $this->actives);
    }

    /**
     * 完了済みかどうかを返却します。
     *
     * @return boolean
     */
    public function isClosed(): bool
    {
        return $this->status === Status::STATUS_DONE;
    }
}
