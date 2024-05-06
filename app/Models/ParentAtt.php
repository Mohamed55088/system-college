<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAtt extends Model
{
    use HasFactory;
    protected $fillable = ['name_photo', 'parents_id'];
}