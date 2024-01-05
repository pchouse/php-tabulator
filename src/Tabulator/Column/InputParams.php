<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class InputParams extends SharedEditorParams
{
    /**
     * @param string|\PChouse\Tabulator\Undefined|null $mask
     * @param bool|\PChouse\Tabulator\Undefined|null $maskAutoFill
     * @param string|\PChouse\Tabulator\Undefined|null $maskLetterChar
     * @param string|\PChouse\Tabulator\Undefined|null $maskNumberChar
     * @param string|\PChouse\Tabulator\Undefined|null $maskWildcardChar
     * @param bool|\PChouse\Tabulator\Undefined|null $search             Changes input type to 'search' and shows an 'X'
     *                                                                   clear button to clear the cell value easily.
     * @param bool|\PChouse\Tabulator\Undefined|null $selectContents     When the editor is loaded select its text content
     */
    public function __construct(
        string|Undefined|null       $mask = Undefined::UNDEFINED,
        bool|Undefined|null         $maskAutoFill = Undefined::UNDEFINED,
        string|Undefined|null       $maskLetterChar = Undefined::UNDEFINED,
        string|Undefined|null       $maskNumberChar = Undefined::UNDEFINED,
        string|Undefined|null       $maskWildcardChar = Undefined::UNDEFINED,
        private bool|Undefined|null $search = Undefined::UNDEFINED,
        private bool|Undefined|null $selectContents = Undefined::UNDEFINED,
    )
    {
        parent::__construct($mask, $maskAutoFill, $maskLetterChar, $maskNumberChar, $maskWildcardChar);
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getSearch(): bool|Undefined|null
    {
        return $this->search;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $search
     *
     * @return InputParams
     */
    public function setSearch(bool|Undefined|null $search): InputParams
    {
        $this->search = $search;
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
     * @return InputParams
     */
    public function setSelectContents(bool|Undefined|null $selectContents): InputParams
    {
        $this->selectContents = $selectContents;
        return $this;
    }
}
