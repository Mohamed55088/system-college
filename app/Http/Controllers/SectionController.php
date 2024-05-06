<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teachers;
use Exception;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grade = Grade::all();
        $grade1 = Grade::all();
        $section = Section::all();
        $teachers = Teachers::all();
        //$section = Section::find(1);
        $classRoom = ClassRoom::all();
        return view('pages.section', compact(['grade', 'grade1', 'section', 'classRoom', 'teachers']));
        // return $section->classRoom->nameRoom;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function gradeId($req)
    {
        $grade = Grade::find($req)->classroom->pluck('nameRoom', 'id');
        return $grade;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        // Section::create([
        //     'name' => [
        //         'ar' => $req->name_section_ar,
        //         'en' => $req->name_section_en
        //     ],
        //     'grade_id' => $req->grade_id,
        //     'class_room_id' => $req->class_id
        // ]);
        $sr = new Section();
        $sr->name = ['ar' => $req->name_section_ar, 'en' => $req->name_section_en];
        $sr->grade_id = $req->grade_id;
        $sr->class_room_id = $req->class_id;
        $sr->save();
        $sr->teachers()->attach($req->teacher_id);

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req)
    {
        try {

            $section = Section::find($req->id);
            if (isset($req->status)) {
                $section->status = 1;
            } else {
                $section->status = 2;
            }
            $section->update([
                'name' => [
                    'ar' => $req->name_section_ar,
                    'en' => $req->name_section_en
                ],
                'grade_id' => $req->grade_id,
                'class_room_id' => $req->class_id
            ]);
            if (isset($req->teacher_id)) {
                $section->teachers()->sync($req->teacher_id);
            } else {

            }

            emotify('success', trans('trans_grade.message_grade_update'));
            return redirect()->back();
        } catch (Exception $e) {
            emotify('error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req)
    {
        return $req;
    }
}