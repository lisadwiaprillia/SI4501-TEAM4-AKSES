<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DrugPresentation;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function drug_class(): BelongsTo
    {
        return $this->belongsTo(DrugClass::class, 'class_id', 'class_id');
    }

    public function drug_regulatory()
    {
        return $this->belongsTo(DrugRegulatory::class, 'regulatory_id', 'regulatory_id');
    }

    public function drug_presentation()
    {
        return $this->belongsTo(DrugPresentation::class, 'presentation_id', 'presentation_id');
    }
}
