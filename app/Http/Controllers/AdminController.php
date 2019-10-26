<?php

namespace App\Http\Controllers;



use http\Env\Request;

class AdminController extends Controller
{
    public function deleteUser(Request $request) {
        DB::table('users')->delete('id',$request['id_user']);
        return view('main', ['token' => $request['token']]);
    }
}
