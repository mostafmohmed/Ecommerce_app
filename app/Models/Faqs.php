<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Faqs extends Model
{
    use HasTranslations ,HasFactory;
    protected $guarded = [];
    protected $translatable =['question','answer']; 
}
