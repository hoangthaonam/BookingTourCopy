<form action="{{route('category.destroy',[$category->categories_id])}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <label for="name">Name</label>
    <input type="text" name="name" value="{{$category->name}}">
    <input type="submit" value="DELETE">
</form>
