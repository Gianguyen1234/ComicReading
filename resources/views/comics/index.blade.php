<!-- resources/views/comics/index.blade.php -->
@extends('layout') <!-- Assuming you have a layout file -->

@section('title', 'Danh sách Truyện')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 text-center">
        <div class="col">
            <h1 class="display-4">Danh sách Truyện</h1>
            <p class="lead">Danh sách truyện tranh mới nhất, cập nhật nhanh chóng.</p>
        </div>
    </div>

    @if(count($comics) > 0)
        <div class="row">
            @foreach($comics as $comic)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <a href="{{ route('comics.show', $comic['_id']) }}">
                            <img class="card-img-top img-fluid" src="https://otruyenapi.com/uploads/comics/{{ $comic['thumb_url'] }}" alt="{{ $comic['name'] }} Thumbnail">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('comics.show', $comic['_id']) }}" class="text-decoration-none">{{ $comic['name'] }}</a>
                            </h5>
                            <p class="card-text text-muted">Status: {{ ucfirst($comic['status']) }}</p>
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
