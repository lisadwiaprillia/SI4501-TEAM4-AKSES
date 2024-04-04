<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Institution extends Model
{
    use HasFactory;

    protected $primaryKey = 'institution_id';

    protected $fillable = [
        'institution_name ',
        'institution_phone ',
        'institution_address',
        'institution_chairman',
        'institution_status',
        'institution_evidence',
    ];

    protected $guarded = ['institution_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
