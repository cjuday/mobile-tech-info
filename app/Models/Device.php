<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    
    protected $table = 'devices';

    protected $primary_key = 'id';
    
    protected $timestamp = true;

    protected $fillable = ['name','cat_id','brand_id','img','price','slug','metatitle','metades','metakey'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                    ->where('name', 'LIKE', '%'. $query . '%')
                    ->orWhere('price', 'LIKE', '%'. $query .'%');
            });
    }
}
