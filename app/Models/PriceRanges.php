<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceRanges extends Model
{
    use HasFactory;

    protected $table_name = "price_ranges";

    protected $primary_key = "id";

    protected $timestamp = true;

    protected $fillable = ['value','lower','upper'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                    ->where('value', 'LIKE', '%'. $query . '%')
                    ->orWhere('lower', 'LIKE', '%'. $query . '%')
                    ->orWhere('upper', 'LIKE', '%' . $query . '%');
            });
    }
}
