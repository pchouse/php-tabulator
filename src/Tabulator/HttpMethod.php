<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

enum HttpMethod: string
{
    case POST = "post";
    case GET  = "get";
}
