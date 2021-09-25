<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use App\Traits\FileTrait;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class FileController extends Controller
{
    use FileTrait;
    /**
     * Display a listing of the files.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return File::all();
    }

    /**
     * Store a newly created file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        
        $fileName=$this->storeFile($request->file);

        if($fileName) {
            return File::create([
                'title' => $request->title,
                'file_link' => $fileName
            ]);
        }
        
        return null;
    }

    /**
     * Display the specified file.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return File::find($id);
    }


    /**
     * Update the specified file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  FileRequest  $request
     * @param  File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request, File $file )
    {
        
        if($request->file){ 

            // if there is a new file
            $fileName=$this->storeFile($request->file);

            if($fileName) {
                $file->update([
                    'title' => $request->title,
                    'file_link' => $fileName
                ]);

                return response()->json($file, 200);
            }

        }else{
            // there is no new file
            $file->update([
                'title' => $request->title
            ]);

            return response()->json($file, 200);
        }
       
        return null;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        
        return response()->json(null, 204);
    }
}
