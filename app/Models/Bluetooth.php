<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bluetooth extends Model
{
    use HasFactory;
    
    protected $table = 'bluetooth';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id', 'version', 'erange', 'frange', 'profile', 'formats', 'prot'];
}
