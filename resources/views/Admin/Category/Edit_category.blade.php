<h1>Edit Category</h1>
@include('Common.Error')
<form action="{{route('category.update',[$cate->categories_id])}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <label for="name">Name</label>
    <input type="text" name="name" value="{{$cate->name}}">
    <label for="category">Category</label>
    <select name="parent_id">
        <option value="0" @if ($cate->parent_id == 0)
            selected = "selected"
        @endif>Danh mục cha</option>
        @foreach ($categories as $category)
            <option value="{{$category->categories_id}}" @if ($category->categories_id == $cate->parent_id)
                selected = "selected"
            @endif>{{$category->name}}</option>
        @endforeach
    </select>
    <input type="submit" value="Update">
</form>