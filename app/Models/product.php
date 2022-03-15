<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table="tb_product";

    protected $fillable = [
        'name_prd',
        'image_prd',
        'prd_type_id',
        'price',
        'price_sale',
        'status'
   ];

}
