<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProfileController extends Controller
{
    protected $id;

    public function show($id) {
        $id++;
        $ppl = DB::table('characters')->find($id);
        return view('profile', ['name' => $ppl] ) ;
    }
}
