<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DrugRegulatory extends Model
{
    use HasFactory;

    protected $table = 'drug_regulatories';
    
    protected $primaryKey = 'regulatory_id';

    protected $fillable = [
        'regulatory_name',
        'regulatory_desc'
    ];

    protected $guarded = ['regulatory_id'];

    public function post()
    {
        return $this->hasMany(Drug::class);
    }
    
    public function drug(): HasMany
    {
        return $this->hasMany(Drug::class, 'regulatory_id', 'regulatory_id');
    }
}
