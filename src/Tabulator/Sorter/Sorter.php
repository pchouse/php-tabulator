<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Sorter;

use PChouse\Tabulator\ABase;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Sorter extends ABase
{
    private string $column;

    /**
     * @param \PChouse\Tabulator\Sorter\SortDirection $dir Sort direction ASC|DESC
     */
    public function __construct(
        private SortDirection $dir = SortDirection::ASC
    ) {
    }

    /**
     * @return string
     */
    public function getColumn(): string
    {
        return $this->column;
    }

    /**
     * @param string $column The column name
     *
     * @return Sorter
     */
    public function setColumn(string $column): Sorter
    {
        $this->column = $column;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Sorter\SortDirection
     */
    public function getDir(): SortDirection
    {
        return $this->dir;
    }

    /**
     * @param \PChouse\Tabulator\Sorter\SortDirection $dir Sort direction ASC|DESC
     *
     * @return Sorter
     */
    public function setDir(SortDirection $dir): Sorter
    {
        $this->dir = $dir;
        return $this;
    }
}
