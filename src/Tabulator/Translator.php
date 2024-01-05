<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

interface Translator
{

    public function translate(string $key): string;
}
