@extends('layouts.app')

@section('content')
    <div class="detail-page">
        <div class="small-container">
            <h1 class="title">{{ $post->title }}</h1>
            <div class="info">
                <time>Created time: {{ $post->created_at->format('d.m.Y H:i') }}</time>
            </div>
            <span class="summary">{{ $post->summary }}</span>
            <div class="image"> <img src="{{ $post->image }}" alt="{{ $post->title }}"> </div>
            <div class="content">
                {!! $post->content !!}
            </div>
            <div class="comments">
                <form action="{{ route('create-comment') }}" method="POST">
                    @csrf
                    <div class="form-item">
                        <label for="comment-body">Comment Form {{ Auth::guest() ? '(You must be logged in to post a comment.)' : '' }}
                        </label>
                        <textarea name="body" id="comment-body" cols="30" rows="4" placeholder="Comment text..."></textarea>
                    </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-submit-item">
                        <button type="submit">Send</button>
                    </div>
                </form>
                @if ($post->comments->isNotEmpty())
                    <div class="comments-list">
                        <span class="title">Comments</span>
                        @foreach ($post->comments as $comment)
                            <div class="item">
                                <span class="name">{{ $comment->user->name }}</span>
                                <div class="body">{{ $comment->body }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
