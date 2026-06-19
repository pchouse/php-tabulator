<?php /* @phpcs:ignore */

declare(strict_types=1);

if (false === $cacheDir = \realpath(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "Cache")) {
    die("Cache directory defined in bootstrap not exist");
}

define("TABULATOR_CACHE_DIR", $cacheDir);
