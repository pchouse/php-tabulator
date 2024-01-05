<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

enum ValidationMode: string
{
    case BLOCKING  = "blocking";
    case HIGHLIGHT = "highlight";
    case MANUAL    = "manual";
}
