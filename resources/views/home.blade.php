@extends('layouts.app')

@section('content')
    <div class="list-page">
        <div class="small-container">
            <h1 class="mt-20 mb-20">Latest Posts</h1>
            <div class="items">
                @forelse ($posts as $item)
                    <a href="{{ route('post-detail', $item->id) }}" class="item">
                        <div class="image"> <img src="{{ $item->image }}" alt="{{ $item->title }}"> </div>
                        <div class="info">
                            <span class="title">{{ $item->title }}</span>
                            <span class="summary">{{ $item->summary }}</span>
                        </div>
                    </a>
                @empty
                    <h4>No content found register and create content!</h4>
                @endforelse
            </div>
        </div>
    </div>
@endsection
