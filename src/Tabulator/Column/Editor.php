<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum Editor: string
{
    case INPUT      = "input";
    case TEXTAREA   = "textarea";
    case NUMBER     = "number";
    case RANGE      = "range";
    case TICK_CROSS = "tickCross";
    case START      = "star";
    case LIST       = "list";
    case DATE       = "date";
    case TIME       = "time";
    case DATETIME   = "datetime";
}
