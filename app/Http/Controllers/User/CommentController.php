<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentReview;
use App\Component\CommentRecursive;
use Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        if(Auth::check()){
            $comment = new CommentReview();
            $comment['type'] = 1;
            $comment['user_id'] = Auth::user()->user_id;
            $comment['tour_id'] = (int)$request->tour_id;
            $comment['content'] = $request->content;
            $comment['parent_id'] = (int)$request->cmr_id;
            $comment['status'] = 0;
            $comment->save();
            $listComments = CommentReview::with('user')
                            ->where('type',1)
                            ->where('tour_id',$request->tour_id)
                            ->orderBy('created_at', 'DESC')
                            ->get();
            $commentRecursive = new CommentRecursive();
            $response = $commentRecursive->recursive($listComments);

            return $response;
        } else {
            Session::flash('Error', 'Login first');
            return redirect()->route('login');
        }
    }

    public function update(Request $request)
    {
        if(Auth::check()){
            $comment = CommentReview::find($request->cmr_id);
            $comment['content'] = $request->content;
            $comment->save();
            $listComments = CommentReview::with('user')
                            ->where('type',1)
                            ->where('tour_id',$request->tour_id)
                            ->orderBy('created_at', 'DESC')
                            ->get();
            $commentRecursive = new CommentRecursive();
            $response = $commentRecursive->recursive($listComments);

            return $response;
        } else {
            Session::flash('Error', 'Login first');
            return redirect()->route('login');
        }
    }
    public function destroy(Request $request)
    {
        
        $cmr_id = (int)($request->cmr_id);
        $comment = CommentReview::find($cmr_id)->delete();
        $commentRecursive = new CommentRecursive();
        $listComments = CommentReview::with('user')
                            ->where('type',1)
                            ->where('tour_id',$request->tour_id)
                            ->orderBy('created_at', 'DESC')
                            ->get();
        $commentRecursive = new CommentRecursive();
        $response = $commentRecursive->recursive($listComments);

        return $response;
    }
}
