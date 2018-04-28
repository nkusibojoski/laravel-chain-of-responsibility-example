<?php
/**
 * Created by PhpStorm.
 * User: nikolakusibojovski
 * Date: 4/3/18
 * Time: 2:35 PM
 */

namespace App\Helpers;


use Illuminate\Http\Request;

abstract class FileUploader
{
    protected $successor;

    public abstract function create(Request $request);

    /**
     * @param mixed $successor
     */
    public function setSuccessor(FileUploader $successor)
    {
        $this->successor = $successor;
    }

    public function next(Request $request){
        if($this->successor){
            $this->successor->create($request);
        }
    }

}