<?php


namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    public function comment(Request $request){
      
        $comment = DB::table("comments")->insert([
            "id_user" => Auth::user()->id,
            "comment" => $request->comment,
            "id_news" => $request->matt,
        ]);

        return redirect()->route('newct.show', $request->matt)->with("success","Đăng bình luận thành công!");
    }
    
    
    
    
}

