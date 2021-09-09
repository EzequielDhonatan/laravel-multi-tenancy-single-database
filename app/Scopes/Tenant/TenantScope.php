<?php

namespace App\Scopes\Tenant;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use App\Tenant\Manager\ManagerTenant;

class TenantScope implements Scope
{
    public function apply( Builder $builder, Model $model )
    {
        $tenant = app( ManagerTenant::class )->getTenantIdentify();

        $builder->where( 'tenant_id', $tenant );
    }

} // TenantScope
