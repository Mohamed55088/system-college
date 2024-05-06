<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Father extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $translatable = ['job_Father', 'name_Father'];

    protected $fillable = [

        'national_Id_Father',
        'passport_Id_Father',
        'name_Father',
        'address_Father',
        'job_Father',
        'phone_Father',
        'nationalities_Father_id',
        'religions_Father_id',
        'type_Bloods_Father_id',
    ];



    public function religion()
    {
        return $this->hasOne(Religion::class, 'id');
    }
    public function nationality()
    {
        return $this->hasOne(Nationality::class, 'id');
    }
    public function type_blood()
    {
        return $this->hasOne(Type_Blood::class, 'id');
    }
}