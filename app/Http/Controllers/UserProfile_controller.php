<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserProfile_controller extends Controller
{
    public function edit(){
        
        $title = "Edit Avatar";

        return view('user.edit', compact('title'));
    }

    public function update(Request $request){
        
        if ($request->user()->avatar) {

            Storage::delete($request->user()->avatar);
        }

        $avatar = $request->file('avatar')->store('avatars');
        
        $request->user()->update([
            'avatar' => $avatar
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);


        $file = $request->file('avatar');
        if($file){
            $file->move('avatars',$file->getClientOriginalName());
            $data['avatar'] = 'avatars/'.$file->getClientOriginalName();
        }


        User::where('id',\Auth::user()->id)->update($data);

        \Session::flash('sukses', 'Avatar Berhasil diubah');      
        return redirect()->back();
        
    }

    public function delete(Request $request)
    {
        if ($request->user()->avatar) {

            Storage::delete($request->user()->avatar);
        }

        $request->user()->update([
            'avatar' => null
        ]);
        \Session::flash('sukses', 'Avatar Berhasil dihapus');  
        return redirect()->back();
    }
}
