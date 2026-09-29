<?php

namespace ElvinQulizade\Versions\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ElvinQulizade\Versions\Versions
 */
class Versions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ElvinQulizade\Versions\Versions::class;
    }
}
