<h1>Create Review</h1>
<form action="{{route('review.store')}}" method="POST">
    <label for="name">Tour: </label>
    <select name="tour_id">
        @foreach ($tours as $tour)
            <option value="{{$tour->tour_id}}" @if ($tour->tour_id == $tour_id)
                selected = "selected"
            @endif>{{$tour->name}}</option>
        @endforeach
    </select>
        {{  csrf_field() }}
        <label for="content">Content: </label>
        <textarea name="content" cols="50" rows="10">{{old('content')}}</textarea>
        <input type="submit" value="Create">
        <input type="hidden" name="" value="[$tour->tour_id]">
    </form>
@include('Common.Error')