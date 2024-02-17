<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class extracurricular
{
    private static $extracurricular = [
        [
            "id" => 1,
            "nama" => "Tari",
            "nama_pembina" => "Zidni",
            "deskripsi" => "Ekstarkulikuler tentang seni Tari"
        ],[
            "id" => 2,
            "nama" => "Pramuka",
            "nama_pembina" => "Fikri",
            "deskripsi" => "Ekstrakulikuler tentang Pramuka"
        ],[
            "id" => 3,
            "nama" => "Esport",
            "nama_pembina" => "As-Sidqi",
            "deskripsi" => "Ekstrakulikuler tentang Esport"
        ],[
            "id" => 4,
            "nama" => "Fotografi",
            "nama_pembina" => "Filemon",
            "deskripsi" => "Ekstarkulikuler tentang Fotografi"
        ],[
            "id" => 5,
            "nama" => "Teater",
            "nama_pembina" => "Solomon",
            "deskripsi" => "Ekstrakurikuler tentang Teater"
        ],
    ];
    public static function all(){
        return self::$extracurricular;
    }

}
