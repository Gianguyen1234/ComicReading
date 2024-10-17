<!-- resources/views/home.blade.php -->

@extends('layout')

@section('title', $seoOnPage['titleHead'] ?? 'Danh sách truyện')

@section('meta_description')
    <meta name="description" content="{{ $seoOnPage['descriptionHead'] ?? 'Website cung cấp truyện tranh miễn phí chất lượng cao.' }}">
@endsection

@section('og_tags')
    <meta property="og:type" content="{{ $seoOnPage['og_type'] ?? 'website' }}">
    @if(isset($seoOnPage['og_image']) && count($seoOnPage['og_image']) > 0)
        @foreach($seoOnPage['og_image'] as $ogImage)
            <meta property="og:image" content="https://otruyenapi.com{{ $ogImage }}">
        @endforeach
    @endif
@endsection

@section('content')
<div class="container mt-4">
    <div class="row mb-4 text-center">
        <div class="col">
            <h1 class="display-4">{{ $seoOnPage['titleHead'] ?? 'Danh sách truyện' }}</h1>
            <p class="lead">{{ $seoOnPage['descriptionHead'] ?? 'Danh sách truyện tranh mới nhất, cập nhật nhanh chóng.' }}</p>
        </div>
    </div>

    @if(count($comics) > 0)
        <div class="row">
            @foreach($comics as $comic)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <a href="{{ route('comics.show', $comic['_id']) }}">
                            <img class="card-img-top img-fluid comic-image" src="https://otruyenapi.com/uploads/comics/{{ $comic['thumb_url'] }}" alt="{{ $comic['name'] }} Thumbnail">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('comics.show', $comic['_id']) }}" class="text-decoration-none">{{ $comic['name'] }}</a>
                            </h5>
                            <p class="card-text text-muted">Trạng thái: {{ ucfirst($comic['status']) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            <div class="col text-center">
                <p class="text-muted">Không có truyện nào để hiển thị.</p>
            </div>
        </div>
    @endif
</div>
@endsection
