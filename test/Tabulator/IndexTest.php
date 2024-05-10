<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{

    /**
     * @return void
     */
    #[Test]
    public function testIndexNull(): void
    {
        $index = new Index();
        $this->assertNull($index->getName());

        $name = "TestName";
        $index->setName($name);
        $this->assertEquals($name, $index->getName());
    }

    /**
     * @return void
     */
    #[Test]
    public function testIndexNotNull(): void
    {
        $name  = "TestName";
        $index = new Index($name);
        $this->assertEquals($name, $index->getName());

        $index->setName(null);
        $this->assertNull($index->getName());
    }
}
