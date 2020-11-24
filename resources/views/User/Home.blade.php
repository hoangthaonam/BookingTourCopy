<h1>Homepage</h1>
@auth
    <a href="{{route('logout')}}">Logout</a>
@endauth
@guest
    <a href="{{route('showlogin')}}">Login</a>
@endguest
<h1>Tour</h1>
<br/>
@foreach ($tours as $tour)
    <label for="name">Name: </label> {{$tour->name}}
    <br/>
    <label for="place_from">Place_from: </label> {{$tour->place_from}}
    <br/>
    <label for="place_to">Place_to:</label> {{$tour->place_to}}
    <br/>
    <label for="place_tobe">Place_tobe:</label> {{$tour->place_tobe}}
    <br/>
    <label for="duration">Duration:</label> {{$tour->duration}}
    <br/>
    <label for="price">Price:</label> {{$tour->price}}
    <br/>
    <br/>
    <a href="{{route('tour.show',[$tour->tour_id])}}">Details</a>
    @auth
    <a href="{{route('reviews.create',[$tour->tour_id])}}">Write Review</a>
    @endauth
    <a href="{{route('reviews.listReviews',[$tour->tour_id])}}">View Review</a>
    <hr>
@endforeach