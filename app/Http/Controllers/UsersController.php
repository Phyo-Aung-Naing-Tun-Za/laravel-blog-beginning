<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function destory($id)
    {
    }
    public function suspend($id)
    {
            $user =  User::find($id);
            $user->status = 0;
            $user->save();
            return back();
    }
    public function unsuspend($id)
    {
        $user =  User::find($id);
        $user->status = 1;
        $user->save();
        return back();
    }

    public function show(Request $request)
    {
        $users = User::query()
        ->where('name','LIKE',"%$request->name%")
        ->get();
        $jUsers = json_encode($users);
        echo $jUsers;
    }

    public function search(Request $request)
    {
        $user = User::query()
        ->where('name','LIKE',"%$request->name%")
        ->get();
        return view('posts.dashboard',['users' => $user]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:10|max:225',
            'email' => 'required|email'
        ]);
        try {
            $request->user()->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return back()->with('update','Updated Successfully!');
        } catch (\Exception $e) {
           return back()->with('error','Duplicate Email address!');
        }
    }
    public function updateImg()
    {

    }

}
