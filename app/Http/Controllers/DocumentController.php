<?php

namespace App\Http\Controllers;

use App\Helpers\Document;
use App\Helpers\Field;
use App\Helpers\File;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(Request $request){

        $document = new Document();
        $field = new Field();
        $file = new File();

        $file->setSuccessor($document);
        $document->setSuccessor($field);

        try{
            $file->create($request);
            return "Successfully created document with fields and file";
        }catch (\Exception $exception){
            throw new \Exception("Not able to create a document");
        }
    }
}
