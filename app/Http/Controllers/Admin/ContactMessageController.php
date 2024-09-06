<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReciveMail;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class ContactMessageController extends Controller
{
    public function index(){
        ReciveMail::query()->update(['seen' => 1]);
        $messages = ReciveMail::all();
        return view('admin.contact-messages.index',compact('messages'));
    }

    public function sendReplay(Request $request) {

        //dd($request->all());
        $request->validate([
            'subject' => ['required','max:255'],
            'message' => ['required'],
        ]);

        try {
            $contact = Contact::where('language', 'en')->first();

            Mail::to($request->email)->send(new ContactMail($request->subject, $request->message, $contact->email));
            
            $makeReplied = ReciveMail::find($request->message_id);
            $makeReplied->replied = 1;
            $makeReplied->save();
            
            toast(__('Mail sent successfully!'), 'success');
            return redirect()->back();
            
        } catch (\Throwable $e) {
            toast(__($e->getMessage()));
            return redirect()->back();
        }
    }
}
