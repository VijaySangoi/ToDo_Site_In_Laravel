<?php

namespace App\Http\Controllers;

use App\Event\TaskEvent;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ButtonController extends Controller
{


    public function insert(Request $req)
    {
        $data = new Task();
        $data->user_id = $req->uid;
        $data->task = $req->task_req;
        $data->is_completed = 0;
        $data->save();
        $req->session()->forget(['uid', 'task_req']);
        #$email=User::select('email')->where('id',Auth::user()->id)->get();
        event(new TaskEvent([Auth::user()->id, 'new Task added', $req->task_req]));
        Log::info('new task success');
        return Redirect::back()->with('success', 'new Task added');
    }
    public function incomplete(Request $req)
    {
        $id = $req->ic_id;
        Task::where('id', $id)->update(['is_completed' => 1]);
        $req->session()->forget('ic_id');
        #$email=User::select('email')->find(Auth::user()->id);
        //        var_dump($email);die();
        event(new TaskEvent([Auth::user()->id, 'new Task completed', $req->ic_id]));
        Log::info('new task completed');
        return Redirect::back()->with('success', 'new Task completed');
    }

    public function complete(Request $req)
    {
        $id = $req->cc_id;
        Task::where('id', $id)->update(['is_completed' => 0]);
        $req->session()->forget('cc_id');
        #$email=User::select('email')->where('id',Auth::user()->id)->get();
        event(new TaskEvent([Auth::user()->id, 'new Task resetted', $req->cc_id]));
        Log::info('new task resetted');
        return Redirect::back()->with('success', 'new Task resetted');
    }
}
