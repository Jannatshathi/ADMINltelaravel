<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'details'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\BlogFactory::new();
    }
}
