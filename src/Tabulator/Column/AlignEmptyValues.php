<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum AlignEmptyValues: string
{
    case TOP    = "top";
    case BOTTOM = "bottom";
}
