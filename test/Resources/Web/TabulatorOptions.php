<?php
require_once "../../../vendor/autoload.php";

try {


	\PChouse\Config\Config::instance()->getCache()?->clearCache();


	$options = \PChouse\Tabulator\Options::parse(
	new \ReflectionClass(\PChouse\Resources\Tabulator::class),
	new \PChouse\Resources\Translator()
	);

	if ($options instanceof \PChouse\Tabulator\Options) {
		// Set options programmatically
		// $options->set????
	}

	$json = $options->toJson();

	\header("Content-Type: application/json; charset=UTF-8");
	echo $json;
} catch (\Throwable $e) {
	echo $e->getMessage();
}