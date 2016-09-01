<?php

namespace App\Models;

use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $table = 'invites';
    protected $fillable = ['code', 'email'];
}
