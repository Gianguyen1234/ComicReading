@extends('layout')

@section('title', $chapterDetails['chapter_name'] ?? 'Chapter Details')

@section('content')
<div class="container mt-4">
    <h1>{{ $chapterDetails['comic_name'] }} - Chapter {{ $chapterDetails['chapter_name'] }}</h1>

    @if(!empty($chapterDetails['chapter_title']))
        <h5>{{ $chapterDetails['chapter_title'] }}</h5>
    @endif

    <div class="chapter-images">
        @foreach($imageUrls as $url)
            <img src="{{ $url }}" alt="Chapter Image" class="img-fluid mb-4">
        @endforeach
    </div>

    <a href="{{ route('comics.show', $chapterDetails['_id']) }}" class="btn btn-secondary">Back to Comic</a>
</div>
@endsection
