<?php

namespace LaraZeus\Pontus\Enums;

use Filament\Support\Contracts\HasLabel;

enum Features: string implements HasLabel
{
    case Users = 'users';

    public function getLabel(): ?string
    {
        return __('zeus-pontus::plan.features.' . $this->name);
    }
}
