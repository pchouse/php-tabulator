<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

enum RenderMode: string
{
    case VIRTUAL = "virtual";
    case BASIC   = "basic";
}
