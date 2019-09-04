<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Webpatser\Uuid\Uuid;

class Tenant extends Model
{
    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
