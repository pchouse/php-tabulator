<?php
declare(strict_types=1);

namespace PChouse\Cache;

/**
 * Filesystem cache, best performance when using Opcache
 */
interface ICache
{
    public function cacheKey(\ReflectionClass $reflectionClass): string;

    public function cacheFileName(\ReflectionClass $reflectionClass): string;

    public function cacheExist(\ReflectionClass $reflectionClass): bool;

    public function removeFromCache(\ReflectionClass $reflectionClass): void;

    public function getFromCache(\ReflectionClass $reflectionClass): string|null;

    /**
     * @throws \PChouse\Cache\CacheException
     */
    public function putInCache(\ReflectionClass $reflectionClass, string $json): void;

    /**
     * @return void
     * @throws \PChouse\Cache\CacheException
     */
    public function clearCache(): void;
}
