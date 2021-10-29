<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table_name = "news";

    protected $primary_key = "id";

    protected $timestamp = true;

    protected $fillable = ['title','description','meta_title','meta_des','meta_key','preview_img', 'post_date'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                    ->where('name', 'LIKE', '%'. $query . '%')
                    ->orWhere('meta_title', 'LIKE', '%'. $query . '%')
                    ->orWhere('meta_des', 'LIKE', '%' . $query . '%')
                    ->orWhere('meta_key', 'LIKE', '%' . $query . '%')
                    ->orWhere('post_date', 'LIKE', '%' . $query . '%');
            });
    }
}
