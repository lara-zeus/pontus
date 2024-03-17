<?php

namespace LaraZeus\Pontus;

use Closure;

trait Configuration
{
    /**
     * the resources navigation group
     */
    protected Closure | string $navigationGroupLabel = 'Pontus';

    public function navigationGroupLabel(Closure | string $label): static
    {
        $this->navigationGroupLabel = $label;

        return $this;
    }

    public function getNavigationGroupLabel(): Closure | string
    {
        return $this->evaluate($this->navigationGroupLabel);
    }
}
