{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> --}}
<header>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <input type="hidden" id="tour_id" value="{{$tour->tour_id}}">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
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
    <a href="{{route('reviews.listReviews',[$tour->tour_id])}}">View Review</a>
    <br>
    <h3>Comments</h3>
    <div class="new_comment">
        <textarea id="content0"></textarea>
        <button id="button0" data-url="{{route('comment.create')}}" onClick="submit(this)">Submit</button>
    </div>
    <div id="comments">
        {!! $data !!}
    </div>
    <hr>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        function reply(cmr_id){
            let textarea = "<textarea id=\"content" + cmr_id + "\"></textarea>";
            let alert = "<p>{{ $errors->first('content') }}<p>";
            let button = "<button data-url=\"{{route('comment.create')}}\" onClick=\"submit(this," + cmr_id + ")\">Submit</button>";
            $( "#text"+cmr_id ).html(textarea + button);
        }
        function edit(cmr_id){
            let comment = $('#rootComment'+cmr_id).text();
            let textarea = "<textarea id=\"content" + cmr_id + "\">"+ comment +"</textarea>";
            let button = "<button data-url=\"{{route('comment.update')}}\" onClick=\"submit(this," + cmr_id + ")\">Submit</button>";
            $('#rootComment'+cmr_id).html(textarea + button);
        }
        function submit(element, cmr_id = 0){
            let url = $(element).data('url');
            let content = $("#content"+cmr_id).val();
            let tour_id = parseInt($("#tour_id").val());
            let _token = $('#token').val();
            cmr_id = parseInt(cmr_id);
            let values = {
                'content': content,
                'tour_id': tour_id,
                'cmr_id': cmr_id,
                '_token': _token,
            };
            if(!content) {
                alert('Content is not null');
            } else{
                $.ajax({
                    url: url,
                    type: "POST",
                    data: values,
                    success: function(response){
                        $( "#comments").html(response);
                        $( "#content"+cmr_id).val('');
                    }
                });
            }
        }
        function destroy(cmr_id){
            let url = "/comment/destroy";
            let _token = $('#token').val();
            let tour_id = parseInt($("#tour_id").val());
            cmr_id = parseInt(cmr_id);
            let values = {
                'cmr_id': cmr_id,
                'tour_id': tour_id,
                '_token': _token,
            };
            $.ajax({
                url: url,
                type: 'DELETE',
                data: values,
                success: function(response){
                    $( "#comments").html(response);
                }
            });
        }
        </script>