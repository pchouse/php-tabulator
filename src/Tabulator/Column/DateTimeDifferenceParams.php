<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class DateTimeDifferenceParams extends ABase
{

    /**
     * @param mixed|null $date
     * @param bool|\PChouse\Tabulator\Undefined $humanize
     * @param \PChouse\Tabulator\Column\DateTimeDiffUnit|\PChouse\Tabulator\Undefined|null $unit
     * @param bool|\PChouse\Tabulator\Undefined $suffix
     */
    public function __construct(
        private mixed                           $date = null,
        private bool|Undefined                  $humanize = Undefined::UNDEFINED,
        private DateTimeDiffUnit|Undefined|null $unit = Undefined::UNDEFINED,
        private bool|Undefined                  $suffix = Undefined::UNDEFINED,
    ) {
    }

    /**
     * @return null
     */
    public function getDate(): null
    {
        return $this->date;
    }

    /**
     * @param null $date
     *
     * @return DateTimeDifferenceParams
     */
    public function setDate(null $date): DateTimeDifferenceParams
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined
     */
    public function getHumanize(): bool|Undefined
    {
        return $this->humanize;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined $humanize
     *
     * @return DateTimeDifferenceParams
     */
    public function setHumanize(bool|Undefined $humanize): DateTimeDifferenceParams
    {
        $this->humanize = $humanize;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\DateTimeDiffUnit|\PChouse\Tabulator\Undefined|null
     */
    public function getUnit(): DateTimeDiffUnit|Undefined|null
    {
        return $this->unit;
    }

    /**
     * @param \PChouse\Tabulator\Column\DateTimeDiffUnit|\PChouse\Tabulator\Undefined|null $unit
     *
     * @return DateTimeDifferenceParams
     */
    public function setUnit(DateTimeDiffUnit|Undefined|null $unit): DateTimeDifferenceParams
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined
     */
    public function getSuffix(): bool|Undefined
    {
        return $this->suffix;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined $suffix
     *
     * @return DateTimeDifferenceParams
     */
    public function setSuffix(bool|Undefined $suffix): DateTimeDifferenceParams
    {
        $this->suffix = $suffix;
        return $this;
    }
}
