@extends('layouts.app')

<head>
    <title>Obituaries</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta property="og:title" content="{{ $obituaries->first()->name ?? 'Default Title' }}" />
    <meta property="og:description" content="{{ Str::limit($obituaries->first()->content ?? '', 100) }}" />
    <meta property="og:image" content="{{ $obituaries->first()->image_url ?? asset('default-image.jpg') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />

    <!-- For Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $obituaries->first()->name ?? 'Default Title' }}">
    <meta name="twitter:description" content="{{ Str::limit($obituaries->first()->content ?? '', 100) }}">
    <meta name="twitter:image" content="{{ $obituaries->first()->image_url ?? asset('default-image.jpg') }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
</head>

@section('content')
<div class="container2">
    <h1>Obituaries</h1>
    <div class="row">
        @foreach($obituaries as $obituary)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $obituary->name }}</h5>
                    <p class="card-text">{{ $obituary->content }}</p>
                    <p class="text-muted">
                        <small>Author: {{ $obituary->author }}</small><br>
                        <small>Date of Death: {{ $obituary->date_of_death->format('F j, Y') }}</small>
                    </p>
                </div>
                <div class="social-buttons">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}&quote={{ urlencode($obituary->name) }}" target="_blank" class="btn btn-facebook">Share on Facebook</a>

                    <!-- Twitter -->
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($obituary->name . ' - ' . Str::limit($obituary->content, 100)) }}" target="_blank" class="btn btn-twitter">Share on Twitter</a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-linkedin">Share on LinkedIn</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection