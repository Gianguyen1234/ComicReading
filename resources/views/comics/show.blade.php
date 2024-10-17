@extends('layout')

@section('title', $comic['name'] ?? 'Comic Details')

@section('content')
<div class="container mt-4">
    <h1 class="display-4">{{ $comic['name'] }}</h1>
    <img src="https://otruyenapi.com/uploads/comics/{{ $comic['thumb_url'] }}" alt="{{ $comic['name'] }} Thumbnail" class="img-fluid mb-4">
    <h5>Status: {{ ucfirst($comic['status']) }}</h5>

    <h4>Latest Chapter</h4>
    @if(isset($comic['chaptersLatest']) && count($comic['chaptersLatest']) > 0)
        <a href="{{ route('comics.chapter', $comic['_id']) }}" class="btn btn-secondary">View All Chapters</a>
        @foreach($comic['chaptersLatest'] as $chapter)
            <a href="{{ $chapter['chapter_api_data'] }}" class="btn btn-primary">
                {{ $chapter['filename'] }}
            </a>
        @endforeach
    @else
        <p>No chapters available.</p>
    @endif
</div>
@endsection
