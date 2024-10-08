<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'description',
        'icon',
    ];
    public function products()
    {
        return $this->hasMany(Products::class,'category_id');
    }
}
