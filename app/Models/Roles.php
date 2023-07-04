<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'id_roles',
        'pinpoint_id',
        'nama_company',
        'nama_pemilik',
        'email',
        'password',
        'image_users',
        'rekening',
        'alamat',
        'status',
    ];
}
