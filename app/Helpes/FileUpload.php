<?php
namespace app\Helpes;
/*use Illuminate\Http\Request;*/
use Illuminate\Support\Facades\Auth;

class FileUpload
    {
        static function uploadPic($file, $path)
        {
            $destinationPath = '/storage/'.$path;
            $extension = $file->getClientOriginalExtension(); //получение расширение файла
            $fileName = Auth::user()->id . '.' . $extension;
            $file->move(base_path() . $destinationPath, $fileName);
            return $fileName;
        }
    }
