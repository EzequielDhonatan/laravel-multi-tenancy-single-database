<?php

namespace App\Models\Panel\Blog\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Scopes\Tenant\TenantScope;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'body', 'user_id', 'situation' ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope( new TenantScope );
    }

    public function user()
    {
        return $this->belongsTo( User::class );
    }

} // Post
