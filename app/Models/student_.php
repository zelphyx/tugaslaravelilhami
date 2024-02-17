<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentz
{
    private static $students = [
        [
            "id" => 1,
            "NIS" => 12345,
            "nama" => "Wayangseno",
            "kelas" => "11 PPLG 1",
            "alamat" => "Rumah Teater Kudus"
        ],[
            "id" => 2,
            "NIS" => 6789,
            "nama" => "Rafi Haiqal",
            "kelas" => "11 PPLG 1",
            "alamat" => "Pondok Al-Fatiq"
        ],[
            "id" => 3,
            "NIS" => 12415,
            "nama" => "Acaryanandana",
            "kelas" => "11 PPLG 1",
            "alamat" => "Berongkost 2"
        ],[
            "id" => 4,
            "NIS" => 1661532,
            "nama" => "Khaisar",
            "kelas" => "11 PPLG 1",
            "alamat" => "Pondok Al-Fatiq"
        ],[
            "id" => 5,
            "NIS" => 125124,
            "nama" => "Aufa najid",
            "kelas" => "11 PPLG 1",
            "alamat" => "Purwosari"
        ],
    ];

    public static function all(){
        return self::$students;
    }
}
