<?php

namespace App\Observers\Panel\Blog\Post;

use App\Models\Panel\Blog\Post\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "creating" event.
     *
     * @param  \App\Models\Panel\Blog\Post\Post  $post
     * @return void
     */
    public function creating( Post $post )
    {
        $post->uuid = Str::uuid(4);
        $post->url  = Str::kebab( $post->title );
    }

    /**
     * Handle the Post "updating" event.
     *
     * @param  \App\Models\Panel\Blog\Post\Post  $post
     * @return void
     */
    public function updating( Post $post )
    {
        $post->url = Str::kebab( $post->title );
    }

} // PostObserver
