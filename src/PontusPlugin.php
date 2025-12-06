<?php

namespace LaraZeus\Pontus;

use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use LaraZeus\FilamentPluginTools\Concerns\CanHideResources;
use LaraZeus\FilamentPluginTools\Concerns\HasNavigationGroupLabel;
use LaraZeus\Pontus\Filament\Resources\InvoiceResource;
use LaraZeus\Pontus\Filament\Resources\PlanResource;
use LaraZeus\Pontus\Filament\Resources\PlanSubscriptionResource;

final class PontusPlugin implements Plugin
{
    use CanHideResources;
    use EvaluatesClosures;
    use HasNavigationGroupLabel;

    protected Closure | string $navigationGroupLabel = 'Pontus';

    public function getId(): string
    {
        return 'zeus-pontus';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                InvoiceResource::class,
                PlanResource::class,
                PlanSubscriptionResource::class,
            ]);
    }

    public static function make(): static
    {
        return new self;
    }

    public static function get(): static
    {
        // @phpstan-ignore-next-line
        return filament('zeus-pontus');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
