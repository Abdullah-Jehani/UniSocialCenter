@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('posts.update', $post) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="content">Content</label>

                            <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                            @error('content')
                            <div class="text-danger">
                                {{ $message }}
                            </div>

                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection