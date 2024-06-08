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
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user-circle fa-2x mr-2"></i>
                                <p class="font-weight-bold text-primary text-3xl mb-0">{{ $post->user->name }}</p>
                            </div>
                        </div>
                        <p class="card-text">{{ $post->content }}</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{route('post.likes' , ['post' => $post , 'user' => auth()->user()->id] )}} " method="POST">
                                @csrf
                                @method('POST')
                                <button class="btn btn-outline-primary btn-sm"><span class="badge text-bg-primary">{{ $post->likes->count() }}</span> Like </button>
                            </form>
                            <div class="d-flex ms-4">
                                <button class="btn btn-outline-dark btn-sm me-3"><span class="badge text-bg-dark">{{ $post->comments->count() }}</span> Comments </button>

                                <a class="btn btn-secondary me-3" href="{{ route('post.show', $post->id) }}">View Post</a>

                            </div>
                        </div>
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