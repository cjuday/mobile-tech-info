<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    protected $table_name = "videos";

    protected $primary_key = "id";

    protected $timestamp = true;

    protected $fillable = ['link','video_id'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                    ->where('id', 'LIKE', '%'. $query . '%')
                    ->orWhere('link', 'LIKE', '%'. $query . '%');
            });
    }
}
