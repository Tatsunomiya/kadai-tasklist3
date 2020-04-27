<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Task;

class UsersController extends Controller
{
    
    public function index() {
        
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {



        $task = Task::find($id);
                if (\Auth::id() === $task->user_id) {

        

        return view('tasks.show', ['task' => $task,]);
        
                }
                
                        return redirect('/');


    }

    
    
}
