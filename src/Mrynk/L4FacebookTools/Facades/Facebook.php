<?php namespace Mrynk\L4FacebookTools\Facades;

use Illuminate\Support\Facades\Facade;

class Facebook extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'facebook'; }

}