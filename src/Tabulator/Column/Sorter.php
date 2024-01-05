<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum Sorter: string
{

    case     STRING    = "string";
    case     NUMBER    = "number";
    case     ALPHA_NUM = "alphanum";
    case     BOOLEAN   = "boolean";
    case     EXISTS    = "exists";
    case     DATE      = "date";
    case     TIME      = "time";
    case     DATETIME  = "datetime";
    case     ARRAY     = "array";
}
