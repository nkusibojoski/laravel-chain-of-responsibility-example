<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Field extends Model
{


    protected $table = "fields";
    public  $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fieldName', 'fieldValue', 'documentId'
    ];

}
