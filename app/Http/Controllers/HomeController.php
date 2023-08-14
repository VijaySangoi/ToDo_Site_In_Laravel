<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); //??//reload//user notify//log generate
    }
    public function index()
    {
        $id = Auth::user()->id;
        #echo $id;
        #where(['user_id'=>$id],['is_completed'=>0]);
        $incomplete = Task::where(['user_id' => $id, 'is_completed' => 0])->get();
        $complete = Task::where(['user_id' => $id, 'is_completed' => 1])->get();
        return view('home', ['incomplete' => $incomplete, 'complete' => $complete]);
    }
}
