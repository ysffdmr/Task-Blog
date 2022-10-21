@extends('layouts.app')

@section('content')
    <div class="create-page mt-20">
        <div class="small-container">
            @if ($errors->any())
                <div class="alert mb-20">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('create-post-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-item">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="text-input" id="title" required autocomplete="off">
                </div>
                <div class="form-item">
                    <label for="summary">Summary</label>
                    <textarea name="summary" id="summary" rows="5" required autocomplete="off"></textarea>
                </div>
                <div class="form-item">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" rows="10" required autocomplete="off"></textarea>
                </div>
                <div class="form-item">
                    <label for="cover-image">Cover Image</label>
                    <input type="file" name="cover" id="cover-image" accept="image/png, image/gif, image/jpeg" required>
                </div>
                <div class="form-submit-item">
                    <button type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
