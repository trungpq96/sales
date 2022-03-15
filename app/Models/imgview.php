<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imgview extends Model
{
    use HasFactory;
    protected $table="tb_img_view";

    protected $fillable = [
        'img_view'
    ];
  
    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setFilenamesAttribute($value)
    {
        $this->attributes['img_view'] = json_encode($value);
    }
}
