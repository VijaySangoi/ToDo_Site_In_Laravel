<?php

namespace App\Http\Controllers;

class MiscController extends Controller
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
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function event()
    {
        return event(new \App\Event\TaskEvent('hello world'));
    }
}
