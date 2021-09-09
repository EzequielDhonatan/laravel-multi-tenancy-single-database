<?php

namespace App\Models\Panel\Blog\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Tenant\Traits\TraitTenant;

use App\Models\User;

class Post extends Model
{
    use HasFactory;
    use TraitTenant;

    protected $fillable = [ 'user_id', 'image', 'title', 'url', 'body', 'situation' ];

    public function search( $filter = null )
    {
        $results = $this->where( 'title', 'LIKE', "%{$filter}%" )
                        ->orWhere( 'body', 'LIKE', "%{$filter}%" )
                        ->latest()
                        ->paginate();

        return $results;

    } // search

    public function user()
    {
        return $this->belongsTo( User::class );
    }

} // Post
