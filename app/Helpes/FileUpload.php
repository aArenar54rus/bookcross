<?php
namespace app\Helpes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileUpload
    {
        static function uploadPic($file, $path)
        {
            echo $file;
            /*$file = $request->file('pic');*/
            $destinationPath = '/storage/'.$path;
            $extension = $file->getClientOriginalExtension(); //получение расширение файла
            $fileName = Auth::user()->id.'_'.rand(11111, 99999) . '.' . $extension;
            $file->move(base_path() . $destinationPath, $fileName);
            return $fileName;
        }
    }
