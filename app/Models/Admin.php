<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    
    protected $table = 'admin';

    protected $primaryKey = 'id';
    
    protected $fillable = ['name','email','password'];
    
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                    ->where('name', 'LIKE', '%'. $query . '%')
                    ->orWhere('email', 'LIKE', '%'. $query . '%');
            });
    }
}
