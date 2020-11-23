<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentReview;
use App\Models\Tour;
use App\Http\Requests\ReviewRequest;
use Auth;
use Session;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth')->except(['listReviews','show']);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createReviews($tour_id)
    {
        $tours = Tour::get();
        return view('User.Review.Create_review',compact('tours','tour_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        $reviews = $request->all();
        $reviews['user_id'] = Auth::user()->user_id;
        $reviews['type'] = 2;
        $newReview = CommentReview::create($reviews);
        return redirect()->route('review.show',$newReview->cmr_id);
    }

    public function listReviews($tour_id)
    {
        $reviews = CommentReview::with('tour')
                    ->where('tour_id',$tour_id)
                    ->where('type','2')
                    ->get();
        return view('User.Review.List_reviews',compact('reviews'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cmr_id)
    {
        $reviews = CommentReview::with('tour','user')->find($cmr_id);
        return view('User.Review.Details_review',compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cmr_id)
    {
        $reviews = CommentReview::with('tour','user')->find($cmr_id);
        if (Auth::user()->can('update', $reviews)) {
            return view('User.Review.Edit_review',compact('reviews'));
        } else {
            Session::flash('Error','You cant edit this review!');
            return redirect()->route('review.show',$cmr_id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request, $id)
    {
        $review = CommentReview::find($id);
        if (Auth::user()->can('update', $review)) {
            $review->fill($request->all())->save();
            $review->save();
            return redirect()->route('review.show',$review->cmr_id);
        } else {
            Session::flash('Error','You cant edit this review!');
            return redirect()->route('review.show',$cmr_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cmr_id)
    {
        // $review = CommentReview::with('tour')->where('cmr_id',$cmr_id)->get();
        $review = CommentReview::find($cmr_id);
        $tour = CommentReview::find($cmr_id)->tour()->first();
        if (Auth::user()->can('delete', $review)) {
            $review->delete();
            return redirect()->route('reviews.listReviews',$tour->tour_id);
            return 'delete';
        } else {
            Session::flash('Error','You cant delete this review!');
            return redirect()->route('review.show',$cmr_id);
        }
    }
}
