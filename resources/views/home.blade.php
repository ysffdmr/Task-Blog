@extends('layouts.app')

@section('content')
    <div class="list-page">
        <div class="small-container">
            <div class="items">
                @foreach ($posts as $item)
                    <a href="{{ route('post-detail', $item->id) }}" class="item">
                        <div class="image"> <img src="{{ $item->image }}" alt="{{ $item->title }}"> </div>
                        <div class="info">
                            <span class="title">{{ $item->title }}</span>
                            <span class="summary">{{ $item->summary }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
