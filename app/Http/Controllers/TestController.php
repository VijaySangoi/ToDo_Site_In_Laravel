<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Models\test2;
class TestController extends Controller
{
    public function index(Request $req){
        //var_dump($req->input());
        $data=new test2;
        $data->name = $req->name;
        $data->address =$req->address;
        $data->save();
    }
}
