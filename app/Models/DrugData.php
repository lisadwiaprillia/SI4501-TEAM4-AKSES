<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugData extends Model
{
    use HasFactory;

    protected $table = 'drug_data';

    protected $fillable = ['data_name', 'data_desc', 'created_at', 'updated_at'];

    protected $primaryKey = 'data_id';

    protected $guarded = 'data_id';
}
