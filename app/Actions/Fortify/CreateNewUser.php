<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use App\Models\User;
use App\Models\Tenant\Tenant;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'tenant'    => ['required', 'string', 'min:3', 'max:100', 'unique:tenants,id'],

            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => $this->passwordRules(),
            'terms'     => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',

        ])->validate();

        $tenant = Tenant::create([
            'uuid'  => Str::uuid(4),
            'name'  => $input['tenant']
        ]);

        return $tenant->users()->create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
