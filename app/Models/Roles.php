<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function users()
{
    return $this->hasMany(User::class);
}



}
