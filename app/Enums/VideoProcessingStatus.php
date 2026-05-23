<?php

namespace App\Enums;

enum VideoProcessingStatus: string
{
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case FAILED = 'failed';
}