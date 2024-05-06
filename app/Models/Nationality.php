<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nationality extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name'];
    public function parent_father()
    {
        return $this->belongsTo(Parents::class, 'nationalities_Father_id');
    }
    public function parent_mother()
    {
        return $this->belongsTo(Parents::class, 'nationalities_Mother_id');
    }
}