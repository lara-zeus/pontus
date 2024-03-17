<?php

namespace LaraZeus\Pontus\Facades;

use Illuminate\Support\Facades\Facade;

class Pontus extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'pontus';
    }
}
