<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;
    
    protected $table = 'emails';

    protected $primaryKey = 'id';
    
    protected $timestamp = true;

    protected $fillable = ['name', 'email', 'phone', 'subject', 'msg', 'mail_read'];
    
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                    ->where('name', 'LIKE', '%'. $query . '%')
                    ->orWhere('email', 'LIKE', '%'. $query .'%')
                    ->orWhere('phone', 'LIKE', '%'. $query .'%')
                    ->orWhere('subject', 'LIKE', '%'. $query .'%');
            });
    }
}
