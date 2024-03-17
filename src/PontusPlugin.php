<?php

namespace LaraZeus\Pontus;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use LaraZeus\Pontus\Filament\Resources\InvoiceResource;
use LaraZeus\Pontus\Filament\Resources\PlanResource;
use LaraZeus\Pontus\Filament\Resources\PlanSubscriptionResource;

final class PontusPlugin implements Plugin
{
    use Configuration;
    use EvaluatesClosures;

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
        return new self();
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
