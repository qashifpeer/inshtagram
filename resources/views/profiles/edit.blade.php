@extends('layouts.app')

    @section('main_content')


<div class="container">

    <div class="row">
        <div class="col-6 offset-2">
          <form method="post" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $user->profile->title }}">
                @error('title')
                <div class="text text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ?? $user->profile->description }}">
                @error('description')
                <div class="text text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ old('url') ?? $user->profile->url }}" >
                @error('url')
                <div class="text text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
              <div class="text text-danger">{{ $message }}</div>
              @enderror
              </div>


              <button type="submit" class="btn btn-primary">Save Profile</button>
            </form>
        </div>
    </div>

</div>



@endsection
