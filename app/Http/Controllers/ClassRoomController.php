<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Grade;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Parents;
use App\Models\Teachers;
use App\Models\ClassRoom;
use App\Models\Nationality;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        $classes = ClassRoom::all();
        return view('pages.class', compact(['grades', 'classes']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req = $req->List_Classes;
        try {
            foreach ($req as $req) {
                ClassRoom::create([
                    'nameRoom' => [
                        'ar' => $req['name_ar'],
                        'en' => $req['name_en'],

                    ],
                    'grades_id' => $req['grade_id']

                ]);
            }

            emotify('success', trans('trans_grade.message_grade'));
            return redirect()->back();
        } catch (Exception $e) {
            emotify('error', $e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req)
    {
        try {

            $class = ClassRoom::find($req->id);
            $class->update([
                'nameRoom' => [
                    'ar' => $req->name_ar,
                    'en' => $req->name_en,
                ],
                'grades_id' => $req->grade_id
            ]);
            emotify('success', trans('kkkkkkkk'));
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
        $del = ClassRoom::find($req->id)->delete();
        emotify('error', trans('classes.delete_class'));
        return redirect()->back();
    }
    public function delete_all(Request $req)
    {
        $req = $req->delete_all_id;
        $req = explode(',', $req);
        ClassRoom::whereIn('id', $req)->delete();
        emotify('error', trans('classes.delete_all'));
        return redirect()->back();
    }
    public function filter(Request $req)
    {
        $grades = Grade::all();
        $details = ClassRoom::where('grades_id', $req->Grade_id)->get();
        return view('pages.class', compact(['grades', 'details']));
    }

    public function test()
    {
        $m_id = Teachers::find(1)->genders;


        return $m_id;
        // return $m_id->father->name_Father;
    }

}