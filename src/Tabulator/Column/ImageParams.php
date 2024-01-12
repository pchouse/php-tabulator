<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class ImageParams extends ABase
{

    /**
     * @param string|\PChouse\Tabulator\Undefined|null $height
     * @param string|\PChouse\Tabulator\Undefined|null $width
     * @param string|\PChouse\Tabulator\Undefined|null $urlPrefix
     * @param string|\PChouse\Tabulator\Undefined|null $urlSuffix
     */
    public function __construct(
        private string|Undefined|null $height = Undefined::UNDEFINED,
        private string|Undefined|null $width = Undefined::UNDEFINED,
        private string|Undefined|null $urlPrefix = Undefined::UNDEFINED,
        private string|Undefined|null $urlSuffix = Undefined::UNDEFINED,
    ) {
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getHeight(): string|Undefined|null
    {
        return $this->height;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $height
     *
     * @return ImageParams
     */
    public function setHeight(string|Undefined|null $height): ImageParams
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getWidth(): string|Undefined|null
    {
        return $this->width;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $width
     *
     * @return ImageParams
     */
    public function setWidth(string|Undefined|null $width): ImageParams
    {
        $this->width = $width;
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
     * @return ImageParams
     */
    public function setUrlPrefix(string|Undefined|null $urlPrefix): ImageParams
    {
        $this->urlPrefix = $urlPrefix;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getUrlSuffix(): string|Undefined|null
    {
        return $this->urlSuffix;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $urlSuffix
     *
     * @return ImageParams
     */
    public function setUrlSuffix(string|Undefined|null $urlSuffix): ImageParams
    {
        $this->urlSuffix = $urlSuffix;
        return $this;
    }
}
