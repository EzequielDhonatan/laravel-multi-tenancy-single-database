<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [ 'name' ];

    public function users()
    {
        return $this->hasMany( User::class );
    }

} // Tenant
