<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type_Blood extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function parent_father()
    {
        return $this->belongsTo(Parents::class, 'type_Bloods_Mother_id');
    }
    public function parent_mother()
    {
        return $this->belongsTo(Parents::class, 'type_Bloods_Father_id');
    }
}