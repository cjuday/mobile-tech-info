<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    use HasFactory;
    
    protected $table = 'battery';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;
    
    protected $fillable = ['product_id', 'type', 'charging', 'charging2', 'charging3', 'charging4', 'cont', 'wait'];
}
