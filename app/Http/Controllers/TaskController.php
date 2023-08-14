<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * @OA\GET(
     *     path="/api/task",
     *     summary="fetch task",
     *     description="list all task",
     *     tags={"Task"},
     *     @OA\Response(response=200,description="OK"),
     *     security={{"Authorization": {}}},   
     * )
     */
    public function get(Request $req)
    {
        $task = Task::get();
        if(!$task) return response()->json("task not found",500);
        return response()->json($task,200);
    }
     /**
     * @OA\PUT(
     *     path="/api/task/{id}",
     *     summary="update task",
     *     description="update parameter",
     *     tags={"Task"},
     *     @OA\Parameter(name="id",in="path"),
     *     @OA\RequestBody(
     *         required=true,
     *         description="json body",
     *        @OA\JsonContent(
     *          type="object",
     *            @OA\Property(property="task", type="string", example="get a golden tooth", description="task to do"),
     *            @OA\Property(property="is_completed", type="boolean", example="0", description="status"),
     *        ),
     *     ),
     *     @OA\Response(response=200,description="OK"),
     *     security={{"Authorization": {}}},   
     * )
     */
    public function put(Request $req,$id)
    {
       $task = Task::where('id',$id)->first();
       if(!$task) return response()->json("task not found",500);
       $task->task = $req->task;
       $task->is_completed = $req->is_completed ?? 0;
       $task->save();
       return response()->json("updated successfully",200);
    }
     /**
     * @OA\POST(
     *     path="/api/task",
     *     summary="create task",
     *     description="creation param",
     *     tags={"Task"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="json body",
     *        @OA\JsonContent(
     *          type="object",
     *            @OA\Property(property="task", type="string", example="get a golden tooth", description="task to do"),
     *            @OA\Property(property="is_completed", type="boolean", example="0", description="status"),
     *        ),
     *     ),
     *     @OA\Response(response=200,description="OK"),
     *     security={{"Authorization": {}}},   
     * )
     */
    public function post(Request $req)
    {
        $user_id = Auth::user()->id;
        $query = Task::where('task',$req->task);
        $query->where('user_id',$user_id); 
        $task = $query->first();
        if($task) return response()->json("task already exist",500);
        $task = new Task();
        $task->user_id = $user_id;
        $task->task = $req->task;
        $task->is_completed = 0;
        $task->save();
        return response()->json("task added",200);
    }
     /**
     * @OA\DELETE(
     *     path="/api/task/{id}",
     *     summary="delete task",
     *     description="just delete",
     *     tags={"Task"},
     *     @OA\Parameter(name="id",in="path"),
     *     @OA\Response(response=200,description="OK"),
     *     security={{"Authorization": {}}},   
     * )
     */
    public function delete(Request $req,$id)
    {
        $task = Task::where('id',$id)->first();
        if(!$task) return response()->json("task not found",500);
        $task->delete();
        return response()->json("task deleted",200);
    }
}