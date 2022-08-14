<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    protected $table = 'Menus';
    protected $fillable = ['name', 'parent_id', 'slug'];
    
    use SoftDeletes;
    use HasFactory;
}
