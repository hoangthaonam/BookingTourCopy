<h1>List Review</h1>
@if (count($reviews)>0)
    @foreach ($reviews as $review)
        <a href="">{{$review->content}}</a>        
    @endforeach
@else
    <h4>Chưa có review nào</h4>
@endif