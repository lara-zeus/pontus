<?php

namespace LaraZeus\Pontus;

use LaraZeus\Pontus\Console\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PontusServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus-pontus';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasCommands([
                InstallCommand::class,
            ])
            ->hasTranslations();
    }
}
