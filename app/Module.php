<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $fillable = ['course_id', 'module_name', 'module_slug','module_content', 'module_image'];
}
