<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'category';

    protected $primary_key = 'id';
    
    protected $timestamp = true;

    protected $fillable = ['name','img_src', 'arrival', 'upcoming'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                    ->where('name', 'LIKE', '%'. $query . '%');
            });
    }
}
