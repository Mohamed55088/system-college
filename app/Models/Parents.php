<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Parents extends Model
{
    use HasFactory;

    protected $fillable = [
        'password',
        'email',
        'fathers_id',
        'mothers_id'
    ];

    public function father()
    {
        return $this->hasOne(Father::class, 'id');
    }
    public function mother()
    {
        return $this->hasOne(Mother::class, 'id');
    }

}