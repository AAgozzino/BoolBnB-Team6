<?php

namespace App\Http\Controllers;
use App\User;
use App\House;
use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $houses = House::where('user_id', $user_id)->get();

        $houses_ids = [];
        foreach ($houses as $house) {
            $houses_ids[] = $house->id;
        }

        $messages = Message::whereIn('house_id', $houses_ids)->get();
        
        return view('admin.messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'house_id' => 'required',
            'email_msg' => 'required|email',
            'content_msg' => 'required'
        ]);

        $newMessage = new Message;
        $newMessage->house_id = $data['house_id'];
        $newMessage->email_msg = $data['email_msg'];
        $newMessage->content_msg = $data['content_msg'];
        $newMessage->save();

        return redirect()->back();
    }
}
