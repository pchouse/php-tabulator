<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

enum ImportFormat: string
{
    case ARRAY = "array";
    case CSV   = "csv";
    case JSON  = "json";
}
