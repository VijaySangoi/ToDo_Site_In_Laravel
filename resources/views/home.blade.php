@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div clas="card rounded" style="border: 1px solid;border-color:#ededed;max-width: 450px;">
                <div class="card-header">{{"Yet-To-Do"}}</div>
                <div class="card-body">
                    @foreach($incomplete as $ic)
                    <div>
                        <form action="{{route('incomplete')}}" method="get">
                            <input type="hidden" name="ic_id" value="{{$ic->id}}">
                            <button class="btn btn-light rounded" style="width:400px">
                                {{$ic->task}}
                            </button>
                        </form>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="max-width: 450px;">
                <div class="card-header">{{"Already Done"}}</div>
                <div class="card-body">
                    @foreach($complete as $cc)
                    <div>
                        <form action="{{route('complete')}}" method="get">
                            <input type="hidden" name="cc_id" value="{{$cc->id}}">
                            <button class="btn btn-light rounded" style="width:400px">
                                {{$cc->task}}
                            </button>
                        </form>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="row fixed-bottom pb-5" style="margin-bottom: 1px; margin-left: 10%; ">
        @if(\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
    </div>
    <div class="row fixed-bottom pb-5" style="margin-bottom: 1px; margin-left: 40%; ">
        <form action="{{route('new_task')}}" method="post">
            @csrf
            <input class="mr-3 mt-2" type="text" name="task_req" style="border: none;border-bottom: 1px solid;border-bottom-color: #222;">
            <input type="hidden" name="uid" value="{{Auth::User()->id}}">
            <button class="rounded btn btn-dark ml-3" type="submit" name="add_task">Enter</button>
        </form>
    </div>
    <div class="row fixed-bottom pb-5" style="margin-bottom: 1px; margin-left: 80%; ">
        <form action="{{route('to_pay')}}" method="get">
            @csrf

            <button class="rounded btn btn-dark ml-3" type="submit" name="add_task">premium</button>
        </form>
    </div>

</div>
@endsection