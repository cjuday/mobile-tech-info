<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Brand extends Model
{
    use HasFactory;
    
    protected $table = 'brands';

    protected $primary_key = 'id';
  
    protected $timestamp = true;

    protected $fillable = ['name','cat_id','img'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                    ->where('name', 'LIKE', '%'. $query . '%');
            });
    }
}
