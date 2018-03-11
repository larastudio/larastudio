<?php

namespace App\Http\Controllers;

use App\Notifications\InboxMessage;
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Admin;
use Illuminate\Notifications\Notifiable;

class ContactController extends Controller
{
    
    public function index()
    {
        return view('contact');
    }
    
    public function mailToAdmin(ContactFormRequest $message, Admin $admin)
	{        //send the admin an notification
        $admin->notify(new InboxMessage($message));
		// redirect the user back
		return redirect()->back()->with('message', 'thanks for the message! We will get back to you soon!');
	}
}
