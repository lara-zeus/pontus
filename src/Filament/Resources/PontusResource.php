<?php

namespace LaraZeus\Pontus\Filament\Resources;

use Filament\Resources\Resource;
use LaraZeus\Pontus\PontusPlugin;

class PontusResource extends Resource
{
    public static function getNavigationGroup(): ?string
    {
        return PontusPlugin::get()->getNavigationGroupLabel();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return ! in_array(static::class, PontusPlugin::get()->getHiddenResources());
    }
}
