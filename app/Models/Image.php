<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'image_id', 'image_type'];
    public function imageable()
    {
        return $this->morphTo();
    }
}