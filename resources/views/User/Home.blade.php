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
    <label for="hotel_star">Hotel_star:</label> {{$tour->hotel_star}}
    <br/>
    <label for="des">Des:</label> 
    <br/>
        {{$tour->des}}
    <br/>
    <label for="quantity_people">Quantity_people:</label> {{$tour->quantity_people}}
    <br/>
    <label for="booking_number">Booking_number:</label> {{$tour->booking_number}}
    <br/>
    <label for="category">Category:</label> {{$tour->category->name}}
    <br/>
    @auth
    <a href="{{route('reviews.create',[$tour->tour_id])}}">Write Review</a>
    @endauth
    <a href="{{route('reviews.listReviews',[$tour->tour_id])}}">List Review</a>
    <hr>
@endforeach