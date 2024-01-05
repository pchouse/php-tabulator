<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum ResponsiveLayout: string
{
    case HIDE     = "hide";
    case COLLAPSE = "collapse";
}
