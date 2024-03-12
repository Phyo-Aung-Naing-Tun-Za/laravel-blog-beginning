<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
    public function updateImg(Request $request)
    {
        $request->validate([
            'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if(file_exists(public_path('storage/images/'.$request->user()->profile_img))){
            unlink(public_path('storage/images/'.$request->user()->profile_img));
        }
        if($request->hasFile('profile_img')){
            $fileName = time(). '-' . 'profile-img' . '.' . $request->profile_img->extension();
            $request->profile_img->move('storage/images/', $fileName);

           try {
                $user =  User::find($request->id);
                $user->profile_img = $fileName;
                $user->save();
           return back()->with('update', 'Successfully updated!');
           } catch (\Exception $e) {
            return back()->with('error', 'Something wrong!');
           }

        }else{
            return back()->with('error', 'Something wrong!');
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:3',
            'update_password' => 'required|min:3',
        ]);
        if(Hash::check($request->current_password, auth()->user()->password)){
            $request->user()->fill([
                'password' => Hash::make($request->update_password)
            ])->save();
            return back()->with('update', 'Successfully updated!');
        }else{
            return back()->with('error', 'Current password is wrong!');
        }


    }

}


