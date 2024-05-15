<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';
    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'category_desc'
    ];

    protected $guarded = ['category_id'];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
