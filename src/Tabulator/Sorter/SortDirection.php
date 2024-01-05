<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Sorter;

enum SortDirection: string
{
    case ASC  = "asc";
    case DESC = "desc";
}
