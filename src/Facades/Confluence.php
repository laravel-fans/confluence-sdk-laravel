<?php

namespace LaravelFans\Confluence\Facades;

use Illuminate\Support\Facades\Facade;

class Confluence extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'confluence';
    }
}
