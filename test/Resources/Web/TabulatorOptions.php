<?php

use PChouse\Resources\Tabulator;
use PChouse\Resources\Translator;
use PChouse\Tabulator\Config\Config;
use PChouse\Tabulator\Options;

require_once "../../../vendor/autoload.php";

try {
    Config::instance()->getCache()?->clearCache();


    $options = Options::parse(
        new \ReflectionClass(Tabulator::class),
        new Translator()
    );

    if ($options instanceof Options) {
        // Set options programmatically
        // $options->set????
    }

    $json = $options->toJson();

    \header("Content-Type: application/json; charset=UTF-8");
    echo $json;
} catch (\Throwable $e) {
    echo $e->getMessage();
}
