<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\PostModel;
use App\Models\User_NotificationModel;
use App\Models\UserModel;
use App\Models\Wait_RegisterModel;
// use Illuminate\Http\Request;

class UserController extends Controller
{
    //go to register page
    public function register_page(){
        return view('pages.register');
    }
    //go to wait page
    public function wait_page(){
        return view('pages.wait');
    }
    //go to login page
    public function login_page(){
        return view('pages.login');
    }
    //go to user system page
    public function user_system_page($user_id){
        $user = UserModel::find($user_id);
        if($user == null){
            return redirect()->route('log');
        }
        $posts = PostModel::get();
        return view('pages.user_system',compact(['user','posts']));
    }

    //go to first page
    public function logout(){
        return view('pages.login_register');
    }

    //go to loading page
    public function loading(){
        return view('pages.loading');
    }

    //register function
    function Register(UserRequest $request){
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $birthday = $request->date;
        $accept = $request->accept;
        $image = $request->image;
        if($image){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = 'users_images';
        $request->image->move($path,$file_name);
        }else{
            $file_name = "user.jpg";
        }
        if(!$username){
            return redirect()->back()->with('error','أدخل الاسم');
        }else if(!$email){
            return redirect()->back()->with('error','أدخل البريد الإلكتروني');
        }else if(!$password){
            return redirect()->back()->with('error','أدخل كلمة المرور');
        }else if(!$birthday){
            return redirect()->back()->with('error','أدخل تاريخ الميلاد');
        }else if(!$accept){
            return redirect()->back()->with('error','يرجى الموافقة على الشروط');
        }
        $user = Wait_RegisterModel::create([
            "username"=>$username,
            "email"=>$email,
            "password"=>$password,
            "birthday"=>$birthday,
            "photo"=>$file_name,
        ]);
        return redirect()->route('wait');
    }

    //login function
    public function Login(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;
        $users = UserModel::select()->get();
        $users_wait = Wait_RegisterModel::select()->get();
        
        foreach($users as $user){
            if($user->email === $email && $user->password === $password){
                if($email === 'admin@gmail.com')
                    return redirect()->route('admin');
                return redirect()->route('user_interface',$user->id);
            }
        }
        foreach($users_wait as $user_wait){
            if($user_wait->email === $email && $user_wait->password === $password){
                return redirect()->route('wait');
            }
        }
        return redirect()->route('log_page')->with('error',' البريد الإلكتروني غير صحيح أو كلمة المرور غير صحيحة ');
    }

    //edit function
    public function Edit(EditRequest $request,$user_id){
        $username = $request->username;
        $password = $request->password;
        $image = $request->image;
        $user = UserModel::find($user_id);
        $posts = PostModel::get();
        if($image){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = 'users_images';
        $request->image->move($path,$file_name);
        $user->photo = $file_name;
        }
        $user->username = $username;
        $user->password = $password;
        $user->update();
        return redirect()->back();
    }
}