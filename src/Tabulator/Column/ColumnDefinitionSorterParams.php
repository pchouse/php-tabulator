<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class ColumnDefinitionSorterParams extends ABase
{

    /**
     * @param string|\PChouse\Tabulator\Undefined|null $format
     * @param string|bool|\PChouse\Tabulator\Undefined|null $locale
     * @param \PChouse\Tabulator\Column\AlignEmptyValues|\PChouse\Tabulator\Undefined|null $alignEmptyValues
     * @param \PChouse\Tabulator\Column\SorterParameterType|\PChouse\Tabulator\Undefined|null $type
     */
    public function __construct(
        private string|Undefined|null              $format = Undefined::UNDEFINED,
        private string|bool|Undefined|null         $locale = Undefined::UNDEFINED,
        private AlignEmptyValues|Undefined|null    $alignEmptyValues = Undefined::UNDEFINED,
        private SorterParameterType|Undefined|null $type = Undefined::UNDEFINED,
    )
    {
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getFormat(): string|Undefined|null
    {
        return $this->format;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $format
     *
     * @return ColumnDefinitionSorterParams
     */
    public function setFormat(string|Undefined|null $format): ColumnDefinitionSorterParams
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getLocale(): bool|string|Undefined|null
    {
        return $this->locale;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $locale
     *
     * @return ColumnDefinitionSorterParams
     */
    public function setLocale(bool|string|Undefined|null $locale): ColumnDefinitionSorterParams
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\AlignEmptyValues|\PChouse\Tabulator\Undefined|null
     */
    public function getAlignEmptyValues(): AlignEmptyValues|Undefined|null
    {
        return $this->alignEmptyValues;
    }

    /**
     * @param \PChouse\Tabulator\Column\AlignEmptyValues|\PChouse\Tabulator\Undefined|null $alignEmptyValues
     *
     * @return ColumnDefinitionSorterParams
     */
    public function setAlignEmptyValues(AlignEmptyValues|Undefined|null $alignEmptyValues): ColumnDefinitionSorterParams
    {
        $this->alignEmptyValues = $alignEmptyValues;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\SorterParameterType|\PChouse\Tabulator\Undefined|null
     */
    public function getType(): SorterParameterType|Undefined|null
    {
        return $this->type;
    }

    /**
     * @param \PChouse\Tabulator\Column\SorterParameterType|\PChouse\Tabulator\Undefined|null $type
     *
     * @return ColumnDefinitionSorterParams
     */
    public function setType(SorterParameterType|Undefined|null $type): ColumnDefinitionSorterParams
    {
        $this->type = $type;
        return $this;
    }
}
