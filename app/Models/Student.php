<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function kelasaaaaaaaaaaaaaaaa(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    use HasFactory;

    protected $fillable = [
        'NIS',
        'Nama',
        'id_kelas',
        'alamat',
        'tgl_lahir',
        'created_at',
        'updated_at'
    ];
}
