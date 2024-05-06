<?php

namespace App\Http\Controllers\teachers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher;
use App\Interfaces\teacherInterface;

class TeachersController extends Controller
{

    protected $teachers;
    public function __construct(teacherInterface $teachers)
    {
        $this->teachers = $teachers;
    }
    public function index()
    {
        return $this->teachers->getAllTeacher();
    }

    public function create()
    {
        return $this->teachers->create();
    }

    public function store(Teacher $req)
    {
        return $this->teachers->insertTeacher($req);
    }
    public function show()
    {
        //
    }

    public function edit($id)
    {

        return $this->teachers->edit($id);
    }

    public function update(Request $req)
    {
        return $this->teachers->updateTeacher($req);
    }
    public function destroy(Request $req)
    {
        return $this->teachers->deleteTeacher($req->id);
    }
}