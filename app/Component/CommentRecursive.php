<?php
namespace App\Component;
use App\Models\CommentReview;
use Auth;
class CommentRecursive {
    protected $html = '';
    public function recursive($comments, $id = 0, $prefix = '')
    {
        # code...
        foreach($comments as $comment){
            if($comment->parent_id == $id){
                $this->html .= "<div id=\"comment{$comment->cmr_id}\">";
                $this->html .= "<p><b>&emsp;{$prefix}{$comment->user->name}</b>&emsp;{$comment->created_at}</p>";
                $this->html .= "<p>&emsp;{$prefix}<span id=\"rootComment{$comment->cmr_id}\">{$comment->content}</span></p>";
                $this->html .= "</div>"; 
                if(Auth::check()){
                    $this->html .= "&emsp;{$prefix}<button onClick=\"reply($comment->cmr_id)\">Reply</button>";
                    if(Auth::user()->can('update',$comment)){
                        $this->html .= "<button onClick=\"edit($comment->cmr_id)\">Edit</button>";
                        $this->html .= "<button onClick=\"destroy($comment->cmr_id)\">Delete</button>";
                    }
                }
                $this->html .= "<br/>";               
                $this->html .= "<div id=\"text{$comment->cmr_id}\"></div>";               
                $this->recursive($comments,$comment->cmr_id, $prefix.'&emsp;&emsp;&emsp;');
            }
        }
        return $this->html;
    }
}
?>