<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

use PChouse\Resources\Tabulator;
use PChouse\Tabulator\Cache\Cache;
use PChouse\Tabulator\Column\ColumnDefinition;
use PChouse\Tabulator\Column\ColumnDefinitionAlign;
use PChouse\Tabulator\Column\ColumnDefinitionSorterParams;
use PChouse\Tabulator\Column\Formatter;
use PChouse\Tabulator\Column\MoneyParams;
use PChouse\Tabulator\Column\NumberParams;
use PChouse\Tabulator\Column\SorterParameterType;
use PChouse\Tabulator\Column\TickCrossParams;
use PChouse\Tabulator\Config\Config;
use PChouse\Tabulator\Sorter\SortDirection;
use PChouse\Tabulator\Sorter\Sorter;
use PHPUnit\Framework\TestCase;

class OptionsTest extends TestCase
{

    /**
     *
     * @return void
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function setUp(): void
    {
        Cache::instance()->clearCache();
        Config::instance()->setExportUndefined(false);
        Config::instance()->setCache(null);
    }

    /**
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function tearDown(): void
    {
        Cache::instance()->clearCache();
    }

    /**
     * @test
     * @return void
     * @throws \PChouse\Tabulator\Cache\CacheException
     * @throws \PChouse\Tabulator\TabulatorJsonException
     * @throws \PChouse\Tabulator\TabulatorException
     */
    public function testOptionsNoUndefined(): void
    {
        $out = RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplateOut.ts";
        \unlink($out);

        $options = new Options(
            index: 1
        );

        if (false === $template = \file_get_contents(RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplate.ts")) {
            $this->fail("Tabulator file not found");
        }

        Config::instance()->setExportUndefined(false);
        \file_put_contents($out, \str_replace("{}", $options->toJson(), $template));

        $resultCode = -1;
        \exec("npx prettier --write $out");
        \exec("tsc --noEmit $out", result_code: $resultCode);
        $this->assertEquals(0, $resultCode);
    }

    /**
     * @test
     * @return void
     * @throws \PChouse\Tabulator\Cache\CacheException
     * @throws \PChouse\Tabulator\TabulatorJsonException
     * @throws \PChouse\Tabulator\TabulatorException
     */
    public function testOptionsUndefined(): void
    {
        $out = RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplateOut.ts";
        \unlink($out);

        $options = new Options(
            index: 1
        );

        if (false === $template = \file_get_contents(RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplate.ts")) {
            $this->fail("Tabulator file not found");
        }

        Config::instance()->setExportUndefined(true);
        \file_put_contents($out, \str_replace("{}", $options->toJson(), $template));

        $resultCode = -1;
        \exec("npx prettier --write $out");
        \exec("tsc --noEmit $out", result_code: $resultCode);
        $this->assertEquals(0, $resultCode);
    }

    /**
     * @test
     * @return void
     * @throws \PChouse\Tabulator\Cache\CacheException
     * @throws \PChouse\Tabulator\TabulatorJsonException
     * @throws \PChouse\Tabulator\TabulatorException
     */
    public function testAll(): void
    {
        $out = RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplateOut.ts";
        \unlink($out);

        $options = new Options(
            index: 1
        );

        $options->setInitialSort(
            [
            (new Sorter(SortDirection::ASC))->setColumn("column1"),
            (new Sorter(SortDirection::DESC))->setColumn("column2"),
            (new Sorter())->setColumn("column3"),
            ]
        );

        $column1 = new ColumnDefinition(
            title: "Column One",
            field: "column1",
            hozAlign: ColumnDefinitionAlign::CENTER,
            formatter: Formatter::TICK_CROSS
        );

        $column1->setSorterParams(
            new ColumnDefinitionSorterParams(type: SorterParameterType::MIN)
        );

        $column1->setFormatterParams(
            new TickCrossParams(allowEmpty: true)
        );

        $column1->setEditorParams(
            new NumberParams(maskAutoFill: true)
        );

        $column2 = new ColumnDefinition(
            title: "Column Two",
            field: "column2",
            hozAlign: ColumnDefinitionAlign::RIGHT,
            formatter: Formatter::MONEY
        );

        $column2->setSorterParams(
            new ColumnDefinitionSorterParams(type: SorterParameterType::SUM)
        );

        $column2->setFormatterParams(
            new MoneyParams(decimal: ",", thousand: ".", symbol: "€")
        );

        $column2->setEditorParams(
            new NumberParams(maskAutoFill: true)
        );

        $column3 = new ColumnDefinition(
            title: "Column Three",
            field: "column3",
            hozAlign: ColumnDefinitionAlign::LEFT,
            formatter: Formatter::COLOR
        );

        $column3->setSorterParams(
            new ColumnDefinitionSorterParams(type: SorterParameterType::SUM)
        );

        $options->setColumns(
            [
            $column1, $column2, $column3
            ]
        );

        $options->setKeybindings(
            new KeyBinding()
        );

        if (false === $template = \file_get_contents(RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplate.ts")) {
            $this->fail("Tabulator file not found");
        }

        Config::instance()->setExportUndefined(true);
        \file_put_contents($out, \str_replace("{}", $options->toJson(), $template));

        $resultCode = -1;
        \exec("npx prettier --write $out");
        \exec("tsc --noEmit $out", result_code: $resultCode);
        $this->assertEquals(0, $resultCode);
    }

    /**
     * @test
     * @throws \PChouse\Tabulator\Cache\CacheException
     * @throws \PChouse\Tabulator\TabulatorJsonException
     * @throws \PChouse\Tabulator\TabulatorParserException
     */
    public function testParse(): void
    {
        $out = RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplateOut.ts";
        \unlink($out);

        $options = Options::parse(
            new \ReflectionClass(Tabulator::class),
            new \PChouse\Resources\Translator()
        );

        if (false === $template = \file_get_contents(RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplate.ts")) {
            $this->fail("Tabulator file not found");
        }

        Config::instance()->setExportUndefined(true);
        \file_put_contents($out, \str_replace("{}", $options->toJson(), $template));

        $resultCode = -1;
        \exec("npx prettier --write $out");
        \exec("tsc --noEmit $out", result_code: $resultCode);
        $this->assertEquals(0, $resultCode);
    }

    /**
     * @throws \PChouse\Tabulator\TabulatorJsonException
     * @throws \PChouse\Tabulator\Cache\CacheException
     * @throws \PChouse\Tabulator\TabulatorParserException
     */
    public function testParseWithCache(): void
    {
        $out = RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplateOut.ts";
        \unlink($out);

        Config::instance()->setCache(Cache::instance());
        Config::instance()->setExportUndefined(true);

        $options = Options::parse(
            new \ReflectionClass(Tabulator::class),
            new \PChouse\Resources\Translator()
        );

        $this->assertInstanceOf(Options::class, $options);

        if (false === $template = \file_get_contents(RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplate.ts")) {
            $this->fail("Tabulator file not found");
        }

        $json = $options->toJson();

        $optionsCache = Options::parse(
            new \ReflectionClass(Tabulator::class),
            new \PChouse\Resources\Translator()
        );

        $this->assertInstanceOf(OptionsJson::class, $options);

        $this->assertEquals($json, $optionsCache->toJson());


        \file_put_contents($out, \str_replace("{}", $json, $template));

        $resultCode = -1;
        \exec("npx prettier --write $out");
        \exec("tsc --noEmit $out", result_code: $resultCode);
        $this->assertEquals(0, $resultCode);
    }

    /**
     * @throws \PChouse\Tabulator\TabulatorJsonException
     * @throws \PChouse\Tabulator\Cache\CacheException
     * @throws \PChouse\Tabulator\Column\ColumnDefinitionException
     * @throws \PChouse\Tabulator\TabulatorException
     */
    public function testColumnOrder(): void
    {
        $out = RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplateOut.ts";
        \unlink($out);

        $options = new Options(
            index: 1
        );

        $options->setInitialSort(
            [
            (new Sorter(SortDirection::ASC))->setColumn("column1"),
            (new Sorter(SortDirection::DESC))->setColumn("column2"),
            (new Sorter())->setColumn("column3"),
            ]
        );

        $column1 = new ColumnDefinition(
            title: "Column One",
            field: "column1",
            position: 3,
            hozAlign: ColumnDefinitionAlign::CENTER,
            formatter: Formatter::TICK_CROSS
        );

        $column1->setSorterParams(
            new ColumnDefinitionSorterParams(type: SorterParameterType::MIN)
        );

        $column1->setFormatterParams(
            new TickCrossParams(allowEmpty: true)
        );

        $column1->setEditorParams(
            new NumberParams(maskAutoFill: true)
        );

        $column2 = new ColumnDefinition(
            title: "Column Two",
            field: "column2",
            position: 2,
            hozAlign: ColumnDefinitionAlign::RIGHT,
            formatter: Formatter::MONEY
        );

        $column2->setSorterParams(
            new ColumnDefinitionSorterParams(type: SorterParameterType::SUM)
        );

        $column2->setFormatterParams(
            new MoneyParams(decimal: ",", thousand: ".", symbol: "€")
        );

        $column2->setEditorParams(
            new NumberParams(maskAutoFill: true)
        );

        $column3 = new ColumnDefinition(
            title: "Column Three",
            field: "column3",
            position: 1,
            hozAlign: ColumnDefinitionAlign::LEFT,
            formatter: Formatter::COLOR
        );

        $column3->setSorterParams(
            new ColumnDefinitionSorterParams(type: SorterParameterType::SUM)
        );

        $options->setColumns(
            [
            $column1, $column2, $column3
            ]
        );

        $options->setKeybindings(
            new KeyBinding()
        );

        if (false === $template = \file_get_contents(RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplate.ts")) {
            $this->fail("Tabulator file not found");
        }

        Config::instance()->setExportUndefined(true);
        \file_put_contents($out, \str_replace("{}", $options->toJson(), $template));

        $resultCode = -1;
        \exec("npx prettier --write $out");
        \exec("tsc --noEmit $out", result_code: $resultCode);
        $this->assertEquals(0, $resultCode);

        /** @var array<int, ColumnDefinition> $columns */
        $columns = $options->getColumns();

        foreach ($columns as $key => $column) {
            if ($key === 0) {
                $this->assertEquals("column3", $column->getField());
            }
            if ($key === 1) {
                $this->assertEquals("column2", $column->getField());
            }
            if ($key === 2) {
                $this->assertEquals("column1", $column->getField());
            }
        }
    }

    /**
     * @throws \PChouse\Tabulator\TabulatorJsonException
     * @throws \PChouse\Tabulator\Cache\CacheException
     * @throws \PChouse\Tabulator\Column\ColumnDefinitionException
     * @throws \PChouse\Tabulator\TabulatorException
     */
    public function testColumnOrderTwo(): void
    {
        $out = RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplateOut.ts";
        \unlink($out);

        $options = new Options(
            index: 1
        );

        $column1 = new ColumnDefinition(
            title: "Column",
            field: "A",
            position: 3,
            hozAlign: ColumnDefinitionAlign::CENTER,
            formatter: Formatter::TICK_CROSS
        );

        $column1->setSorterParams(
            new ColumnDefinitionSorterParams(type: SorterParameterType::MIN)
        );

        $column1->setFormatterParams(
            new TickCrossParams(allowEmpty: true)
        );

        $column1->setEditorParams(
            new NumberParams(maskAutoFill: true)
        );

        $column2 = new ColumnDefinition(
            title: "Column Two",
            field: "B",
            position: 2,
            hozAlign: ColumnDefinitionAlign::RIGHT,
            formatter: Formatter::MONEY
        );

        $column2->setSorterParams(
            new ColumnDefinitionSorterParams(type: SorterParameterType::SUM)
        );

        $column2->setFormatterParams(
            new MoneyParams(decimal: ",", thousand: ".", symbol: "€")
        );

        $column2->setEditorParams(
            new NumberParams(maskAutoFill: true)
        );

        $column3 = new ColumnDefinition(
            title: "Column",
            field: "C",
            position: 1,
            hozAlign: ColumnDefinitionAlign::LEFT,
            formatter: Formatter::COLOR
        );

        $column3->setSorterParams(
            new ColumnDefinitionSorterParams(type: SorterParameterType::SUM)
        );

        $options->setColumns(
            [
                $column1, $column2, $column3
            ]
        );

        $options->setKeybindings(
            new KeyBinding()
        );

        if (false === $template = \file_get_contents(RESOURCES . DIRECTORY_SEPARATOR . "TabulatorTemplate.ts")) {
            $this->fail("Tabulator file not found");
        }

        Config::instance()->setExportUndefined(true);
        \file_put_contents($out, \str_replace("{}", $options->toJson(), $template));

        $resultCode = -1;
        \exec("npx prettier --write $out");
        \exec("tsc --noEmit $out", result_code: $resultCode);
        $this->assertEquals(0, $resultCode);

        /**
         * @var array<int, ColumnDefinition> $columns
         */
        $columns = $options->getColumns();

        foreach ($columns as $key => $column) {
            if ($key === 0) {
                $this->assertEquals("C", $column->getField());
            }
            if ($key === 1) {
                $this->assertEquals("B", $column->getField());
            }
            if ($key === 2) {
                $this->assertEquals("A", $column->getField());
            }
        }
    }
}
