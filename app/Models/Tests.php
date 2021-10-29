<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    use HasFactory;
    
    protected $table = 'tests';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id', 'perf1', 'perf2', 'perf3', 'perf4', 'perf5', 'display', 'cam', 'loud', 'batlife'];
}
