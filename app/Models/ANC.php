<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ANC extends Model
{
    use HasFactory;
    
    protected $table = 'anc';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id', 'switch', 'ncopt', 'atm', 'ambs', 'qatt'];
}
