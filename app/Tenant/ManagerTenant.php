<?php

namespace App\Tenant;

class ManagerTenant
{
    public function getTenantIdentidy()
    {
        return auth()->user()->tenant->id;
    }
}