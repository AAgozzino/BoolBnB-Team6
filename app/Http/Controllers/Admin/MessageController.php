<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $messages = Message::all();
        return view('admin.messages', compact('messages'));
    }
}
