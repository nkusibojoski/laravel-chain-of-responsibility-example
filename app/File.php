<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $table = "files";
    public  $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fileName', 'fileUniqueName', 'path'
    ];

}
