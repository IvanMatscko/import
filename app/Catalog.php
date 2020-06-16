<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['id', 'heading', 'fabricator', 'created_at', 'updated_at'];
}
