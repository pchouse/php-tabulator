<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum Layout: string
{
    case FIT_DATA         = "fitData";
    case FIT_COLUMNS      = "fitColumns";
    case FIT_DATA_COLUMN  = "fitDataFill";
    case FIT_DATA_STRETCH = "fitDataStretch";
    case FIT_DATA_TABLE   = "fitDataTable";
}
