<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTop extends Model
{
    use HasFactory;
    
    protected $table = 'phone_show';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id','status','prc1', 'prc2', 'status2', 'prc3', 'prc4', 'disp_size', 'disp_res', 'cam_size', 'cam_res', 'ram_size', 'ram_type', 'bat_size', 'bat_type'];
}
