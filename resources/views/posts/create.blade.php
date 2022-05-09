@extends('layouts.app')

@section('main_content')
<div class="container">
<div class="row">
    <div class="col-8 offset-3">
        <h2>Add New Post</h2>
    </div>
</div>
  <div class="row">
      <div class="col-6 offset-2">
        <form method="post" action="{{ route("p.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="caption" class="form-label">Post Caption</label>
              <input type="text" class="form-control" id="caption" name="caption">
              @error('caption')
              <div class="text text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
              <div class="text text-danger">{{ $message }}</div>
              @enderror
              </div>

            <button type="submit" class="btn btn-primary">Add New Post</button>
          </form>
      </div>
  </div>
</div>

@endsection




