<?php

namespace App\Observers\Tenant;

use Illuminate\Database\Eloquent\Model;

use App\Tenant\Manager\ManagerTenant;

class TenantObserver
{
    public function creating( Model $model )
    {
        $tenant = app( ManagerTenant::class )->getTenantIdentify();

        $model->setAttribute( 'tenant_id', $tenant );
    }

} // TenantObserver
