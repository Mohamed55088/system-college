<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = ['name', 'grade_id', 'class_room_id'];
    // protected $gaurded = [];
    public $translatable = ['name'];
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
    public function teachers()
    {
        return $this->belongsToMany(Teachers::class, 'teachers_sections');
    }
}