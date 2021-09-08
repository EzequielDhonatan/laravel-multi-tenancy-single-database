<?php

namespace App\Models\Panel\Blog\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Tenant\Traits\TraitTenant;
use App\Models\User;

class Post extends Model
{
    use HasFactory, TraitTenant;

    protected $fillable = [ 'user_id', 'title', 'url', 'body', 'situation' ];

    public function user()
    {
        return $this->belongsTo( User::class );
    }

} // Post
