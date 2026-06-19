<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum ColumnDefinitionAlign: string
{
    case LEFT   = "left";
    case CENTER = "center";
    case RIGHT  = "right";
}
