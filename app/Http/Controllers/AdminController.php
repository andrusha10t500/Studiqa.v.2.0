<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function deleteUser(Request $request) {

        echo $request['id_user'];
        DB::delete('delete from users where id=?',[$request['id_user']]);

        return view('admin', ['token' => $request['_token']]);
    }
}
