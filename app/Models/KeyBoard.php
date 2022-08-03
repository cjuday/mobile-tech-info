<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyBoard extends Model
{
    use HasFactory;
    
    protected $table = 'keyboard';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id', 'det1', 'det2', 'det3', 'det4', 'det5', 'det6', 'det7', 'det8'];
}
