<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
 
    protected $fillable = [
        'dept_name', 'dept_description' , 'status'
    ];
}
