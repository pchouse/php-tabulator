<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class TickCrossParams extends ABase
{
    public function __construct(
        private bool|Undefined|null        $allowEmpty = Undefined::UNDEFINED,
        private bool|Undefined|null        $allowTruthy = Undefined::UNDEFINED,
        private bool|string|Undefined|null $tickElement = Undefined::UNDEFINED,
        private bool|string|Undefined|null $crossElement = Undefined::UNDEFINED,
    ) {
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getAllowEmpty(): bool|Undefined|null
    {
        return $this->allowEmpty;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $allowEmpty
     *
     * @return TickCrossParams
     */
    public function setAllowEmpty(bool|Undefined|null $allowEmpty): TickCrossParams
    {
        $this->allowEmpty = $allowEmpty;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getAllowTruthy(): bool|Undefined|null
    {
        return $this->allowTruthy;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $allowTruthy
     *
     * @return TickCrossParams
     */
    public function setAllowTruthy(bool|Undefined|null $allowTruthy): TickCrossParams
    {
        $this->allowTruthy = $allowTruthy;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getTickElement(): bool|string|Undefined|null
    {
        return $this->tickElement;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $tickElement
     *
     * @return TickCrossParams
     */
    public function setTickElement(bool|string|Undefined|null $tickElement): TickCrossParams
    {
        $this->tickElement = $tickElement;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getCrossElement(): bool|string|Undefined|null
    {
        return $this->crossElement;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $crossElement
     *
     * @return TickCrossParams
     */
    public function setCrossElement(bool|string|Undefined|null $crossElement): TickCrossParams
    {
        $this->crossElement = $crossElement;
        return $this;
    }
}
