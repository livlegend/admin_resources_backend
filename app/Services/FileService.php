<?php

namespace App\Services;

use App\Http\Requests\FileRequest;
use App\Models\File;

class FileService
{
  
    /**
     * Display a listing of the files.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFiles()
    {   
        return File::all();
    }

       /**
     * Display the specified file.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFile($id)
    {
        return File::find($id);
    }

    public function store($data) {
        $commit= File::create($data);
        if($commit) return $commit;

        return null;
    }

    public function update($data, $file) {
        $commit= $file->update($data);
        if($commit) return  $file ;

        return null;
    }

    /**
     * Update the specified file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  File  $file
     * @return \Illuminate\Http\Response
     */
    public function uploadAndUpdateFile( $data,  $file )
    {
        // if there is a new file
        $fileName=$this->storeFile($data->file);
        if($fileName) {
            $toSave=array();
            $toSave['title']=$data->title;
            $toSave['file_link']=$fileName;
            return($this->update($toSave, $file));
        }
       
        return 'upload_error';
    }

    /**
     * Store a newly created file in storage.
     *
     */
    public function storeFileOnServer($data){
        $file=$data->file;
        $uploadPath = public_path('upload_files');
        $fileName = $file->getClientOriginalName();
        $generatedNewName = time() . '.' . $file->getClientOriginalExtension();
        if($file->move($uploadPath, $generatedNewName)){
            $generatedNewName;
        }
        return false;
    }

    
    public function storeFile($data)
    {
        $fileName=$this->storeFileOnServer($data);
        if($fileName){
            $toSave=array();
            $toSave['title']=$data->title;
            $toSave['file_link']=$fileName;
            return $this->store($toSave);
        }
        return null;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroyFile(File $file)
    {
        $commit=  $file->delete();
        if($commit) return true;

        return false;
    
    }
}
