<?php

namespace App\Models;

use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class invite extends Model
{
    protected $fillable = ['email'];

    //Метод вернет объект инвайта по коду и только если инвайт не использован. Иначе вернет NULL
    public static function getInviteByCode($code) {
        return Invite::where('code', $code)->where('claimed', NULL)->first();
    }

    //Генерируем рандомный код для ссылки, исп. в функции boot здесь же
    protected function generateInviteCode() {
        $this->code = bin2hex(openssl_random_pseudo_bytes(16));
    }

    //Метод для отправки инвата по почте
    public function sendInvitation($message_text) {
        $inviter = User::find($this->inviter_id);
        $params = [
            'inviter' => $inviter->name,
            'message_text' => (!empty($message_text)) ? $message_text : '',
            'code' => $this->code,
        ];
        Mail::send('emails.invite', $params, function ($message) {
            $message->to($this->email)->subject('Invite to site');
        });
    }

    //Связываем модель инвайта с моделью пользователя, отправляющего приглашение
    //Связь через поле inviter_id
    public function inviter() {
        return $this->belongsTo('App\User', 'inviter_id');
    }

    //Связываем модель инвайта с моделью пользователя, получившего приглашение
    //Может пригодиться, если захотим показывать, кто кого пригласил
    //Связь через поле invitee_id
    public function invitee() {
        return $this->belongsTo('App\User', 'invitee_id');
    }

    //Используем метод boot() чтобы подключиться к событию создания модели, будем генерировать код инвайта сразу при создании
    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->generateInviteCode();
        });
    }
}
