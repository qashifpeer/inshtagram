@extends('layouts.app')

    @section('main_content')


<div class="container">
    <div class="row">
        <div class="col-3 col-sm-4">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" style="max-width: 100px;">
        </div>
        <div class="col-9 col-sm-8" >
            <div class="pt-5 d-flex justify-content-between align-items-baseline"   >
                <div class="d-flex">

                    {{ $user->user_name }}
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                <a href="{{ route('p.create') }}">Add New Post</a>
                @endcan

            </div>
            @can('update', $user->profile)
            <a href="{{ route('profile.edit',$user->id) }}">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="ps"><strong>{{ $postCount }}</strong> posts</div>
                <div class="ps-4"><strong>{{$followersCount }}</strong>followers </div>
                <div class="ps-4"><strong>{{ $followingCount }}</strong> following</div>

            </div>
            <div class="mt-3"><strong>{{ $user->profile->title }}</strong> </div>
            <div style="color: #c2d7c3;">Artist </div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">ll</a></div>
        </div>
    </div>
    <div class="row pt-4 ">
        @foreach ($user->posts as $post )

                <div class="col-4 pb-4">
                    <a href="{{route('p.show',$post->id)}}">
                        <img src="/storage/{{ $post->image }}" class="w-100" >
                    </a>
                </div>
        @endforeach


    </div>


</div>



@endsection
