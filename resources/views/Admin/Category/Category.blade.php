<h1>Category</h1>
@include('Common.Error')
<form action="{{route('category.store')}}" method = "POST">
    {{ csrf_field() }}
    <label>Name</label>
    <input type="text" name="name"/>
    <select name="parent_id">
        <option value="0">Parent Category</option>
        @empty(!$data)
            {!! $data !!}    
        @endempty
    </select>
    <input type="submit" value="Create">
</form>