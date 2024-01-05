<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class LinkParams extends ABase
{
    public function __construct(
        private string|Undefined|null $labelField = Undefined::UNDEFINED,
        private string|Undefined|null $label = Undefined::UNDEFINED,
        private string|Undefined|null $urlPrefix = Undefined::UNDEFINED,
        private string|Undefined|null $urlField = Undefined::UNDEFINED,
        private string|Undefined|null $url = Undefined::UNDEFINED,
        private string|Undefined|null $target = Undefined::UNDEFINED,
        private string|Undefined|null $download = Undefined::UNDEFINED,
    )
    {
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getLabelField(): string|Undefined|null
    {
        return $this->labelField;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $labelField
     *
     * @return LinkParams
     */
    public function setLabelField(string|Undefined|null $labelField): LinkParams
    {
        $this->labelField = $labelField;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getLabel(): string|Undefined|null
    {
        return $this->label;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $label
     *
     * @return LinkParams
     */
    public function setLabel(string|Undefined|null $label): LinkParams
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getUrlPrefix(): string|Undefined|null
    {
        return $this->urlPrefix;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $urlPrefix
     *
     * @return LinkParams
     */
    public function setUrlPrefix(string|Undefined|null $urlPrefix): LinkParams
    {
        $this->urlPrefix = $urlPrefix;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getUrlField(): string|Undefined|null
    {
        return $this->urlField;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $urlField
     *
     * @return LinkParams
     */
    public function setUrlField(string|Undefined|null $urlField): LinkParams
    {
        $this->urlField = $urlField;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getUrl(): string|Undefined|null
    {
        return $this->url;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $url
     *
     * @return LinkParams
     */
    public function setUrl(string|Undefined|null $url): LinkParams
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getTarget(): string|Undefined|null
    {
        return $this->target;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $target
     *
     * @return LinkParams
     */
    public function setTarget(string|Undefined|null $target): LinkParams
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getDownload(): string|Undefined|null
    {
        return $this->download;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $download
     *
     * @return LinkParams
     */
    public function setDownload(string|Undefined|null $download): LinkParams
    {
        $this->download = $download;
        return $this;
    }
}
