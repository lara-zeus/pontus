<?php

namespace LaraZeus\Pontus\Enums;

use Filament\Support\Contracts\HasLabel;

enum Intervals: string implements HasLabel
{
    case Hour = 'hour';
    case Day = 'day';
    case Week = 'week';
    case Month = 'month';
    case Year = 'year';

    public function getLabel(): ?string
    {
        return __('zeus-pontus::plan.' . $this->name);
    }
}
