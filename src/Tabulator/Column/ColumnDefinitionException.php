<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use JetBrains\PhpStorm\Pure;
use PChouse\Tabulator\TabulatorException;

class ColumnDefinitionException extends TabulatorException
{
    #[Pure] public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
