<h1>List Review</h1>
@if (count($reviews)>0)
    @foreach ($reviews as $review)
        <a href="{{route('review.show',[$review->cmr_id])}}">{{$review->content}}</a>
        <br>        
    @endforeach
@else
    <h4>Chưa có review nào</h4>
@endif