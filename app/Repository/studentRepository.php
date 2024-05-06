<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Parents;

use App\Models\Section;
use App\Models\student;
use App\Models\Religion;
use App\Models\ClassRoom;
use App\Models\Type_Blood;
use App\Models\Nationality;
use Illuminate\Support\Facades\DB;
use App\Interfaces\studentInterface;
use Illuminate\Support\Facades\Hash;

class studentRepository implements studentInterface
{
    public function getStudent()
    {
        $students = student::all();
        return view('pages.student.student', compact('students'));
    }
    public function create()
    {
        $data['genders'] = Gender::all();
        $data['grades'] = Grade::all();
        $data['parents'] = Parents::all();
        $data['classRooms'] = ClassRoom::all();
        $data['sections'] = Section::all();
        $data['reliogions'] = Religion::all();
        $data['typeBloods'] = Type_Blood::all();
        $data['nationalities'] = Nationality::all();

        return view('pages.student.add', compact('data'));
    }

    public function storeStudent($req)
    {
        DB::beginTransaction();
        try {
            $students = new student();
            $students->name = [
                'en' => $req->name_en,
                // English name
                'ar' => $req->name_ar, // Arabic name
            ];
            $students->email = $req->email;
            $students->password = Hash::make($req->password);
            $students->birth_date = $req->birth_date;
            $students->acadmic_year = $req->academic_year;
            $students->sections_id = $req->section_id;
            $students->genders_id = $req->gender_id;
            $students->grades_id = $req->grade_id;
            $students->parents_id = $req->parent_id;
            $students->nationalities_id = $req->nationalitie_id;
            $students->class_rooms_id = $req->Classroom_id;
            $students->religions_id = $req->reliogions;
            $students->type__bloods_id = $req->blood_id;
            $students->save();

            if ($req->hasfile('photos')) {
                foreach ($req->file('photos') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/' . $students->name, $file->getClientOriginalName(), 'upload_attachments');

                    // insert in image_table
                    $images = new \App\Models\Image();
                    $images->url = $name;
                    $images->image_id = $students->id;
                    $images->image_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data

            return redirect()->route('student.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function grade_student_id($id)
    {
        return ClassRoom::where('grades_id', $id)->pluck('nameRoom', 'id');
    }
    public function section_student_id($id)
    {
        return Section::where('class_room_id', $id)->pluck('name', 'id');
    }

    public function editStudent($email)
    {
        $data['genders'] = Gender::all();
        $data['grades'] = Grade::all();
        $data['parents'] = Parents::all();
        $data['classRooms'] = ClassRoom::all();
        $data['sections'] = Section::all();
        $data['reliogions'] = Religion::all();
        $data['typeBloods'] = Type_Blood::all();
        $data['nationalities'] = Nationality::all();
        $student = \App\Models\student::where('email', $email)->first();
        return view('pages.student.edit', ['student' => $student, 'data' => $data]);
    }
    public function updateStudent($req)
    {


        $students = student::findOrFail($req->id_student);
        $students->update([
            'name' => [
                'en' => $req->name_en,
                // English name
                'ar' => $req->name_ar,
                // Arabic name
            ],
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'birth_date' => $req->birth_date,
            'acadmic_year' => $req->academic_year,
            'sections_id' => $req->section_id,
            'genders_id' => $req->gender_id,
            'grades_id' => $req->grade_id,
            'parents_id' => $req->parent_id,
            'nationalities_id' => $req->nationalitie_id,
            'class_rooms_id' => $req->Classroom_id,
            'religions_id' => $req->reliogions,
            'type__bloods_id' => $req->blood_id
        ]);
        $students->save();
        return redirect()->route('student.index');
    }
    public function deleteStudent($req)
    {
        student::findOrFail($req->id)->delete();
        return redirect()->back();
    }

}