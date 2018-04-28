<?php


namespace App\Helpers;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class File extends FileUploader
{
    public function create(Request $request)
    {
        $file = $request->file('file');

        try {
            DB::beginTransaction();
            if ($file != null) {
                $fileOriginalName = $file->getClientOriginalName();
                $fileOriginalExt = $file->getClientOriginalExtension();
                $fileNameInSeconds = time();
                $file->move(storage_path() . "/files/", $fileNameInSeconds . "." . $fileOriginalExt);
                $savedFile = App\File::create(["fileName" => $fileOriginalName, "fileUniqueName" => $fileNameInSeconds . "." . $fileOriginalExt, 'path' => "/files/"]);
                $request->request->add(['fileId' => $savedFile->id]);
            }
        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            throw new \Exception("Something is wrong with file. Aborting!!!");
        }
        $this->next($request);
    }
}