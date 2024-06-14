<?php

namespace LaraZeus\Pontus\Filament\Resources\PlanResource\Pages;

use Filament\Actions;
use LaraZeus\Chaos\Filament\ChaosResource\Pages\ChaosListRecords;
use LaraZeus\Pontus\Filament\Resources\PlanResource;

class ListPlans extends ChaosListRecords
{
    protected static string $resource = PlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
