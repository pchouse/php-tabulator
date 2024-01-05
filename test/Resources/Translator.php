<?php
declare(strict_types=1);

namespace PChouse\Resources;

class Translator implements \PChouse\Tabulator\Translator
{











    public function translate(string $key): string
    {
		return ucfirst($key);
	}
}