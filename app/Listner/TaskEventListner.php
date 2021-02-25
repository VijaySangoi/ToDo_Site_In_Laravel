<?php

namespace App\Listner;

use App\Event\TaskEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Task;
use App\Models\User;
use App\helper\email;

class TaskEventListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskEvent  $event
     * @return void
     */
    public function handle(TaskEvent $event)
    {   $x=[$event->message][0][0];
        $y = [$event->message][0][1];
        $z=[$event->message][0][2];
        #dd($x);
        $rough=User::select('email')->where('id',$x)->get();
        $em=$rough[0]->email;
        #dd($rough);

        switch ($y) {
            case 'insert':
                $xs=new email();
                $xs->eemail($em,$y,$z);

                break;
            case 'incomplete':
                $d=Task::select('Task')->where('ID',$z)->get();

                $s=$d[0]->Task;
                $xs=new email();
                $xs->eemail($em,$y,$s);
                break;
            case 'complete':
                $d=Task::select('Task')->where('ID',$z)->get();
                $s=$d[0]->Task;
                $xs=new email();
                $xs->eemail($em,$y,$s);
                break;
        }

    }

}
