@if (Session::has('Error'))
<div class="alert alert-danger">
    <ul>
        <li>{{ Session::get('Error') }}</li>
    </ul>
</div>
@endif
@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif