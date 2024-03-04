<?php

namespace App\Models;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = ["key", "name", "url"];
}
