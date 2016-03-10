<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model
{
    use SoftDeletes;    //��������� ������ �� ������� ��� ������� �������� �� ��

    protected $dates = ['deleted_at'];

    //�������� �������, � ������� ������� ������
    protected $table = 'advert';
    //����, ������� ����� ���������. ��������� ���� ����������� �������������
    protected $fillable = [
        'title', 'description', 'genre', 'year', 'publishing_house'
    ];

    public function author()
    {
        return $this->belongsTo('App\User','author_id');
    }
}
