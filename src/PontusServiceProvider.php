<?php

namespace LaraZeus\Pontus;

use LaraZeus\Core\CoreServiceProvider;
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

    public function packageBooted(): void
    {
        CoreServiceProvider::setThemePath('pontus');
    }
}
