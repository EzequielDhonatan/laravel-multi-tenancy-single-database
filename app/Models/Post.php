<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Scopes\Tenant\TenantScope;
use App\Observers\Tenant\TenantObserver;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'body'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope);

        static::observe(new TenantObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
