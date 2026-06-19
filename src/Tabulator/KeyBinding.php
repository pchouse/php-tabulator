<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_CLASS)]
class KeyBinding extends ABase
{
    /**
     * @param string|bool|\PChouse\Tabulator\Undefined|null $navPrev
     * @param string|bool|\PChouse\Tabulator\Undefined|null $navNext
     * @param string|bool|\PChouse\Tabulator\Undefined|null $navLeft
     * @param string|bool|\PChouse\Tabulator\Undefined|null $navRight
     * @param string|bool|\PChouse\Tabulator\Undefined|null $navUp
     * @param string|bool|\PChouse\Tabulator\Undefined|null $navDown
     * @param string|bool|\PChouse\Tabulator\Undefined|null $undo
     * @param string|bool|\PChouse\Tabulator\Undefined|null $redo
     * @param string|bool|\PChouse\Tabulator\Undefined|null $scrollPageUp
     * @param string|bool|\PChouse\Tabulator\Undefined|null $scrollPageDown
     * @param string|bool|\PChouse\Tabulator\Undefined|null $scrollToStart
     * @param string|bool|\PChouse\Tabulator\Undefined|null $scrollToEnd
     * @param string|bool|\PChouse\Tabulator\Undefined|null $copyToClipboard
     */
    public function __construct(
        private string|bool|Undefined|null $navPrev = Undefined::UNDEFINED,
        private string|bool|Undefined|null $navNext = Undefined::UNDEFINED,
        private string|bool|Undefined|null $navLeft = Undefined::UNDEFINED,
        private string|bool|Undefined|null $navRight = Undefined::UNDEFINED,
        private string|bool|Undefined|null $navUp = Undefined::UNDEFINED,
        private string|bool|Undefined|null $navDown = Undefined::UNDEFINED,
        private string|bool|Undefined|null $undo = Undefined::UNDEFINED,
        private string|bool|Undefined|null $redo = Undefined::UNDEFINED,
        private string|bool|Undefined|null $scrollPageUp = Undefined::UNDEFINED,
        private string|bool|Undefined|null $scrollPageDown = Undefined::UNDEFINED,
        private string|bool|Undefined|null $scrollToStart = Undefined::UNDEFINED,
        private string|bool|Undefined|null $scrollToEnd = Undefined::UNDEFINED,
        private string|bool|Undefined|null $copyToClipboard = Undefined::UNDEFINED,
    ) {
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getNavPrev(): bool|string|Undefined|null
    {
        return $this->navPrev;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $navPrev
     *
     * @return KeyBinding
     */
    public function setNavPrev(bool|string|Undefined|null $navPrev): KeyBinding
    {
        $this->navPrev = $navPrev;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getNavNext(): bool|string|Undefined|null
    {
        return $this->navNext;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $navNext
     *
     * @return KeyBinding
     */
    public function setNavNext(bool|string|Undefined|null $navNext): KeyBinding
    {
        $this->navNext = $navNext;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getNavLeft(): bool|string|Undefined|null
    {
        return $this->navLeft;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $navLeft
     *
     * @return KeyBinding
     */
    public function setNavLeft(bool|string|Undefined|null $navLeft): KeyBinding
    {
        $this->navLeft = $navLeft;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getNavRight(): bool|string|Undefined|null
    {
        return $this->navRight;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $navRight
     *
     * @return KeyBinding
     */
    public function setNavRight(bool|string|Undefined|null $navRight): KeyBinding
    {
        $this->navRight = $navRight;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getNavUp(): bool|string|Undefined|null
    {
        return $this->navUp;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $navUp
     *
     * @return KeyBinding
     */
    public function setNavUp(bool|string|Undefined|null $navUp): KeyBinding
    {
        $this->navUp = $navUp;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getNavDown(): bool|string|Undefined|null
    {
        return $this->navDown;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $navDown
     *
     * @return KeyBinding
     */
    public function setNavDown(bool|string|Undefined|null $navDown): KeyBinding
    {
        $this->navDown = $navDown;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getUndo(): bool|string|Undefined|null
    {
        return $this->undo;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $undo
     *
     * @return KeyBinding
     */
    public function setUndo(bool|string|Undefined|null $undo): KeyBinding
    {
        $this->undo = $undo;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getRedo(): bool|string|Undefined|null
    {
        return $this->redo;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $redo
     *
     * @return KeyBinding
     */
    public function setRedo(bool|string|Undefined|null $redo): KeyBinding
    {
        $this->redo = $redo;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getScrollPageUp(): bool|string|Undefined|null
    {
        return $this->scrollPageUp;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $scrollPageUp
     *
     * @return KeyBinding
     */
    public function setScrollPageUp(bool|string|Undefined|null $scrollPageUp): KeyBinding
    {
        $this->scrollPageUp = $scrollPageUp;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getScrollPageDown(): bool|string|Undefined|null
    {
        return $this->scrollPageDown;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $scrollPageDown
     *
     * @return KeyBinding
     */
    public function setScrollPageDown(bool|string|Undefined|null $scrollPageDown): KeyBinding
    {
        $this->scrollPageDown = $scrollPageDown;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getScrollToStart(): bool|string|Undefined|null
    {
        return $this->scrollToStart;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $scrollToStart
     *
     * @return KeyBinding
     */
    public function setScrollToStart(bool|string|Undefined|null $scrollToStart): KeyBinding
    {
        $this->scrollToStart = $scrollToStart;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getScrollToEnd(): bool|string|Undefined|null
    {
        return $this->scrollToEnd;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $scrollToEnd
     *
     * @return KeyBinding
     */
    public function setScrollToEnd(bool|string|Undefined|null $scrollToEnd): KeyBinding
    {
        $this->scrollToEnd = $scrollToEnd;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getCopyToClipboard(): bool|string|Undefined|null
    {
        return $this->copyToClipboard;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $copyToClipboard
     *
     * @return KeyBinding
     */
    public function setCopyToClipboard(bool|string|Undefined|null $copyToClipboard): KeyBinding
    {
        $this->copyToClipboard = $copyToClipboard;
        return $this;
    }
}
