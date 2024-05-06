<?php

namespace App\Http\Controllers\student;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Requests\Student;
use App\Http\Controllers\Controller;
use App\Interfaces\studentInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\student as ModelsStudent;

class StudentController extends Controller
{
    protected $student;

    public function __construct(studentInterface $student)
    {

        $this->student = $student;
    }

    public function index()
    {
        return $this->student->getStudent();
    }

    public function create()
    {
        return $this->student->create();
    }
    public function store(Student $req)
    {
        // return $req;

        return $this->student->storeStudent($req);
    }

    public function show(string $id)
    {
        //
    }

    public function edit($email)
    {
        return $this->student->editStudent($email);
    }

    public function update(Request $req)
    {
        return $this->student->updateStudent($req);
    }

    public function destroy(Request $req)
    {
        return $this->student->deleteStudent($req);
    }

    public function grade_student_id($id)
    {
        return $this->student->grade_student_id($id);
    }
    public function section_student_id($id)
    {
        return $this->student->section_student_id($id);
    }
}