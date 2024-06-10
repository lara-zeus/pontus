<?php

namespace LaraZeus\Pontus\Filament\Resources\PlanResource\Pages;

use Filament\Resources\Pages\ListRecords;
use LaraZeus\Pontus\Filament\Resources\PlanResource;
use Filament\Actions;

class ListPlans extends ListRecords
{
    protected static string $resource = PlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
