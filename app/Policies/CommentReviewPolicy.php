<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CommentReview;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the commentReview.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CommentReview  $commentReview
     * @return mixed
     */
    public function view(User $user, CommentReview $commentReview)
    {
        //
    }

    /**
     * Determine whether the user can create commentReviews.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the commentReview.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CommentReview  $commentReview
     * @return mixed
     */
    public function update(User $user, CommentReview $commentReview)
    {
        return $user->user_id === $commentReview->user_id;
    }

    /**
     * Determine whether the user can delete the commentReview.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CommentReview  $commentReview
     * @return mixed
     */
    public function delete(User $user, CommentReview $commentReview)
    {
        return $user->user_id === $commentReview->user_id;
    }
}
