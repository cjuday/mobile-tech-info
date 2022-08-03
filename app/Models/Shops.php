<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;
    
    protected $table = 'shop_det';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = [ 'product_id', 'var1', 'shop11_prc', 'shop11_img', 'shop12_prc', 'shop12_img', 'var2', 'shop21_prc', 'shop21_img', 'shop22_prc', 'shop22_img', 'var3', 'shop31_prc', 'shop31_img', 'shop32_prc', 'shop32_img', 'var4', 'shop41_prc', 'shop41_img', 'shop42_prc', 'shop42_img','shop11_lnk', 'shop12_lnk', 'shop21_lnk', 'shop22_lnk', 'shop31_lnk', 'shop32_lnk', 'shop41_lnk', 'shop42_lnk'];
}
