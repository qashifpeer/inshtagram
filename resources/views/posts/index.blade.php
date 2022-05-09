@extends('layouts.app')

@section('main_content')
<div class="container">


@foreach ($posts as $post )

<div class="row">
    <div class="col-6 offset-3">
       <a href="/profile/{{ $post->user->id }}"> <img src="/storage/{{ $post->image }}"class="w-100"></a>
    </div>
    <div class="row">
    <div class="col-6 offset-3 pt-2 pb-4">

        <div>

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

@endforeach
</div>



</div>
<div class="row">
<div class="col-12 d-flex justify-content-center">
    {!! $posts->links() !!}
</div>
    {{-- <div class="col-12">

    </div> --}}
</div>


@endsection




