<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Illuminate\Support\Str;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [ 'name' ];

    public static function boot()
    {
        parent::boot();

        self::creating( function( $model ) {

            $model->uuid = ( string ) Str::uuid(4);

        });
    } // boot

    public function users()
    {
        return $this->hasMany( User::class );
    }

} // Tenant
