<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model 
{ 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'country',
        'gender'
    ];

    /**para ocultar campos
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *//*
    protected $hidden = [
        'password',
    ];*/
}
