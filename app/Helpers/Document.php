<?php


namespace App\Helpers;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class Document extends FileUploader
{
    public function create(Request $request)
    {
        $data = $request->all();

        try {
            $document = App\Document::create($data);
            $request->request->add(['documentId' => $document->id]);
        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            throw new \Exception("Something is wrong with document. Aborting!!!");
        }
        $this->next($request);
    }

}