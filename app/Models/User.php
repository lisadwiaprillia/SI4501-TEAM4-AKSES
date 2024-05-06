<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Institution;
use App\Models\Role;
use App\Models\Like;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    protected $guarded = ['user_id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_email',
        'user_phone',
        'user_address',
        'user_password',
        'user_status',
        'user_evidence',
        'role_id',
        'institution_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function institution()
    {
        return $this->hasMany(Institution::class, 'institution_id', 'institution_id');
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'role_id', 'role_id');
    }

    public function likes()
    {
        return $this->belongsToMany(Like::class);
    }
}
