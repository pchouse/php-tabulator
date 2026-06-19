<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class StarRatingParams extends ABase
{
    public function __construct(
        private int|Undefined|null $stars = Undefined::UNDEFINED
    ) {
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getStars(): int|Undefined|null
    {
        return $this->stars;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|null $stars
     *
     * @return StarRatingParams
     */
    public function setStars(int|Undefined|null $stars): StarRatingParams
    {
        $this->stars = $stars;
        return $this;
    }
}
