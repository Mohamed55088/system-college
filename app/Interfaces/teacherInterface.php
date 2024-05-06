<?php

namespace App\Interfaces;




interface teacherInterface
{
    public function getAllTeacher();
    public function insertTeacher($req);
    public function updateTeacher($req);
    public function deleteTeacher($id);
    public function create();
    public function edit($id);

}