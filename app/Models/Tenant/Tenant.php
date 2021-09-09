<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use App\Models\User;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [ 'name' ];

    public static function boot()
    {
        parent::boot();

        self::creating( function( $model ) {
            $model->uuid = $model->uuid = ( string ) Str::uuid();
        });
    } //

    public function users()
    {
        return $this->hasMany( User::class );
    }

} // Tenant
