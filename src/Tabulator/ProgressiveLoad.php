<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

enum ProgressiveLoad: string
{
    case LOAD   = "load";
    case SCROLL = "scroll";
}
