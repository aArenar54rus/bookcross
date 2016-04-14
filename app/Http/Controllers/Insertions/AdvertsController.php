<?php

namespace App\Http\Controllers\Insertions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpes\FileUpload;
use App\Http\Requests;
use App\Models\Advert;
use App\Http\Controllers\Controller;
use App\Models\Photo;

class AdvertsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [    //ограничение функций для незарегистрированного пользователя
            'index',
            'show',
        ]]);
    }

    /**
     * Display a listing of the resource.
     * отобразить все ресурсы
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $adverts = Advert::all();
        $title = $request->input('title');
        $genre = $request->input('genre');

        if ($title) {
            return view('adverts.index', ['adverts' => Advert::where('title', '=', $title)->get()]);
        }
        else {
            return view('adverts.index', ['adverts' => $adverts]);
        }
        //return view('adverts.index', ['adverts' => $adverts]);
    }

    /**
     * Show the form for creating a new resource.
     * Показ формы для создания нового объявления
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adverts.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('pic');
        $uploader = new FileUpload();
        $uploader = $uploader->uploadPic($file, 'adverts/');

        $advert = new Advert();
        $advert->author_id = Auth::user()->id;
        $advert->title = $request->title;
        $advert->description = $request->description;
        $advert->genre = $request->genre;
        $advert->year = $request->year;
        $advert->publishing_house = $request->publishing_house;
        $advert->save();

        $photos= new Photo();
        /*$photos->user_id = Auth::user()->id;*/
        $photos->advert_id = $advert->id;
        $photos->url = '/storage/adverts/'.$uploader; //ссылки на картинки
        $photos->main = 1;
        $photos->save();

        return redirect()->action('Insertions\AdvertsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert = Advert::find($id);

        if ($advert) {
            return view('adverts.show', ['advert' => $advert]);
        }
        else {
            return 'No such advert';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert = Advert::find($id);

        if ($advert->author_id == Auth::user()->id) {
            return view('adverts.edit', ['advert' => $advert]);
        }
        else {
            return view('errors.503');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $advert = Advert::find($id);

        $advert->title = $request->title;
        $advert->description = $request->description;
        $advert->genre = $request->genre;
        $advert->year = $request->year;
        $advert->publishing_house = $request->publishing_house;

        $advert->save();

        return redirect()->action('Insertions\AdvertsController@show', [$advert->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert = Advert::find($id);

        if ($advert->author_id == Auth::user()->id) {
            $advert->delete();
            return redirect()->action('Insertions\AdvertsController@index');
        }
        else {
            return view('errors.503');
        }
    }
}
