<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tenant extends Model
{
    protected $fillable = [

        'name', 'logo'

    ];

    public function users ()
    {
        return $this->hasMany(User::class);
    }
}
