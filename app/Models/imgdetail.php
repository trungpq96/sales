<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imgdetail extends Model
{
    use HasFactory;
    protected $table="tb_img_detail";

    protected $fillable = [
        'img_detail'
    ];
  
    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setFilenamesAttribute($value)
    {
        $this->attributes['img_detail'] = json_encode($value);
    }
}
