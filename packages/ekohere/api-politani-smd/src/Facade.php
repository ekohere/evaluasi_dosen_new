<?php

namespace Britech\ApiPolitaniSmd;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade
{
    protected static function getFacadeAccessor() { 
        return 'api-politani-smd';
    }
}