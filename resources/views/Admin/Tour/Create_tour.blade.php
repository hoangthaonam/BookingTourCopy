<h1>Create new tour</h1>
<form action="{{route('tour.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Name:</label><br/>
      <input type="text" class="form-control" value="{{ old('name') }}" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="place_from">Place_from:</label><br/>
      <input type="text" class="form-control" value="{{ old('place_from') }}" placeholder="Enter place_from" name="place_from">
    </div>
    <div class="form-group">
        <label for="place_to">Place_to:</label><br/>
        <input type="text" class="form-control" value="{{ old('place_to') }}" placeholder="Enter place_to" name="place_to">
    </div>
    <div class="form-group">
        <label for="place_tobe">Place_tobe:</label><br/>
        <input type="text" class="form-control" value="{{ old('place_tobe') }}"placeholder="Enter place_tobe" name="place_tobe">
    </div>
    <div class="form-group">
        <label for="duration">Duration:</label><br/>
        <input type="text" class="form-control" value="{{ old('duration') }}"placeholder="Enter duration" name="duration">
    </div>
    <div class="form-group">
        <label for="price">Price:</label><br/>
        <input type="text" class="form-control" value="{{ old('price') }}"placeholder="Enter price" name="price">
    </div>
    <div class="form-group">
        <label for="hotel_star">Hotel_star:</label><br/>
        <input type="text" class="form-control" value="{{ old('hotel_star') }}"placeholder="Enter hotel_star" name="hotel_star">
    </div>
    <div class="form-group">
        <label for="des">Des:</label><br/>
        <textarea name="des" rows="4" cols="50">{{ old('des') }}</textarea>
    </div>
    <div class="form-group">
        <label for="quantity_people">Quantity_people:</label><br/>
        <input type="text" class="form-control" value="{{ old('quantity_people') }}" placeholder="Enter quantity_people" name="quantity_people">
    </div>
    <div class="form-group">
        <label for="category">Category:</label><br/>
        <select name="category_id">
            <option value="0">Parent Category</option>
            {!!$data!!}
        </select>
    </div>
    <div class="form-group">
        <label for="image"> Image:</label><br/>
        <input type="file" class="form-control" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @include('Common.Error')