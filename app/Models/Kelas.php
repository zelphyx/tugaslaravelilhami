<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{


    public function students(){
        return $this->hasMany(Student::class);
    }

    protected $table = 'kelas';

    use HasFactory;
    protected $fillable = [
        'Nama',
        'created_at',
        'updated_at'
    ];
}
