<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

//use Mail;
//use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{


//    public function contact_form(Request $request)
//    {
//        $request->validate([
//            'name' => 'required',
//            'phone' => 'required',
//            'message' => 'required',
//        ]);
//
//        $data = array(
//            'name'=> $request['name'],
//            'phone'=> $request['phone'],
//            'messages'=> $request['message'],
//            'token'=>'_token',
//        );
//
//
//        Mail::send(['text'=>'layouts.mail'], $data, function($message) {
//            $message->to('galich_iv@ukr.net');
//            $message->subject('Запитання з сайту agromaster.pp.ua');
//            $message->from('info@agromaster.pp.ua');
//        });
//
//        toast('Ваше запитання відправлено!','error','bottom-right');
////        alert('Title','Lorem Lorem Lorem', 'success');
//        return redirect()->back();
//    }


    public function newsletter(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'phone' => 'required',
        ]);

        $data = array(
            'messages'=> $request['message'],
            'phone'=> $request['phone'],
            'token'=>$request['_token'],
        );


        Mail::to('galich_iv@ukr.net')->send(new SendEmail($data));

//        Mail::send(['text'=>'emails.test'], $data, function($message) {
//            $message->to('galich_iv@ukr.net');
//            $message->subject('Запитання з сайту https://agromaster.info');
//            $message->from('info@agromaster.info');
//        });
//
//        dd($data);

//        toast('Ваше запитання відправлено!','success');
        return redirect()->back();
//        return route('home');
    }







//    public function basic_email()
//    {
//
//    }
//
//    public function html_email() {
//        $data = array('name'=>"Virat Gandhi");
//        Mail::send('mail', $data, function($message) {
//            $message->to('abc@gmail.com', 'Tutorials Point')->subject
//            ('Laravel HTML Testing Mail');
//            $message->from('xyz@gmail.com','Virat Gandhi');
//        });
//        echo "HTML Email Sent. Check your inbox.";
//    }
//    public function attachment_email() {
//        $data = array('name'=>"Virat Gandhi");
//        Mail::send('mail', $data, function($message) {
//            $message->to('abc@gmail.com', 'Tutorials Point')->subject
//            ('Laravel Testing Mail with Attachment');
//            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
//            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
//            $message->from('xyz@gmail.com','Virat Gandhi');
//        });
//        echo "Ваше запитання відправлено!";
//    }
}
