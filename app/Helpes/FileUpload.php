<?php
namespace app\Helpes;
/*use Illuminate\Http\Request;*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Photo;

class FileUpload
    {
        static function uploadPic($file, $path)
        {
            $destinationPath = '/storage/'.$path;
            $extension = $file->getClientOriginalExtension(); //получение расширение файла
            $fileName = Auth::user()->id . '_' .rand(11111,99999).'.'. $extension;
            $file->move(base_path() . $destinationPath, $fileName);
            return $fileName;
        }

        static function multiple_uploadPic($path)
        {
            // getting all of the post data
            $files = Input::file('images');
            // Making counting of uploaded images
            $file_count = count($files);
            // start count how many uploaded
            $uploadcount = 0;
            if ($uploadcount < 3){
                foreach ($files as $file) {
                    $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                    $validator = Validator::make(array('file' => $file), $rules);
                    if ($validator->passes()) {
                        $destinationPath = '/storage/' . $path;
                        $fileName = DB::table('photos')->max('id') + 1 . '-' .$file->getClientOriginalName(); /*(DB::table('photos')->max('id')) + 1 */
                        $file->move(base_path() . $destinationPath, $fileName);

                        $photos = new Photo();
                        if ($uploadcount == 0) {
                            $photos->advert_id = DB::table('advert')->max('id') + 1;
                            $photos->main = 1;
                        } else {
                            $photos->advert_id = DB::table('advert')->max('id')+ 1;
                            $photos->main = 0;
                        }
                        $photos->url = '/storage/adverts/'.$fileName; //ссылки на картинки
                        $photos->save();

                        $uploadcount++;
                    }
                }
            }
/*            if($uploadcount == $file_count){
                return $fileName[];
            }
            else {
                return Redirect::to('posts.index')->withInput()->withErrors($validator);
            }*/
        }
    }
