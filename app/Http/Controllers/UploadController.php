<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Input;
use Validator;
use Redirect;
use App\User;
use Illuminate\Http\Request;
/*use Illuminate\Http\Response;*/
use Session;
/*use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;*/
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller {

    public function upload(Request $request) {

        $file = $request->file('file');
        $destinationPath = '/storage/avatars/';
        $extension = $file->getClientOriginalExtension(); //получение расширение файла
        $fileName = Auth::user()->id./*'_'.rand(11111, 99999) . */'.' . $extension;
        $file->move(base_path().$destinationPath,$fileName);

        if (DB::table('photos')->where('user_id', Auth::user()->id)->value('user_id') == Auth::user()->id){
        }
        else{
            $photos= new Photo(); //обращается к контроллеру???
            $photos->user_id = Auth::user()->id;
            $photos->url = 'storage/avatars/'.$fileName; //ссылки на картинки
            $photos->main = 1;
            $photos->save();
        }
        return view('home');
    }
}