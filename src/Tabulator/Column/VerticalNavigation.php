<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum VerticalNavigation: string
{
    case EDITOR = "editor";
    case TABLE  = "table";
}
