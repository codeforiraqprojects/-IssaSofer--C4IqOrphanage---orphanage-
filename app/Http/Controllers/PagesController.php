<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Validate;
use Session;
class PagesController extends Controller
{
    public function postCallus(Request $request)
    {
         $this->validate($request, [
             'email'   => 'required|email',
             'subject' => 'min:2',
             'name' => 'min:2',
             'message' => 'min:10'
             ]);

             $data = array(
             'email' => $request->email,
             'subject' => $request->subject,
             'name' => $request->name,
             'bodymessage' => $request->message,
             );

      Mail::send('email.callus', $data, function($message) use ($data){
          $message->from($data ['email']);
          $message->to('email@example.com');
          $message->subject($data ['subject']);
      });
      Session::flash('success', 'تم أرسال رسالتك بنجاح !. سوف نقوم بالرد قريبا ');
      return redirect('/contact-us');
    }
}
