<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;
    protected $table = 'pelaporan';
    protected $fillable = [
        'unique_id',
        'nama_proyek',
        'nama_lokasi',
        'nama_company',
        'longitude',
        'latitude',
        'foto',
        'tgl_start',
        'tgl_end', 
    ];

    public function users()
{
    return $this->belongsTo(User::class);
}
}
