<?php

namespace App\Http\Controllers;



use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGradeRequest;
use App\Models\ClassRoom;
use Exception;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('pages.grades', compact('grades'));
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
    public function store(StoreGradeRequest $req)
    {
        try {
            $validat = $req->validated();
            $grade = new Grade();
            Grade::create([
                'name' => [
                    'en' => $req->name_en,
                    'ar' => $req->name_ar,
                ]
                ,
                'note' => $req->note
            ]);
            // $grade->setTranslation('name', 'en', $req->name_en);
            // $grade->setTranslation('name', 'en', $req->name_ar);
            // $grade->note = $req->note;
            // $grade->save();
            emotify('success', trans('trans_grade.message_grade'));

            //toastr()->success('Data has been saved successfully!');

            return redirect()->route('grade.index');
        } catch (Exception $e) {
            emotify('error', $e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req)
    {
        try {
            $grade = Grade::findOrFail($req->id);
            $grade->update([
                $grade->name = [
                    'en' => $req->name_en,
                    'ar' => $req->name_ar
                ],
                $grade->note => $req->note
            ]);
            emotify('success', trans('trans_grade.message_grade_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            emotify('error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req)
    {
        try {
            Grade::destroy($req->id);
            emotify('success', trans('trans_grade.message_grade_delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            emotify('error', $e->getMessage());
            return redirect()->back();
        }
    }
}