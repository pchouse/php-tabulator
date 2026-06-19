<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

/**
 * Ajax request content type
 */
enum AjaxContentType: string
{
    case FORM = "form";
    case JSON = "json";
}
