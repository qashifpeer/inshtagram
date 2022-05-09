@extends('layouts.app')

@section('main_content')
<div class="container">


<div class="row">
    <div class="col-8">
        <img src="/storage/{{ $post->image }}"class="w-100">
    </div>
    <div class="col-4">
        {{-- <h2> {{ $post->user->user_name }}</h2>
        <p> {{ $post->caption}}</p> --}}

        <div>
            <div class="d-flex align-items-center">
                <div class="pe-3">
                    <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width:50px;">
                </div>
                <div>
                    <div class="fw-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->user_name }}</span>
                        </a>
                        <a href="" class="ps-3">Follow</a>
                    </div>
                </div>
            </div>
            <hr>
            <p>
                 <span class="fw-bold">
                    <a href="/profile/{{ $post->user->id }}">
                        <span class="text-dark">{{ $post->user->user_name }}</span>
                     </a>
                </span> {{ $post->caption }}
            </p>
        </div>
</div>

</div>

@endsection




