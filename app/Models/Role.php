<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Role extends Model
{
    use HasFactory;


    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_name',
        'role_desc'
    ];

    protected $guarded = ['role_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
