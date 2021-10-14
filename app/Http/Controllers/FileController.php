<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use App\Services\FileService;
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
        return (new FileService())->getFiles();
    }

    /**
     * Store a newly created file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {
        return (new FileService())->storeFile($request);
    }

    /**
     * Display the specified file.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (new FileService())->showFile($id);
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
            return (new FileService())->uploadAndUpdateFile($request,$file);
    
        }else{
            // there is no new file
            return (new FileService())->update($request,$file);
            
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        return (new FileService())->destroyFile($file);
    }
}
