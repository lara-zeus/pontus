---
title: Themes and Assets
weight: 5
---

## Compiling assets

we use [tailwind Css](https://tailwindcss.com/) and custom themes by filament, make sure you are familiar with [tailwindcss configuration](https://tailwindcss.com/docs/configuration), and how to make custom [filament theme](https://filamentphp.com/docs/3.x/admin/appearance#building-themes).

### Custom Classes:

You need to add these files to your `tailwind.config.js` file in the `content` section.

* frontend:
```js
   './vendor/lara-zeus/core/resources/views/**/*.blade.php',
   './vendor/lara-zeus/athena/resources/views/themes/**/*.blade.php',
   './vendor/lara-zeus/athena/resources/views/components/**/*.blade.php',
   './vendor/lara-zeus/athena/src/Models/RequestStatus.php'
```

* filament:
* ```js
   './vendor/lara-zeus/athena/resources/views/filament/**/*.blade.php'
   './vendor/lara-zeus/athena/src/Models/RequestStatus.php',
```
