<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Like;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_id';

    protected $fillable = [
        'post_title',
        'post_slug',
        'post_body',
        'user_id',
        'category_id',
    ];

    protected $guarded = ['post_id'];

    public function likes()
    {
        return $this->belongsTo(Like::class);
    }

    public function categories()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
