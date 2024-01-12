<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

abstract class SharedEditorParams extends ABase
{

    /**
     * @param string|\PChouse\Tabulator\Undefined|null $mask
     * @param bool|\PChouse\Tabulator\Undefined|null $maskAutoFill       You are using fixed characters in your mask
     *                                                                   (any character other that A, 9 or *)
     * @param string|\PChouse\Tabulator\Undefined|null $maskLetterChar
     * @param string|\PChouse\Tabulator\Undefined|null $maskNumberChar
     * @param string|\PChouse\Tabulator\Undefined|null $maskWildcardChar
     */
    public function __construct(
        private string|Undefined|null $mask,
        private bool|Undefined|null   $maskAutoFill,
        private string|Undefined|null $maskLetterChar,
        private string|Undefined|null $maskNumberChar,
        private string|Undefined|null $maskWildcardChar,
    ) {
    }

    /**
     * Built-in editors based on input elements such as the input, number, textarea and autocomplete editors
     * have the ability to mask the users input to restrict it to match a given pattern.
     *
     *  This can be set by passing a string to the mask option in the columns editorParams
     *  Each character in the string passed to the mask option defines what type of character
     * can be entered in that position in the editor.
     *
     *  - A - Only a letter is valid in this position
     *  - 9 - Only a number is valid in this position
     *  - `*` - Any character is valid in this position
     *
     *  Any other character - The character in this position must be the same as the mask
     *  For example, a mask string of "AAA-999" would require the user to enter three letters
     * followed by a hyphen followed by three numbers
     *
     *  If you want to use the characters A, 9 or * as fixed characters then it is possible to
     * change the characters looked for in the mask by using the maskLetterChar, maskNumberChar and
     * maskWildcardChar options in the editorParams
     *
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getMask(): string|Undefined|null
    {
        return $this->mask;
    }

    /**
     * Built-in editors based on input elements such as the input, number, textarea and autocomplete editors have the
     * ability to mask the users input to restrict it to match a given pattern.
     *
     *  This can be set by passing a string to the mask option in the columns editorParams
     *  Each character in the string passed to the mask option defines what type of character can be
     * entered in that position in the editor.
     *
     *  - A - Only a letter is valid in this position
     *  - 9 - Only a number is valid in this position
     *  - `*` - Any character is valid in this position
     *
     *  Any other character - The character in this position must be the same as the mask
     *  For example, a mask string of "AAA-999" would require the user to enter three letters followed
     * by a hyphen followed by three numbers
     *
     *  If you want to use the characters A, 9 or * as fixed characters then it is possible to change the
     * characters looked for in the mask by using the maskLetterChar, maskNumberChar and maskWildcardChar
     * options in the editorParams
     *
     * @param \PChouse\Tabulator\Undefined|string|null $mask
     *
     * @return SharedEditorParams
     */
    public function setMask(string|Undefined|null $mask): SharedEditorParams
    {
        $this->mask = $mask;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getMaskAutoFill(): bool|Undefined|null
    {
        return $this->maskAutoFill;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $maskAutoFill
     *
     * @return SharedEditorParams
     */
    public function setMaskAutoFill(bool|Undefined|null $maskAutoFill): SharedEditorParams
    {
        $this->maskAutoFill = $maskAutoFill;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getMaskLetterChar(): string|Undefined|null
    {
        return $this->maskLetterChar;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $maskLetterChar
     *
     * @return SharedEditorParams
     */
    public function setMaskLetterChar(string|Undefined|null $maskLetterChar): SharedEditorParams
    {
        $this->maskLetterChar = $maskLetterChar;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getMaskNumberChar(): string|Undefined|null
    {
        return $this->maskNumberChar;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $maskNumberChar
     *
     * @return SharedEditorParams
     */
    public function setMaskNumberChar(string|Undefined|null $maskNumberChar): SharedEditorParams
    {
        $this->maskNumberChar = $maskNumberChar;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getMaskWildcardChar(): string|Undefined|null
    {
        return $this->maskWildcardChar;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $maskWildcardChar
     *
     * @return SharedEditorParams
     */
    public function setMaskWildcardChar(string|Undefined|null $maskWildcardChar): SharedEditorParams
    {
        $this->maskWildcardChar = $maskWildcardChar;
        return $this;
    }
}
