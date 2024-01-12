<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class DateParams extends SharedEditorParams
{
    public function __construct(
        string|Undefined|null           $mask = Undefined::UNDEFINED,
        bool|Undefined|null             $maskAutoFill = Undefined::UNDEFINED,
        string|Undefined|null           $maskLetterChar = Undefined::UNDEFINED,
        string|Undefined|null           $maskNumberChar = Undefined::UNDEFINED,
        string|Undefined|null           $maskWildcardChar = Undefined::UNDEFINED,
        private string|null             $min = null,
        private string|null             $max = null,
        private string|null             $format = null,
        private VerticalNavigation|null $verticalNavigation = null,
    ) {
        parent::__construct($mask, $maskAutoFill, $maskLetterChar, $maskNumberChar, $maskWildcardChar);
    }

    /**
     * @return string|null
     */
    public function getMin(): ?string
    {
        return $this->min;
    }

    /**
     * @param string|null $min
     *
     * @return DateParams
     */
    public function setMin(?string $min): DateParams
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMax(): ?string
    {
        return $this->max;
    }

    /**
     * @param string|null $max
     *
     * @return DateParams
     */
    public function setMax(?string $max): DateParams
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param string|null $format
     *
     * @return DateParams
     */
    public function setFormat(?string $format): DateParams
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\VerticalNavigation|null
     */
    public function getVerticalNavigation(): ?VerticalNavigation
    {
        return $this->verticalNavigation;
    }

    /**
     * @param \PChouse\Tabulator\Column\VerticalNavigation|null $verticalNavigation
     *
     * @return DateParams
     */
    public function setVerticalNavigation(?VerticalNavigation $verticalNavigation): DateParams
    {
        $this->verticalNavigation = $verticalNavigation;
        return $this;
    }
}
