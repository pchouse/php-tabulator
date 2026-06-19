<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Cache;

use PChouse\Resources\Tabulator;
use PHPUnit\Framework\TestCase;

class CacheTest extends TestCase
{

    /**
     * @test
     * @return void
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function test(): void
    {
        $cache = Cache::instance();
        $value = "the cache value";

        $cache->clearCache();

        $reflectionClass = new \ReflectionClass(Tabulator::class);

        $this->assertFalse($cache->cacheExist($reflectionClass));

        $cache->putInCache($reflectionClass, $value);

        $this->assertTrue($cache->cacheExist($reflectionClass));

        $this->assertEquals($value, $cache->getFromCache($reflectionClass));

        $cache->removeFromCache($reflectionClass);

        $this->assertFalse($cache->cacheExist($reflectionClass));

        $cache->putInCache($reflectionClass, $value);

        $cache->clearCache();

        $this->assertFalse($cache->cacheExist($reflectionClass));
    }
}
