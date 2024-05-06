<?php
namespace App\Interfaces;

interface studentInterface
{
    public function getStudent();
    public function create();
    public function storeStudent($req);
    public function grade_student_id($id);
    public function section_student_id($id);
    public function updateStudent($req);

    public function editStudent($req);
    public function deleteStudent($req);




}