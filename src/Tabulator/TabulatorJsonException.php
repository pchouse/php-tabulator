<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

use JetBrains\PhpStorm\Pure;

class TabulatorJsonException extends TabulatorException
{
    #[Pure] public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
