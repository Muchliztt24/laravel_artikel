<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $fillable = ['id','jenis'];
    public $timestamp = true;

    //relasi
    public function jenis () 
    {
        return $this->hasMany(Jenis::class);
    }
}
