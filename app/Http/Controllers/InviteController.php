<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    /**
     *
     * ����� ���������� view � ������ �������� �������
     *
     */
    public function create() {
        return view('invite.create');
    }

    /**
     * ����� ������������ ���������� ����� �������
     *
     * @param Request $request
     */
    public function store(Request $request) {
        //���������� ���� email: ���� ������������, � ��������� ���������� email,
        //� ���� �� ���������� �� �������� invites � users (������� email)
        $this->validate($request, ['email' => 'required|email|unique:invites,email|unique:users,email']);
        $email = $request->get('email');
        $message = $request->get('message');
        //�������� ����� ������ � �������� ���� email � id �����������
        $inviter = Auth::user();
        $invite = new Invite(['email' => $email]);
        $invite->inviter_id = $inviter->id;
        $invite->save();
        //������� ����� �������� �����������, ������������� � ������ Invite
        $invite->sendInvitation($message);
        //������� �� ����� ���������, ��� ������ ������� ���������
        \Session::flash('status_message', 'Invite has being created and sent to ' .$email);
        //� ������ ������������ �� �������� � ������ �������
        return redirect('invite');
    }

    /**
     * ����� ���������� view ��� ���, � ���� ��� �������
     */
    public function invitesonly() {
        return view('invite.invitesonly');
    }

    /**
     * �����������
     *  - ������� Auth middleware, ������� ��������� ��� ����� � ������ ��������� ������
     *    ���������������� �������������
     *  - � ��� �� ������� ����������: ����� invitesonly() ������ ���� �������� ����.
     */
    public function __construct() {
        $this->middleware('auth', ['except' => 'invitesonly']);
    }
}
