---
title: Setup
weight: 2
---

## Setup Athena and Bolt

to install Athena, use the command:

`php artisan athena:install`

The install command will publish the migrations and all the necessary assets for the frontend.

if you prefere to run everything manually, here is what you need:

## Migrations

```bash
php artisan vendor:publish --tag=zeus-bolt-migrations
php artisan vendor:publish --tag=zeus-athena-migrations
php artisan vendor:publish --provider="BeyondCode\Comments\CommentsServiceProvider" --tag="migrations"
```

if you're using multi tenants, add the tenant columns to all tables

then, run the migration:

```bash
php artisan migrate
```

## Config

publish the configurations files:

```bash
php artisan vendor:publish --tag=zeus-bolt-config
php artisan vendor:publish --tag=zeus-athena-config
php artisan vendor:publish --tag=zeus-config
```

## assets:

```bash
php artisan vendor:publish --tag=zeus-assets
```

## Register Athena with Filament:

To set up the plugin with filament, you need to add it to your panel provider; The default one is `adminPanelProvider`

```php
->plugins([
    SpatieLaravelTranslatablePlugin::make()->defaultLocales([config('app.locale')]),
    BoltPlugin::make()
        ->extensions([
            \LaraZeus\Athena\Extensions\Athena::class,
        ]),
    AthenaPlugin::make(),
    \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::make()
])
```

### Add trait to User Model

you need to add the trait to your `User` model:

`use \LaraZeus\Athena\Models\Concerns\BelongToAthena;`
