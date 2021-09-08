<?php

namespace App\Models\Panel\Blog\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Scopes\Tenant\TenantScope;
use App\Observers\Tenant\TenantObserver;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'title', 'url', 'body', 'situation' ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope( new TenantScope );

        static::observe( new TenantObserver );
    }

    public function user()
    {
        return $this->belongsTo( User::class );
    }

} // Post
