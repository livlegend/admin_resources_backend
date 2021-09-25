<?php

namespace App\Traits;

Trait FileTrait
{
    // Store file in 'upload_files' folder
    public function storeFile($file)
    {
        $uploadPath = public_path('upload_files');
        $fileName = $file->getClientOriginalName();
        $generatedNewName = time() . '.' . $file->getClientOriginalExtension();
        if($file->move($uploadPath, $generatedNewName)){
            return $generatedNewName;
        }
        return false;
    }
}
