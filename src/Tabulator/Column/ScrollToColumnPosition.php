<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum ScrollToColumnPosition: string
{
    case LEFT   = "left";
    case CENTER = "center";
    case MIDDLE = "middle";
    case RIGHT  = "right";
}
