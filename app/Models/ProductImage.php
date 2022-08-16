<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'Product_images';
    protected $fillable = ['image_path', 'product_id', 'image_name'];
    
    use HasFactory;
}
