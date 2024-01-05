<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class TrafficParams extends ABase
{
    public function __construct(
        private int|float|Undefined|null $min = Undefined::UNDEFINED,
        private int|float|Undefined|null $max = Undefined::UNDEFINED,
        private string|Undefined|null    $color = Undefined::UNDEFINED,
    ) {
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
     * @return TrafficParams
     */
    public function setMin(float|int|Undefined|null $min): TrafficParams
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
     * @return TrafficParams
     */
    public function setMax(float|int|Undefined|null $max): TrafficParams
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getColor(): string|Undefined|null
    {
        return $this->color;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $color
     *
     * @return TrafficParams
     */
    public function setColor(string|Undefined|null $color): TrafficParams
    {
        $this->color = $color;
        return $this;
    }
}
