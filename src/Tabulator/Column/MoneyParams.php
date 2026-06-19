<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class MoneyParams extends ABase
{
    /**
     * @param string|\PChouse\Tabulator\Undefined|null $decimal
     * @param string|\PChouse\Tabulator\Undefined|null $thousand
     * @param string|\PChouse\Tabulator\Undefined|null $symbol
     * @param bool|\PChouse\Tabulator\Undefined|null $symbolAfter
     * @param bool|\PChouse\Tabulator\Undefined|null $precision
     * @param string|\PChouse\Tabulator\Undefined|null $negativeSign
     */
    public function __construct(
        private string|Undefined|null $decimal = Undefined::UNDEFINED,
        private string|Undefined|null $thousand = Undefined::UNDEFINED,
        private string|Undefined|null $symbol = Undefined::UNDEFINED,
        private bool|Undefined|null   $symbolAfter = Undefined::UNDEFINED,
        private bool|Undefined|null   $precision = Undefined::UNDEFINED,
        private string|Undefined|null $negativeSign = Undefined::UNDEFINED,
    ) {
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getDecimal(): string|Undefined|null
    {
        return $this->decimal;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $decimal
     *
     * @return MoneyParams
     */
    public function setDecimal(string|Undefined|null $decimal): MoneyParams
    {
        $this->decimal = $decimal;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getThousand(): string|Undefined|null
    {
        return $this->thousand;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $thousand
     *
     * @return MoneyParams
     */
    public function setThousand(string|Undefined|null $thousand): MoneyParams
    {
        $this->thousand = $thousand;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getSymbol(): string|Undefined|null
    {
        return $this->symbol;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $symbol
     *
     * @return MoneyParams
     */
    public function setSymbol(string|Undefined|null $symbol): MoneyParams
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getSymbolAfter(): bool|Undefined|null
    {
        return $this->symbolAfter;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $symbolAfter
     *
     * @return MoneyParams
     */
    public function setSymbolAfter(bool|Undefined|null $symbolAfter): MoneyParams
    {
        $this->symbolAfter = $symbolAfter;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getPrecision(): bool|Undefined|null
    {
        return $this->precision;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $precision
     *
     * @return MoneyParams
     */
    public function setPrecision(bool|Undefined|null $precision): MoneyParams
    {
        $this->precision = $precision;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getNegativeSign(): string|Undefined|null
    {
        return $this->negativeSign;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $negativeSign
     *
     * @return MoneyParams
     */
    public function setNegativeSign(string|Undefined|null $negativeSign): MoneyParams
    {
        $this->negativeSign = $negativeSign;
        return $this;
    }
}
