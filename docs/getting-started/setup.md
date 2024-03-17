---
title: Setup
weight: 2
---

## Setup Pontus

to install Pontus, use the command:

`php artisan pontus:install`

The install command will publish the migrations.

## Register Pontus with Filament:

To set up the plugin with filament, you need to add it to your panel provider; The default one is `adminPanelProvider`

```php
->plugins([
    PontusPlugin::make(),
])
```
