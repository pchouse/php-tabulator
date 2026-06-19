<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

use PChouse\Tabulator\Cache\CacheException;
use PChouse\Tabulator\Config\Config;

class OptionsJson extends ABase
{
    /**
     * The Reflection of the class where these options were attached
     *
     * @var \ReflectionClass|null
     */
    private \ReflectionClass|null $attachedReflectionClass = null;

    /**
     * @return \ReflectionClass|null
     */
    public function getAttachedReflectionClass(): ?\ReflectionClass
    {
        return $this->attachedReflectionClass;
    }

    /**
     * @param \ReflectionClass|null $attachedReflectionClass
     *
     * @return $this
     */
    public function setAttachedReflectionClass(?\ReflectionClass $attachedReflectionClass): static
    {
        $this->attachedReflectionClass = $attachedReflectionClass;
        return $this;
    }

    /**
     * @throws \PChouse\Tabulator\Cache\CacheException
     * @throws \PChouse\Tabulator\TabulatorJsonException
     */
    public function toJson(): string
    {
        return Config::instance()->getCache()?->getFromCache(
            $this->getAttachedReflectionClass() ??
            throw new TabulatorJsonException("Reflection attached class not defined")
        ) ?? throw new CacheException("The json not exist in cache");
    }
}
