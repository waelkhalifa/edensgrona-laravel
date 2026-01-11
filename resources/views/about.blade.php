@extends('layouts.app')

@section('title', $aboutSettings->title . ' - Edens Gröna')

@section('content')
    <!-- Header Section -->
    <div class="container content-space-t-1">
        <div class="w-lg-75 text-center mx-lg-auto">
            <div class="mb-3">
                <h1 class="display-3" style="color: var(--mygreen);">{{ $aboutSettings->title }}</h1>
                @if($aboutSettings->subtitle)
                    <p class="lead mt-3">{{ $aboutSettings->subtitle }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="mx-auto" style="max-width: 25rem; border-top: var(--mygreen) 1px solid;"></div>

    <!-- Main Content -->
    <div class="container content-space-1">
        <div class="justify-content-lg-between about-us-p" id="about-us-p">
            <div class="about-us-img" id="div1">
                @if($aboutSettings->image_path)
                    <img src="{{ Storage::url($aboutSettings->image_path) }}" alt="{{ $aboutSettings->title }}">
                @else
                    <img src="/assets/img/about-us-image.jpeg" alt="Edensgrona">
                @endif
            </div>
            <div class="p-5 text-start">
                <div class="f-color about-content">
                    {!! $aboutSettings->content !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .about-content p {
            margin-bottom: 1rem;
        }

        .about-content h2,
        .about-content h3 {
            color: var(--mygreen);
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        .about-content ul,
        .about-content ol {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .about-content a {
            color: var(--mygreen);
            text-decoration: underline;
        }

        .about-content a:hover {
            color: var(--mygreen-dark);
        }

        .about-us-img img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

