<?php

namespace App\Models\Panel\Blog\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'body', 'user_id', 'situation' ];

    public function user()
    {
        return $this->belongsTo( User::class );
    }

} // Post
