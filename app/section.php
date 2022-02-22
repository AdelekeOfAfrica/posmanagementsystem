<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    
    //
    protected $table = 'sections';
    protected $fillable = ['section_name','status'];
}
