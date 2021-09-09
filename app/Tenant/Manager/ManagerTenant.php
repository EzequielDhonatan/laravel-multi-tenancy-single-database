<?php

namespace App\Tenant\Manager;

use App\Models\Tenant\Tenant;

class ManagerTenant
{
    public function getTenantIdentify()
    {
        return $this->getTenant()->id;
    }

    public function getTenant(): Tenant
    {
        return auth()->user()->tenant;
    }

} // ManagerTenant
