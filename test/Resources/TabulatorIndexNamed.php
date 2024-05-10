<?php
declare(strict_types=1);

namespace PChouse\Resources;

use PChouse\Tabulator\Column\ColumnDefinition;
use PChouse\Tabulator\Index;
use PChouse\Tabulator\Options;

#[Options]
class TabulatorIndexNamed
{

    #[Index("ID-PROP")]
    #[ColumnDefinition(
        visible: true
    )]
    private int $id = 1;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return TabulatorIndexNamed
     */
    public function setId(int $id): TabulatorIndexNamed
    {
        $this->id = $id;
        return $this;
    }

}
