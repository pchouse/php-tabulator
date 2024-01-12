<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

use PChouse\Tabulator\Config\Config;

abstract class ABase implements \JsonSerializable
{

    #[NoExport]
    protected Translator|null $translator = null;

    /**
     * @return \PChouse\Tabulator\Translator|null
     */
    public function getTranslator(): ?Translator
    {
        return $this->translator;
    }

    /**
     * @param \PChouse\Tabulator\Translator|null $translator
     *
     * @return $this
     */
    public function setTranslator(?Translator $translator): static
    {
        $this->translator = $translator;
        return $this;
    }

    public function jsonSerialize(): array
    {
        $properties = (new \ReflectionClass($this))->getProperties();
        $config     = Config::instance();
        $vars       = [];

        foreach ($properties as $property) {
            if (\count($property->getAttributes(NoExport::class)) > 0) {
                continue;
            }

            /* @noinspection all */
            $property->setAccessible(true);
            $value = $property->getValue($this);
            if (!$config->getExportUndefined() && $value === Undefined::UNDEFINED) {
                continue;
            }

            if (\is_string($value) && \count($property->getAttributes(Translate::class)) > 0) {
                $vars[$property->getName()] = $this->translator?->translate($value) ?? $value;
            } else {
                $vars[$property->getName()] = $value;
            }
        }

        return $vars;
    }
}
