<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transmitter extends Model
{
    use HasFactory;
    
    protected $table = 'transmitter';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id', 'input'];
}
