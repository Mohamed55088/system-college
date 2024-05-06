<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teachers extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $translatable = ['name'];
    protected $fillable = ['name', 'password', 'email', 'joining_Date', 'specializations_id', 'genders_id', 'address'];


    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specializations_id');
    }

    public function genders()
    {
        return $this->belongsTo(Gender::class, 'genders_id');
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'teachers_sections');
    }

}