<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'currency', 'd_image_path'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
