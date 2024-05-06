<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class student extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $translatable = ['name'];
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'birth_date',
        'academic_year',
        'sections_id',
        'genders_id',
        'grades_id',
        'parents_id',
        'nationalities_id',
        'class_rooms_id',
        'religions_id',
        'type_bloods_id',
    ];
    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religions_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'sections_id');
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationalities_id');
    }
    public function type_blood()
    {
        return $this->belongsTo(Type_Blood::class, 'type__bloods_id');
    }
    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class, 'class_rooms_id');
    }
    public function parent()
    {
        return $this->belongsTo(Parents::class, 'parents_id');
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'genders_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grades_id');
    }
    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}