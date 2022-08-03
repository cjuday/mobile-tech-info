<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfieCamera extends Model
{
    use HasFactory;
    
    protected $table = 'self_camera';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id', 'cam_num', 'cam1', 'cam2', 'cam3', 'cam4', 'cam5', 'cam6', 'features', 'video'];
}
