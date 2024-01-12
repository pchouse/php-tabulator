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
class DateTimeParams extends ABase
{
    public function __construct(
        private string|Undefined|null                       $inputFormat = Undefined::UNDEFINED,
        private string|Undefined|null                       $outputFormat = Undefined::UNDEFINED,
        #[Translate] private string|true|int|Undefined|null $invalidPlaceholder = Undefined::UNDEFINED,
        private string|Undefined|null                       $timezone = Undefined::UNDEFINED,
    ) {
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getInputFormat(): string|Undefined|null
    {
        return $this->inputFormat;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $inputFormat
     *
     * @return DateTimeParams
     */
    public function setInputFormat(string|Undefined|null $inputFormat): DateTimeParams
    {
        $this->inputFormat = $inputFormat;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getOutputFormat(): string|Undefined|null
    {
        return $this->outputFormat;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $outputFormat
     *
     * @return DateTimeParams
     */
    public function setOutputFormat(string|Undefined|null $outputFormat): DateTimeParams
    {
        $this->outputFormat = $outputFormat;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|string|true|null
     */
    public function getInvalidPlaceholder(): true|int|string|Undefined|null
    {
        return $this->invalidPlaceholder;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|string|true|null $invalidPlaceholder
     *
     * @return DateTimeParams
     */
    public function setInvalidPlaceholder(true|int|string|Undefined|null $invalidPlaceholder): DateTimeParams
    {
        $this->invalidPlaceholder = $invalidPlaceholder;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getTimezone(): string|Undefined|null
    {
        return $this->timezone;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $timezone
     *
     * @return DateTimeParams
     */
    public function setTimezone(string|Undefined|null $timezone): DateTimeParams
    {
        $this->timezone = $timezone;
        return $this;
    }
}
