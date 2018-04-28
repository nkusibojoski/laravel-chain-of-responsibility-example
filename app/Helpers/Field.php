<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Field extends  FileUploader {

    public  function create(Request $request)
    {
        $data = $request->all();
        $fields = $data['fields'];

        try {
            foreach ($fields as &$field){
                $field['documentId'] = $data['documentId'];
                \App\Field::create($field);
            }
            DB::commit();
        }catch (ModelNotFoundException $exception){
            DB::rollBack();
            throw new \Exception("Something is wrong with fields. Aborting!!!");
        }
    }
}