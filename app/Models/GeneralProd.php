<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralProd extends Model
{
    use HasFactory;
    
    protected $table = 'genproduct';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id', 'type', 'unit', 'magnet', 'diaphragm', 'fr', 'fra', 'frb', 'sense', 'cord', 'length', 'plug', 'style', 'nfc', 'dsee', 'passive'];
}
