<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Tenant\Traits\TenantTrait;

class Post extends Model
{
    use TenantTrait;

    protected $fillable = ['user_id', 'title', 'body', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
