<?php

namespace App\Http\Controllers;

use App\Mail\mailing;
use App\Post;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function signup(Request $request) {
        $this->validate($request, [
            'event' => 'required|min:1',
            'surname' => 'required|max:120',
            'name' => 'required|max:120',
            'tel' => 'required|regex:/[0-9](10)/',
            'pass' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'education' => 'required|max:120'
        ]);

        $event = $request['event'];
        $surname = $request['surname'];
        $name = $request['name'];
        $tel = $request['tel'];
        $pass = $request['pass'];
        $email = $request['email'];
        $education = $request['education'];

        $user = new User();
        $user -> event = $event;
        $user -> surname = $surname;
        $user -> name = $name;
        $user -> phone = $tel;
        $user -> email = $email;
        $user -> password = bcrypt($pass);
        $user -> education = $education;
        $user -> ip_adress = $request->ip();

        $user->save();

        Auth::login($user);

        $file=$request->file('image');

        if($file) {
            Storage::disk('local')->put($user->name . '-' . $user->id . '.jpg', File::get($file));

            $user->file = $user->name . '-' . $user->id . '.jpg';

            $user->save();
        }

        //Mailing
//        $objDemo = new \stdClass();
//        $objDemo->demo_one = 'Demo One Value';
//        $objDemo->demo_two = 'Demo Two Value';
//        $objDemo->sender='myTestForApp@gmail.com';
//        $objDemo->receiver='myTestForApp@gmail.com';
//        Mail::to('myTestForApp@gmail.com')->send(new mailing($objDemo));
///////////////////////////////////////////
        $to_name = 'myTest';
        $to_email = 'myTestForApp@gmail.com';
        $data = array('name'=>$name . ' ' . $surname, 'body' => 'Вы совершили заявку на мероприятие ' . $event . '!');

        Mail::send('mailing.mail', $data, function($message) use ($to_name, $to_email)
            {$message->to($to_email, $to_name)->subject('Приглашение на мероприятие');

            $message->from('myTestForApp@gmail.com','George');
        });
///////////////////////////////////////////
        return view('includes.header');
    }

    public function signin(Request $request) {
        $this->validate($request, [
        'email_in' => 'required',
        'pass_in' => 'required'
        ]);

        if(Auth::attempt(['email' => $request['email_in'], 'password' => $request['pass_in']])) {

            $mes = view('includes.header')->render();

                //Redirect::route('home');
            return Response()->json(['view' => $mes, 'message' => '1' ]);
//            return Redirect::view('includes.header')->with(['message' => '1']);

        }
        $mes = view('includes.header')->render();
        return Response()->json(['view' => $mes, 'message' => '0' ]);

//        return Redirect::view('includes.header')->with(['message' => '0']);
    }

    public function logout() {
        Auth::logout();
        return view('includes.header');
    }

    public function getUserFile($filename){
        $file=Storage::disk('local')->get($filename);
        return new Response($file,200);
    }



}
