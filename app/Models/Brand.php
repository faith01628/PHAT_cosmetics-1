<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    protected $table = 'Brands';
    protected $fillable = ['name', 'slug'];
    
    use SoftDeletes;
    use HasFactory;
}
