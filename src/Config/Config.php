<?php
declare(strict_types=1);

namespace PChouse\Config;

use PChouse\Cache\Cache;
use PChouse\Cache\ICache;

class Config
{


    protected static Config|null $config = null;

    protected bool $exportUndefined = false;

    protected ICache|null $cache = null;

    protected function __construct()
    {
    }

    public static function instance(): Config
    {
        if (static::$config === null) {
            static::$config = new Config();
            static::$config->setCache(Cache::instance());
        }
        return static::$config;
    }

    /**
     * @return bool
     */
    public function getExportUndefined(): bool
    {
        return $this->exportUndefined;
    }

    /**
     * @param bool $exportUndefined
     *
     * @return Config
     */
    public function setExportUndefined(bool $exportUndefined): Config
    {
        $this->exportUndefined = $exportUndefined;
        return $this;
    }

    /**
     * @return \PChouse\Cache\ICache|null
     */
    public function getCache(): ?ICache
    {
        return $this->cache;
    }

    /**
     * @param \PChouse\Cache\ICache|null $cache
     *
     * @return Config
     */
    public function setCache(?ICache $cache): Config
    {
        $this->cache = $cache;
        return $this;
    }
}
