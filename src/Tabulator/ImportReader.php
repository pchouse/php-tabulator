<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

enum ImportReader: string
{
    case BINARY = "binary";
    case BUFFER = "buffer";
    case TEXT   = "text";
    case URL    = "url";
}
