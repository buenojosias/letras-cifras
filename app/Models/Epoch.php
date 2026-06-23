<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Epoch extends Model
{
    protected $fillable = ['name', 'type', 'priority_level'];
}
