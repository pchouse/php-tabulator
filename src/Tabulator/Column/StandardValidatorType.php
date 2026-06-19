<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum StandardValidatorType: string
{
    case REQUIRED = "required";
    case UNIQUE   = "unique";
    case INTEGER  = "integer";
    case FLOAT    = "float";
    case NUMERIC  = "numeric";
    case STRING   = "string";
}
