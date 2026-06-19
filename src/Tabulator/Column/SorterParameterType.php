<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum SorterParameterType: string
{
    case LENGTH = "length";
    case SUM    = "sum";
    case MAX    = "max";
    case MIN    = "min";
    case AVG    = "avg";
}
