<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Mother extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $translatable = ['job_Mother', 'name_Mother'];
    protected $fillable = [
        'national_Id_Mother',
        'passport_Id_Mother',
        'name_Mother',
        'job_Mother',
        'address_Mother',
        'phone_mother',
        'nationalities_Mother_id',
        'religions_Mother_id',
        'type_Bloods_Mother_id'
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