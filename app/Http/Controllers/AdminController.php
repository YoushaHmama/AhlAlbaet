<?php

namespace App\Http\Controllers;

use App\Models\FavoriteModel;
use App\Models\Post_ApproveModel;
use App\Models\Post_RemoveModel;
use App\Models\Post_WaitModel;
use App\Models\PostModel;
use App\Models\User_NotificationModel;
use App\Models\UserModel;
use App\Models\Wait_RegisterModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //go to dashboard
    public function Dashboard(){
        $users = UserModel::get();
        $users_wait = Wait_RegisterModel::get();
        $posts_wait = Post_WaitModel::get();
        return view('pages.dashboard',compact(['users','users_wait','posts_wait']));
    }

    //remove user function
    public function Remove($user_id){
        $user = UserModel::find($user_id);
        $posts_wait = Post_WaitModel::where('user_id',$user_id)->get();
        $notifications = User_NotificationModel::where('user_id',$user_id)->get();
        $approves = Post_ApproveModel::where('user_id',$user_id)->get();
        $favorites = FavoriteModel::where('user_id',$user_id)->get();
        $removes = Post_RemoveModel::where('user_id',$user_id)->get();
        foreach($user->post as $post){
            $post->delete();
        }
        foreach($posts_wait as $post_wait){
            $post_wait->delete();
        }
        foreach($notifications as $notification){
            $notification->delete();
        }
        foreach($approves as $approve){
            $approve->delete();
        }
        foreach($favorites as $favorite){
            $favorite->delete();
        }
        foreach($removes as $remove){
            $remove->delete();
        }
        $user->delete();
        return redirect()->back();
    }

    //remove post function
    public function remove_post(Request $request,$post_id){
        $reason = $request->reason;
        $post_wait = Post_WaitModel::find($post_id);
        $post_remove = Post_RemoveModel::create([
            'user_id'=>$post_wait->user_id,
            'post_id'=>$post_id,
            'text'=>$post_wait->text,
            'photo'=>$post_wait->photo,
        ]);
        User_NotificationModel::create([
            'user_id'=>$post_remove->user_id,
            'post_id'=>$post_remove->post_id,
            'agree'=>0,
            'disagree'=>1,
            'reason'=>$reason,
            'photo'=>$post_remove->photo,
        ]);
        $post_wait->delete();
        return redirect()->back();
    }

    //agree post function
    public function agree_post($post_id){
        $post_wait = Post_WaitModel::find($post_id);
        $post = PostModel::create([
            'user_id'=>$post_wait->user_id,
            'text'=>$post_wait->text,
            'photo'=>$post_wait->photo,
        ]);        
        User_NotificationModel::create([
            'user_id'=>$post->user_id,
            'post_id'=>$post->id,
            'agree'=>1,
            'disagree'=>0,
        ]);
        Post_ApproveModel::create([
            'user_id'=>$post->user_id,
            'post_id'=>$post->id,
        ]);
        $post_wait->delete();
        return redirect()->back();
    }
    
    //disagree user function
    public function disagree_user($user_id){
        $user = Wait_RegisterModel::find($user_id);
        $user->delete();
        return redirect()->back();
    }

    //agree user function
    public function agree_user($user_id){
        $user_wait = Wait_RegisterModel::find($user_id);
        UserModel::create([
            'username'=>$user_wait->username,
            'email'=>$user_wait->email,
            'password'=>$user_wait->password,
            'birthday'=>$user_wait->birthday,
            'photo'=>$user_wait->photo,
        ]);
        $user_wait->delete();
        return redirect()->back();
    }
}
