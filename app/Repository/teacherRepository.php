<?php
namespace App\Repository;

use App\Interfaces\teacherInterface;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teachers;


class teacherRepository implements teacherInterface
{
    public function getAllTeacher()
    {
        $teachers = Teachers::all();
        return view('pages.teacher.teacher', compact('teachers'));
    }
    public function create()
    {

        $gender = Gender::all();
        $special = Specialization::all();
        return view('pages.teacher.create', compact(['gender', 'special']));
    }
    public function insertTeacher($req)
    {
        try {
            Teachers::create([
                'name' => [
                    'ar' => $req->name_ar,
                    'en' => $req->name_en
                ],
                'password' => $req->password,
                'email' => $req->email,
                'joining_Date' => $req->joining_Date,
                'specializations_id' => $req->specialization_id,
                'genders_id' => $req->gender_id,
                'address' => $req->address,
            ]);

            return redirect()->route('teacher');
        } catch (\Exception $e) {
            // Handle the exception (e.g., log the error, display a friendly message, etc.)
            return redirect()->back()->with('error', 'Failed to create teacher: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $teacher = Teachers::find($id);
        $gender = Gender::all();
        $special = Specialization::all();
        return view('pages.teacher.edit', compact(['teacher', 'gender', 'special']));
    }

    public function updateTeacher($req)
    {
        try {
            $teacher = Teachers::find($req->id);
            $teacher->update([
                'name' => [
                    'ar' => $req->name_ar,
                    'en' => $req->name_en
                ],
                //'password' => $req->password,
                // 'email' => $req->email,
                'joining_Date' => $req->joining_Date,
                'specializations_id' => $req->specialization_id,
                'genders_id' => $req->Gender_id,
                'address' => $req->Address,
            ]);
            return redirect()->route('teacher');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create teacher: ' . $e->getMessage());
        }
    }
    public function deleteTeacher($id)
    {
        Teachers::findOrFail($id)->delete();
        return redirect()->route('teacher');
    }

}