<?php

namespace LaraZeus\Pontus;

use Closure;

trait Configuration
{
    /**
     * the resources navigation group
     */
    protected Closure | string $navigationGroupLabel = 'Pontus';

    protected array $hideResources = [];

    public function navigationGroupLabel(Closure | string $label): static
    {
        $this->navigationGroupLabel = $label;

        return $this;
    }

    public function getNavigationGroupLabel(): Closure | string
    {
        return $this->evaluate($this->navigationGroupLabel);
    }

    public function hideResources(array $resources): static
    {
        $this->hideResources = $resources;

        return $this;
    }

    public function getHiddenResources(): ?array
    {
        return $this->hideResources;
    }
}
