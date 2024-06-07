<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DrugClass extends Model
{
    use HasFactory;

    protected $table = 'drug_classes';

    protected $fillable = ['class_name', 'class_desc', 'created_at', 'updated_at'];

    protected $primaryKey = 'class_id';

    protected $guarded = 'class_id';
}
