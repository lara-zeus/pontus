---
title: Configuration
weight: 3
---

## Configuration

to configure the plugin Pontus, you can pass the configuration to the plugin in `adminPanelProvider`

these all the available configuration, and their defaults values

```php
PontusPlugin::make()
    ->navigationGroupLabel('Pontus')
```

## Frontend Configuration

use the file `zeus-pontus.php`, to customize the frontend, like the prefix,domain, and middleware for each content type.

to publish the configuration:

```bash
php artisan vendor:publish --tag=zeus-pontus-config
```