<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    protected $table = 'log';
    protected $fillable = [
        'nama_logger',
        'aktivitas',
        'tgl_aktivitas',
        'data_terupdate',
        'device_name',
        'ip_address',
    ];
}

