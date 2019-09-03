<?php

namespace App\Tenant\Traits;

use App\Scopes\Tenant\TenantScope;
use App\Observers\Tenant\TenantObserver;

trait TenantTrait
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope);

        static::observe(new TenantObserver);
    }
}