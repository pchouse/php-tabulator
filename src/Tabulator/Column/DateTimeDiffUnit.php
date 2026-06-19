<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum DateTimeDiffUnit: string
{
    case YEARS   = "years";
    case MONTH   = "months";
    case WEEKS   = "weeks";
    case DAYS    = "days";
    case HOURS   = "hours";
    case MINUTES = "minutes";
    case SECONDS = "seconds";
}
