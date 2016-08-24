<?php

namespace App\Models;

use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class invite extends Model
{
    protected $fillable = ['email'];

    //����� ������ ������ ������� �� ���� � ������ ���� ������ �� �����������. ����� ������ NULL
    public static function getInviteByCode($code) {
        return Invite::where('code', $code)->where('claimed', NULL)->first();
    }

    //���������� ��������� ��� ��� ������, ���. � ������� boot ����� ��
    protected function generateInviteCode() {
        $this->code = bin2hex(openssl_random_pseudo_bytes(16));
    }

    //����� ��� �������� ������ �� �����
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

    //��������� ������ ������� � ������� ������������, ������������� �����������
    //����� ����� ���� inviter_id
    public function inviter() {
        return $this->belongsTo('App\User', 'inviter_id');
    }

    //��������� ������ ������� � ������� ������������, ����������� �����������
    //����� �����������, ���� ������� ����������, ��� ���� ���������
    //����� ����� ���� invitee_id
    public function invitee() {
        return $this->belongsTo('App\User', 'invitee_id');
    }

    //���������� ����� boot() ����� ������������ � ������� �������� ������, ����� ������������ ��� ������� ����� ��� ��������
    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->generateInviteCode();
        });
    }
}
