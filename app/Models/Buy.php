<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;
    
    protected $table = 'buynow';

    protected $primary_key = 'id';
  
    protected $timestamp = true;

    protected $fillable = ['title','img','spec_link','des','shop_link','ram','shop_img','price'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                    ->where('title', 'LIKE', '%'. $query . '%')
                    ->orWhere('des', 'LIKE', '%'. $query . '%');
            });
    }
}
