<?php

namespace Repository;

use Task\ITask;

class TaskRepository {
    public function getTicketsFor(Team $team) {
        array_filter(
            [
                new InfraTask()
            ],
            function(IStatusable $ticket) use ($versionId) {
                return $ticket->is
            })
    }
}