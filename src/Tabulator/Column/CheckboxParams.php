<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class CheckboxParams extends SharedEditorParams
{
    public function __construct(
        string|Undefined|null         $mask = Undefined::UNDEFINED,
        bool|Undefined|null           $maskAutoFill = Undefined::UNDEFINED,
        string|Undefined|null         $maskLetterChar = Undefined::UNDEFINED,
        string|Undefined|null         $maskNumberChar = Undefined::UNDEFINED,
        string|Undefined|null         $maskWildcardChar = Undefined::UNDEFINED,
        private bool|Undefined|null   $tristate = Undefined::UNDEFINED,
        private string|Undefined|null $indeterminateValue = Undefined::UNDEFINED,
    )
    {
        parent::__construct($mask, $maskAutoFill, $maskLetterChar, $maskNumberChar, $maskWildcardChar);
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getTristate(): bool|Undefined|null
    {
        return $this->tristate;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $tristate
     *
     * @return CheckboxParams
     */
    public function setTristate(bool|Undefined|null $tristate): CheckboxParams
    {
        $this->tristate = $tristate;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getIndeterminateValue(): string|Undefined|null
    {
        return $this->indeterminateValue;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $indeterminateValue
     *
     * @return CheckboxParams
     */
    public function setIndeterminateValue(string|Undefined|null $indeterminateValue): CheckboxParams
    {
        $this->indeterminateValue = $indeterminateValue;
        return $this;
    }
}
