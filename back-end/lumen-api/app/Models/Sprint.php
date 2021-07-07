<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $table = "sprints";
    protected $fillable = ["sprint_name","sprint_date"];
    protected $primaryKey = 'sprint_id';

}
