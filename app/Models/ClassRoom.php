<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory;
    protected $fillable = ['nameRoom', 'grades_id'];

    //protected $guarded = [];

    use HasTranslations;

    public $translatable = ['nameRoom'];
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grades_id');
    }
    public function section()
    {
        return $this->hasMany(Section::class, 'class_room_id');
    }
}