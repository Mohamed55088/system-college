<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religion extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name'];
    public function parent_father()
    {
        return $this->belongsTo(Parents::class, 'religions_Father_id');
    }
    public function parent_mother()
    {
        return $this->belongsTo(Parents::class, 'religions_Mother_id');
    }
}