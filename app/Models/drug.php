<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DrugPresentation;

class Drug extends Model
{
    use HasFactory;

    protected $primaryKey = 'drug_id';

    protected $guarded = 'drug_id';

    protected $fillable = [
        'drug_name',
        'contents',
        'indications',
        'dosage',
        'contraindication',
        'special_precautions',
        'drug_interaction',
        'adverse_reactions',
        'atc_classification',
        'presentation_id',
        'class_id',
        'regulatory_id',
    ];
}
