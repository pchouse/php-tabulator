<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class ToggleParams extends ABase
{
    /**
     * @param int|\PChouse\Tabulator\Undefined|null             $size      size in pixes for the switch
     * @param int|\PChouse\Tabulator\Undefined|null             $max       value for progress bar (default 100)
     * @param bool|string|int|\PChouse\Tabulator\Undefined|null $onValue   the value of the cell for the switch to be on
     * @param bool|string|int|\PChouse\Tabulator\Undefined|null $offValue  the value of the cell for the switch to be on
     * @param bool|\PChouse\Tabulator\Undefined|null            $onTruthy  will show the switch as on,
     *                                                                     if the value of the cell is truthy
     * @param string|\PChouse\Tabulator\Undefined|null          $onColor   the colour of the switch if it is on
     * @param string|\PChouse\Tabulator\Undefined|null          $offColor  the colour of the switch if it is off
     * @param bool|\PChouse\Tabulator\Undefined|null            $clickable enable switch functionality to toggle
     *                                                                     the cell value on click
     */
    public function __construct(
        private int|Undefined|null             $size = Undefined::UNDEFINED,
        private int|Undefined|null             $max = Undefined::UNDEFINED,
        private bool|string|int|Undefined|null $onValue = Undefined::UNDEFINED,
        private bool|string|int|Undefined|null $offValue = Undefined::UNDEFINED,
        private bool|Undefined|null            $onTruthy = true,
        private string|Undefined|null          $onColor = Undefined::UNDEFINED,
        private string|Undefined|null          $offColor = Undefined::UNDEFINED,
        private bool|Undefined|null            $clickable = Undefined::UNDEFINED,
    ) {
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getSize(): int|Undefined|null
    {
        return $this->size;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|null $size
     *
     * @return ToggleParams
     */
    public function setSize(int|Undefined|null $size): ToggleParams
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getMax(): int|Undefined|null
    {
        return $this->max;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|null $max
     *
     * @return ToggleParams
     */
    public function setMax(int|Undefined|null $max): ToggleParams
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return bool|int|\PChouse\Tabulator\Undefined|string|null
     */
    public function getOnValue(): bool|int|string|Undefined|null
    {
        return $this->onValue;
    }

    /**
     * @param bool|int|\PChouse\Tabulator\Undefined|string|null $onValue
     *
     * @return ToggleParams
     */
    public function setOnValue(bool|int|string|Undefined|null $onValue): ToggleParams
    {
        $this->onValue = $onValue;
        return $this;
    }

    /**
     * @return bool|int|\PChouse\Tabulator\Undefined|string|null
     */
    public function getOffValue(): bool|int|string|Undefined|null
    {
        return $this->offValue;
    }

    /**
     * @param bool|int|\PChouse\Tabulator\Undefined|string|null $offValue
     *
     * @return ToggleParams
     */
    public function setOffValue(bool|int|string|Undefined|null $offValue): ToggleParams
    {
        $this->offValue = $offValue;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getOnTruthy(): bool|Undefined|null
    {
        return $this->onTruthy;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $onTruthy
     *
     * @return ToggleParams
     */
    public function setOnTruthy(bool|Undefined|null $onTruthy): ToggleParams
    {
        $this->onTruthy = $onTruthy;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getOnColor(): string|Undefined|null
    {
        return $this->onColor;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $onColor
     *
     * @return ToggleParams
     */
    public function setOnColor(string|Undefined|null $onColor): ToggleParams
    {
        $this->onColor = $onColor;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getOffColor(): string|Undefined|null
    {
        return $this->offColor;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $offColor
     *
     * @return ToggleParams
     */
    public function setOffColor(string|Undefined|null $offColor): ToggleParams
    {
        $this->offColor = $offColor;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getClickable(): bool|Undefined|null
    {
        return $this->clickable;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $clickable
     *
     * @return ToggleParams
     */
    public function setClickable(bool|Undefined|null $clickable): ToggleParams
    {
        $this->clickable = $clickable;
        return $this;
    }
}
