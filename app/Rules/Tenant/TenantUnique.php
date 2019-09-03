<?php

namespace App\Rules\Tenant;

use App\Tenant\ManagerTenant;
use Illuminate\Contracts\Validation\Rule;

class TenantUnique implements Rule
{
    private $table;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $tenant = app(ManagerTenant::class)->getTenantIdentify();
        
        $result = \DB::table($this->table)
                ->where($attribute, $value)
                ->where('tenant_id', $tenant)
                ->first();

        return is_null($result);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O valor informado para o campo :attribute já está em uso!';
    }
}
