<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Index
{
    public function __construct(protected ?string $name = null)
    {
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return Index
     */
    public function setName(?string $name): Index
    {
        $this->name = $name;
        return $this;
    }
}
