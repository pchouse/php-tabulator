<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class TextAreaParams extends SharedEditorParams
{
    /**
     * @param string|\PChouse\Tabulator\Undefined|null $mask
     * @param bool|\PChouse\Tabulator\Undefined|null $maskAutoFill
     * @param string|\PChouse\Tabulator\Undefined|null $maskLetterChar
     * @param string|\PChouse\Tabulator\Undefined|null $maskNumberChar
     * @param string|\PChouse\Tabulator\Undefined|null $maskWildcardChar
     * @param bool|null $shiftEnterSubmit                                Allow submission of the value of the editor
     *                                                                   when the shift and
     *                                                                   enter keys are pressed together.
     * @param bool|\PChouse\Tabulator\Undefined|null $selectContents     When the editor is loaded select its
     *                                                                   text content
     */
    public function __construct(
        string|Undefined|null       $mask,
        bool|Undefined|null         $maskAutoFill,
        string|Undefined|null       $maskLetterChar,
        string|Undefined|null       $maskNumberChar,
        string|Undefined|null       $maskWildcardChar,
        private bool|null           $shiftEnterSubmit = null,
        private bool|Undefined|null $selectContents = Undefined::UNDEFINED,
    ) {
        parent::__construct($mask, $maskAutoFill, $maskLetterChar, $maskNumberChar, $maskWildcardChar);
    }

    /**
     * @return bool|null
     */
    public function getShiftEnterSubmit(): ?bool
    {
        return $this->shiftEnterSubmit;
    }

    /**
     * @param bool|null $shiftEnterSubmit
     *
     * @return TextAreaParams
     */
    public function setShiftEnterSubmit(?bool $shiftEnterSubmit): TextAreaParams
    {
        $this->shiftEnterSubmit = $shiftEnterSubmit;
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
     * @return TextAreaParams
     */
    public function setSelectContents(bool|Undefined|null $selectContents): TextAreaParams
    {
        $this->selectContents = $selectContents;
        return $this;
    }
}
