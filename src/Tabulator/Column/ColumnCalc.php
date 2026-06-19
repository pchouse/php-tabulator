<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum ColumnCalc: string
{
    case BOTH  = "both";
    case TABLE = "table";
    case GROUP = "group";
}
