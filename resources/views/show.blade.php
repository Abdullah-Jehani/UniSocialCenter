@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title">{{ $post->user->name ?? 'Abdo' }}</h5>
                        <p class="mb-0">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <h4 class="card-text ">{{ $post->content }}</h4>
                    <hr>
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>

                    <form action="{{ route('post.destroy', $post) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">Delete Post</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h1 class="fs-3">Comments Section</h1>
                    @if ($post->comments->count() > 0)
                    @foreach ($post->comments as $comment)
                    <div class="comment mb-3">
                        <p class="mb-1">{{ $comment->content }}</p>
                        <div class="comment-meta text-muted">
                            <small>{{ $post->user->name }} - </small>
                            <small>{{ $comment->created_at->diffForHumans() }}</small>


                        </div>
                    </div>
                    @if (!$loop->last)
                    <hr>
                    @endif
                    @endforeach
                    @else
                    <p class="text-muted">No comments yet.</p>
                    @endif
                </div>
            </div>

            <form action="{{ route('post.comment', ['post' => $post, 'user' => auth()->user()->id]) }}" method="POST">
                @method('POST')
                @csrf
                <div class="form-floating mt-4">
                    <textarea name="content" class="form-control bg-light" placeholder="Leave a comment here" id="content"></textarea>
                    <label for="floatingTextarea ">what's on your mind ...</label>
                    @error('content')
                    <h1 class="text-danger fs-6 mt-1 ">{{ $message }}</h1>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary mt-2">comment</button>
            </form>


        </div>
    </div>
</div>
@endsection