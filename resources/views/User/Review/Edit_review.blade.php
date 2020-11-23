<h1>Edit Review</h1>
<form action="{{route('review.update',[$reviews->cmr_id])}}" method="POST">
    {{  csrf_field() }}
    {{  method_field('PUT') }}
        <label for="content">Content: </label>
        <textarea name="content" cols="50" rows="10">{{$reviews->content}}</textarea>
        <input type="submit" value="Update">
        <input type="hidden" name="" value="[$tour->tour_id]">
    </form>
@include('Common.Error')