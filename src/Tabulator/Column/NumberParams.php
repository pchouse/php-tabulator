<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class NumberParams extends SharedEditorParams
{
    /**
     * @param string|\PChouse\Tabulator\Undefined|null $mask
     * @param bool|\PChouse\Tabulator\Undefined|null $maskAutoFill
     * @param string|\PChouse\Tabulator\Undefined|null $maskLetterChar
     * @param string|\PChouse\Tabulator\Undefined|null $maskNumberChar
     * @param string|\PChouse\Tabulator\Undefined|null $maskWildcardChar
     * @param int|float|\PChouse\Tabulator\Undefined|null $min
     * @param int|float|\PChouse\Tabulator\Undefined|null $max
     * @param int|float|\PChouse\Tabulator\Undefined|null $step
     * @param \PChouse\Tabulator\Column\VerticalNavigation|\PChouse\Tabulator\Undefined|null $verticalNavigation
     * @param bool|\PChouse\Tabulator\Undefined|null $selectContents When the editor is loaded select its text content
     */
    public function __construct(
        string|Undefined|null                     $mask = Undefined::UNDEFINED,
        bool|Undefined|null                       $maskAutoFill = Undefined::UNDEFINED,
        string|Undefined|null                     $maskLetterChar = Undefined::UNDEFINED,
        string|Undefined|null                     $maskNumberChar = Undefined::UNDEFINED,
        string|Undefined|null                     $maskWildcardChar = Undefined::UNDEFINED,
        private int|float|Undefined|null          $min = Undefined::UNDEFINED,
        private int|float|Undefined|null          $max = Undefined::UNDEFINED,
        private int|float|Undefined|null          $step = Undefined::UNDEFINED,
        private VerticalNavigation|Undefined|null $verticalNavigation = Undefined::UNDEFINED,
        private bool|Undefined|null               $selectContents = Undefined::UNDEFINED,
    ) {
        parent::__construct($mask, $maskAutoFill, $maskLetterChar, $maskNumberChar, $maskWildcardChar);
    }

    /**
     * @return float|int|\PChouse\Tabulator\Undefined|null
     */
    public function getMin(): float|int|Undefined|null
    {
        return $this->min;
    }

    /**
     * @param float|int|\PChouse\Tabulator\Undefined|null $min
     *
     * @return NumberParams
     */
    public function setMin(float|int|Undefined|null $min): NumberParams
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return float|int|\PChouse\Tabulator\Undefined|null
     */
    public function getMax(): float|int|Undefined|null
    {
        return $this->max;
    }

    /**
     * @param float|int|\PChouse\Tabulator\Undefined|null $max
     *
     * @return NumberParams
     */
    public function setMax(float|int|Undefined|null $max): NumberParams
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return float|int|\PChouse\Tabulator\Undefined|null
     */
    public function getStep(): float|int|Undefined|null
    {
        return $this->step;
    }

    /**
     * @param float|int|\PChouse\Tabulator\Undefined|null $step
     *
     * @return NumberParams
     */
    public function setStep(float|int|Undefined|null $step): NumberParams
    {
        $this->step = $step;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\VerticalNavigation|\PChouse\Tabulator\Undefined|null
     */
    public function getVerticalNavigation(): VerticalNavigation|Undefined|null
    {
        return $this->verticalNavigation;
    }

    /**
     * @param \PChouse\Tabulator\Column\VerticalNavigation|\PChouse\Tabulator\Undefined|null $verticalNavigation
     *
     * @return NumberParams
     */
    public function setVerticalNavigation(VerticalNavigation|Undefined|null $verticalNavigation): NumberParams
    {
        $this->verticalNavigation = $verticalNavigation;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getSelectContents(): bool|Undefined|null
    {
        return $this->selectContents;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $selectContents
     *
     * @return NumberParams
     */
    public function setSelectContents(bool|Undefined|null $selectContents): NumberParams
    {
        $this->selectContents = $selectContents;
        return $this;
    }
}
