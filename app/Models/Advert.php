<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model
{
    use SoftDeletes;    //исключить модель из выборки без полного удаления из БД

    protected $dates = ['deleted_at'];

    //название таблицы, с которой связана модель
    protected $table = 'advert';
    //поля, которые можно заполнять. Остальные поля заполняются автоматически
    protected $fillable = [
        'title', 'description', 'genre', 'year', 'publishing_house'
    ];

    public function author()
    {
        return $this->belongsTo('App\User','author_id');
    }
}
