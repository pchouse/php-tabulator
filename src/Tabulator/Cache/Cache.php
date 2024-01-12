<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Cache;

/**
 * Filesystem cache, best performance when using Opcache
 */
class Cache implements ICache
{


    protected static ICache|null $cache = null;

    protected function __construct()
    {
    }

    /**
     * @return \PChouse\Tabulator\Cache\ICache
     */
    public static function instance(): ICache
    {
        if (static::$cache === null) {
            static::$cache = new Cache();
        }
        return static::$cache;
    }

    /**
     * The cache key, base for file cache name
     *
     * @param \ReflectionClass $reflectionClass
     *
     * @return string
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function cacheKey(\ReflectionClass $reflectionClass): string
    {
        if (false === $path = $reflectionClass->getFileName()) {
            throw new CacheException("Class does not exist in filesystem");
        }

        if (false === $md5 = \md5_file($path)) {
            throw new CacheException("Error getting md5 of class file");
        }

        return $md5;
    }

    /**
     * The cache file name, full path
     *
     * @param \ReflectionClass $reflectionClass
     *
     * @return string
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function cacheFileName(\ReflectionClass $reflectionClass): string
    {
        return \sprintf(
            "%s%s%s.php",
            TABULATOR_CACHE_DIR,
            DIRECTORY_SEPARATOR,
            $this->cacheKey($reflectionClass)
        );
    }

    /**
     * Check if cache exists
     *
     * @param \ReflectionClass $reflectionClass
     *
     * @return bool
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function cacheExist(\ReflectionClass $reflectionClass): bool
    {
        return \file_exists($this->cacheFileName($reflectionClass));
    }

    /**
     * Remove from cache
     *
     * @param \ReflectionClass $reflectionClass
     *
     * @return void
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function removeFromCache(\ReflectionClass $reflectionClass): void
    {
        $cacheFileName = $this->cacheFileName($reflectionClass);
        if (\file_exists($cacheFileName)) {
            \unlink($cacheFileName);
        }
    }

    /**
     * Get value from cache or null if not exists
     *
     * @param \ReflectionClass $reflectionClass
     *
     * @return string|null
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function getFromCache(\ReflectionClass $reflectionClass): string|null
    {
        if (!$this->cacheExist($reflectionClass)) {
            return null;
        }

        return include $this->cacheFileName($reflectionClass);
    }

    /**
     * Put value in cache
     *
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function putInCache(\ReflectionClass $reflectionClass, string $json): void
    {
        $bytes = \file_put_contents(
            $this->cacheFileName($reflectionClass),
            \sprintf("<?php\r\n return '%s';", $json)
        );

        if ($bytes === false) {
            throw new CacheException("Error write in cache");
        }
    }

    /**
     * @return void
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function clearCache(): void
    {
        if (false === $scanDir = \scandir(TABULATOR_CACHE_DIR)) {
            throw new CacheException("Error scanning cache directory");
        }

        foreach ($scanDir as $fileName) {
            if (\str_ends_with($fileName, ".php")) {
                \unlink(TABULATOR_CACHE_DIR . DIRECTORY_SEPARATOR . $fileName);
            }
        }
    }
}
