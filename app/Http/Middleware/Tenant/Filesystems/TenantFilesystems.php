<?php

namespace App\Http\Middleware\Tenant\Filesystems;

use Closure;
use Illuminate\Http\Request;

use App\Tenant\Manager\ManagerTenant;

class TenantFilesystems
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next )
    {
        if ( auth()->check() )
            $this->setFilesystemsRoot();

        return $next( $request );
    }

    public function setFilesystemsRoot()
    {
        $tenant = app( ManagerTenant::class )->getTenant();

        config()->set(
            'filesystems.disks.tenant.root',
            config('filesystems.disks.tenant.root') . "/{$tenant->uuid}"
        );
    }

} // TenantFylesystems
