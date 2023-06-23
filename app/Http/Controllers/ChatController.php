<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function send_message(Request $reqest){
        event(new MessageEvent($reqest->message));
        return null;
    }
}
