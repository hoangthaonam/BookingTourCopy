<h1>Edit Tour</h1>
<form action="{{route('tour.update',[$tour->tour_id])}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
      <label for="name">Name:</label><br/>
      <input type="text" class="form-control" value="{{ $tour->name }}" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="place_from">Place_from:</label><br/>
      <input type="text" class="form-control" value="{{ $tour->place_from }}" placeholder="Enter place_from" name="place_from">
    </div>
    <div class="form-group">
        <label for="place_to">Place_to:</label><br/>
        <input type="text" class="form-control" value="{{ $tour->place_to }}" placeholder="Enter place_to" name="place_to">
    </div>
    <div class="form-group">
        <label for="place_tobe">Place_tobe:</label><br/>
        <input type="text" class="form-control" value="{{ $tour->place_tobe }}"placeholder="Enter place_tobe" name="place_tobe">
    </div>
    <div class="form-group">
        <label for="duration">Duration:</label><br/>
        <input type="text" class="form-control" value="{{ $tour->duration }}"placeholder="Enter duration" name="duration">
    </div>
    <div class="form-group">
        <label for="price">Price:</label><br/>
        <input type="text" class="form-control" value="{{ $tour->price }}"placeholder="Enter price" name="price">
    </div>
    <div class="form-group">
        <label for="hotel_star">Hotel_star:</label><br/>
        <input type="text" class="form-control" value="{{ $tour->hotel_star }}"placeholder="Enter hotel_star" name="hotel_star">
    </div>
    <div class="form-group">
        <label for="des">Des:</label><br/>
        <textarea name="des" rows="4" cols="50">{{ $tour->des }}</textarea>
    </div>
    <div class="form-group">
        <label for="quantity_people">Quantity_people:</label><br/>
        <input type="text" class="form-control" value="{{ $tour->quantity_people }}" placeholder="Enter quantity_people" name="quantity_people">
    </div>
    <div class="form-group">
        <label for="category">Category:</label><br/>
        <select name="category_id">
            <option value="0">Parent Category</option>
            @foreach ($categories as $category)
                <option value="{{$category->categories_id}}" 
                @if ($category->categories_id == $tour->category_id)
                    selected = "selected"
                @endif
                >{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
  @include('Common.Error')