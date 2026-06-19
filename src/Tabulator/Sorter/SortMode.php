<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Sorter;

enum SortMode: string
{
    case REMOTE = "remote";
    case LOCAL  = "local";
}
