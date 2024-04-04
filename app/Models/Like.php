<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Like extends Model
{
    use HasFactory;

    protected $primaryKey = 'like_id';

    protected $fillable = [
        'total_like',
        'post_id',
        'user_id',
    ];

    protected $guarded = ['likes_id'];

    public function users()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_id', 'post_id');
    }
}
