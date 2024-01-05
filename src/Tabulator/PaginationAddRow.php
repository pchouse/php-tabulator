<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

enum PaginationAddRow: string
{
    case TABLE = "table";
    case PAGE  = "page";
}
