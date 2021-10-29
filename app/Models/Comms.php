<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comms extends Model
{
    use HasFactory;
    
    protected $table = 'comms';

    protected $primaryKey = 'product_id';
    
    protected $timestamp = true;

    protected $fillable = ['product_id', 'wlan', 'bluetooth', 'gps', 'nfc', 'radio', 'usb'];
}
