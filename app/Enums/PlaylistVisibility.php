<?php

namespace App\Enums;

enum PlaylistVisibility: string
{
    case PUBLIC = 'public';
    case PRIVATE = 'private';
    case UNLISTED = 'unlisted';
}
