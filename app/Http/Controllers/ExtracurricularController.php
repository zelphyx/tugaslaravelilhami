<?php

namespace App\Http\Controllers;

use App\Models\extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function utama(){
        return view('extracurricular',[
                "title" => "extracurricular",
                "extracurricular" => extracurricular::all()
            ]
        );
    }
}
