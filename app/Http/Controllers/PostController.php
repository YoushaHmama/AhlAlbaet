<?php

namespace App\Http\Controllers;

use App\Models\FavoriteModel;
use App\Models\Post_WaitModel;
use App\Models\PostModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //create post function
    public function create_post(Request $request,$user_id){
        $text = $request->text;
        $image = $request->image;
        $file_name = '';
        if($image){
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $path = 'posts_images';
            $request->image->move($path,$file_name);
        }
        Post_WaitModel::create([
            'user_id'=>$user_id,
            'text'=>$text,
            'photo'=>$file_name,
        ]);
        return redirect()->back();
    }

    //favorites function
    public function Favorite($user_id,$post_id){
        $user = UserModel::find($user_id);
        $post = PostModel::find($post_id);
        $favorites = FavoriteModel::where('user_id',$user_id)->get();
        foreach($favorites as $favorite){
            if($favorite->post_id == $post_id){
                    $post->favorites--;
                    $post->update();
                    $favorite->delete();
                    return redirect()->back();
            }
        }
        $post->favorites++;
        FavoriteModel::create([
            'user_id'=>$user_id,
            'post_id'=>$post_id,
        ]);
        $post->update();
        return redirect()->back();
    }
}
