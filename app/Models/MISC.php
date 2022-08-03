<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MISC extends Model
{
    use HasFactory;
    
    protected $table = 'misc';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id', 'color', 'models'];
}
