<?php

namespace App\Enum;

enum TaskStatusEnum: string
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Completed = 'completed';
}
