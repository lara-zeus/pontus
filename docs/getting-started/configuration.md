---
title: Configuration
weight: 3
---

## Configuration

to configure the plugin Athena, you can pass the configuration to the plugin in `adminPanelProvider`

these all the available configuration, and their defaults values

```php
AthenaPlugin::make()
    ->athenaModels([
        'RequestPeriods' => RequestPeriods::class,
        'Request' => Request::class,
        'Service' => Service::class,
        'TimeLock' => TimeLock::class,
        'RequestStatus' => RequestStatus::class,
    ])
    ->navigationGroupLabel('Athena')
```

## Frontend Configuration

use the file `zeus-athena.php`, to customize the frontend, like the prefix,domain, and middleware for each content type.

to publish the configuration:

```bash
php artisan vendor:publish --tag=zeus-athena-config
```