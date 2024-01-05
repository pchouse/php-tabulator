<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Translate;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class ProgressBarParams extends ABase
{
    public function __construct(
        #[Translate] private string|true|Undefined|null $legend = Undefined::UNDEFINED,
        private string|Undefined|null                   $legendColor = Undefined::UNDEFINED,
        private ColumnDefinitionAlign|Undefined|null    $legendAlign = Undefined::UNDEFINED,
    ) {
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|true|null
     */
    public function getLegend(): true|string|Undefined|null
    {
        return $this->legend;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|true|null $legend
     *
     * @return ProgressBarParams
     */
    public function setLegend(true|string|Undefined|null $legend): ProgressBarParams
    {
        $this->legend = $legend;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getLegendColor(): string|Undefined|null
    {
        return $this->legendColor;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $legendColor
     *
     * @return ProgressBarParams
     */
    public function setLegendColor(string|Undefined|null $legendColor): ProgressBarParams
    {
        $this->legendColor = $legendColor;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\ColumnDefinitionAlign|\PChouse\Tabulator\Undefined|null
     */
    public function getLegendAlign(): ColumnDefinitionAlign|Undefined|null
    {
        return $this->legendAlign;
    }

    /**
     * @param \PChouse\Tabulator\Column\ColumnDefinitionAlign|\PChouse\Tabulator\Undefined|null $legendAlign
     *
     * @return ProgressBarParams
     */
    public function setLegendAlign(ColumnDefinitionAlign|Undefined|null $legendAlign): ProgressBarParams
    {
        $this->legendAlign = $legendAlign;
        return $this;
    }
}
