@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('post.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-floating">
                    <textarea name="content" class="form-control" placeholder="Ehat's On Mind ?" style="height: 100px;"></textarea>
                    <label for="floatingTextarea2">What's on your mind ?</label>
                    @error('content')
                    <div class="text-danger">
                        {{ $message }}
                    </div>

                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">POST</button>
                </div>
            </form>
        </div>
        <div class="col">
            <div class="row">
                @if ($posts->count() == 0)
                <div class=" shadow-md rounded-lg p-6 text-center">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">There are no posts yet.</h1>
                    <p class="text-gray-600 text-lg">Be the first to create a new post.</p>
                </div>
                @endif

                @if ($posts->count() > 0)
                @foreach ($posts as $post )

                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Abdullah Jehani</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <hr>
                        <a href="#" class="btn btn-primary">LIKE</a>
                        <a class="btn btn-secondary" href="{{ route('post.show', $post->id) }}">view post</a>
                    </div>


                </div>
                @endforeach
                @endif

            </div>

        </div>
    </div>
</div>


</div>
</div>

@endsection