<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class TimeParams extends SharedEditorParams
{
    public function __construct(
        string|Undefined|null           $mask = Undefined::UNDEFINED,
        bool|Undefined|null             $maskAutoFill = Undefined::UNDEFINED,
        string|Undefined|null           $maskLetterChar = Undefined::UNDEFINED,
        string|Undefined|null           $maskNumberChar = Undefined::UNDEFINED,
        string|Undefined|null           $maskWildcardChar = Undefined::UNDEFINED,
        private string|null             $format = null,
        private VerticalNavigation|null $verticalNavigation = null,
    ) {
        parent::__construct($mask, $maskAutoFill, $maskLetterChar, $maskNumberChar, $maskWildcardChar);
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
     * @return TimeParams
     */
    public function setFormat(?string $format): TimeParams
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
     * @return TimeParams
     */
    public function setVerticalNavigation(?VerticalNavigation $verticalNavigation): TimeParams
    {
        $this->verticalNavigation = $verticalNavigation;
        return $this;
    }
}
