<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum Resizable: string
{
    case HEADER = "header";
    case CELL   = "cell";
}
