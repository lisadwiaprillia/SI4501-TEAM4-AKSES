<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drug;

class DrugPresentation extends Model
{
    use HasFactory;

    protected $primaryKey = 'presentation_id';
    protected $table = 'drug_presentations';
    protected $fillable = [
        'form',
        'packaging_and_price',
    ];

    protected $guarded = 'presentation_id';


    public function drug()
    {
        return $this->hasMany(Drug::class, 'presentation_id', 'presentation_id');
    }
}
