<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardStudentController extends Controller
{
    public function index(){
        $students = Student::latest();

        if(request('search')) {
            $searchTerm = request('search');
            $students->where(function($query) use ($searchTerm) {
                $query->where('NIS', 'like', '%' . $searchTerm . '%')
                    ->orWhere('Nama', 'like', '%' . $searchTerm . '%');
            });
        }

        return view('/dashboard/student/all', [
            "title" => "Student",
            "student" => $students->paginate(10),
            "kelas" => Kelas::all()
        ]);
    }
    public function show($student){
        return view('student/detail',[
                "title" => "Detail Student",
                "student" => Student::find($student)
            ]
        );
    }
    public function create(){
        return view('student/create', [
            "title" => "Tambah Data Siswa",
            "kelas" => Kelas::all()
        ]);
    }
    public  function store(Request $req){
        $validatedata = $req -> validate(
            [
                'NIS' => 'required',
                'Nama' => 'required',
                'id_kelas' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
            ]
        );

        $result = Student::create($validatedata);
        if ($result){
            return redirect()->route('student.all')->with('success','Data Siswa berhasil Ditambah!');
        }

    }

    public function destroy(Student $student){
        $result = $student->delete();

        if($result){
            return redirect()->route('student.all')->with('worked','Data Siswa berhasil Dihapus!');
        }
    }
    public function edit($id){
        return view('student/edit',[
            "title" => "Ubah Data Siswa",
            "student" => Student::findOrFail($id),
            "kelas" => Kelas::all()


        ]);
    }
    public function update(Request $req, $id){
        $validatedata = $req -> validate(
            [
                'NIS' => 'required',
                'Nama' => 'required',
                'id_kelas' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
            ]
        );
        $student = Student::findOrFail($id);

        // Update the student model with the validated data
        $student->update($validatedata);
        return redirect()->route('student.all')->with('updated', 'Data Siswa berhasil diperbarui!');
    }

    public function filter($id_kelas)
    {
        $result = Student::where('id_kelas', $id_kelas)->paginate(10);

        return view('dashboard.student.all', [
            "title" => "Students",
            "student" => $result,
            "kelas" => Kelas::all()
        ]);
    }
}
