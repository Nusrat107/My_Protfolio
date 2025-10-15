<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protfolio extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'category',
        'tools',
        'description',
        'live_link',
        'github_link',
        'image',
    ];
}
