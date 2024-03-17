---
title: Installation
weight: 1
---

## Prerequisites

Athena is built on top of [laravel](https://laravel.com/docs/master) and uses [filament](https://filamentphp.com/docs/3.x/panels/installation) as an admin panel to manage everything.

And for the frontend, it uses [Tall stack](https://tallstack.dev/).
So, ensure you are familiar with these tools before diving into @zeus Athena.

> **Note**\
> You can get up and running with our [starter kit Zeus](https://github.com/lara-zeus/zeus).

also, Athena is using Bolt as a form manager, that way it's easier to create different forms for each service
.
when installing Athena, Bolt will be installed, but if you want to do more configuration, please check [Bolt docs](https://larazeus.com/docs/bolt/v3/introduction)

## Installation

> **Important**\
> Before starting, make sure you have the following PHP extensions enabled:
`sqlite`

You can install @zeus Athena by running the following commands in your Laravel project directory.

>For more information about how to setup our privet repository, please visit your [dashboard](https://larazeus.com/dashboard)

```bash
composer require lara-zeus/athena
```
