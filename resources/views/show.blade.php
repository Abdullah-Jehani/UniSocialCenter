@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title">{{ $user->name ?? 'Abdo' }}</h5>
                        <p class="mb-0">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <h4 class="card-text ">{{ $post->content }}</h4>
                    <hr>
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection