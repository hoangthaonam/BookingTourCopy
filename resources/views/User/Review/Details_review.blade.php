<h1>Details </h1>
<b>Name Tour: </b> {{$reviews->tour->name}}
<b>Posted by: </b> {{$reviews->user->name}}
<b>Content: </b>
<br>
{{$reviews->content}}
@can('update', $reviews)
<a href="{{route('review.edit',[$reviews->cmr_id])}}">EDIT</a>
@endcan
@can('update', $reviews)
<form action="{{route('review.destroy',[$reviews->cmr_id])}}" method="POST">
    {{  csrf_field()  }}
    {{  method_field('DELETE')  }}
    <input type="submit" value="DELETE">
</form>
@endcan
@include('Common.Error')