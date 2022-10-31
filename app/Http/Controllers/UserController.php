<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(){
        $user = Auth::user();

        return Inertia::render('User/Edit', ['user' => $user]);

    }

    public function update(Request $request){

        $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|email|unique:users,email',
            'image' => 'file|nullable'
        ]);

        $user = Auth::user();

        $img = $request->file('image');

        if ($img == null) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->route('posts.index')->with('success', 'プロフィール編集が完了しました。');
        } else {

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $path = $img->store('profile_img', 'public');
            $user->updateOrCreate(['image' => $user->image], ['image' => $path]);

            return redirect()->route('posts.index')->with('success', 'プロフィール編集が完了しました。');
        }


        // // $user->update($request->all());

        // return redirect()->route('posts.index');

    }
}
