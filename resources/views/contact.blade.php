@php
    $generalSettings = app(\App\Settings\GeneralSettings::class);
    $contactSettings = app(\App\Settings\ContactSettings::class);
@endphp
@extends('layouts.app')

@section('title', 'Kontakta oss - Edens Gröna')

@section('content')
    <div class="container content-space-t-1">
        <div class="w-lg-75 text-center mx-lg-auto">
            <div class="mb-3">
                <h1 class="display-3" style="color: var(--mygreen);">Kontakta oss</h1>
                <p class="lead">Vi ser fram emot att höra från dig!</p>
            </div>
        </div>
    </div>

    <div class="mx-auto" style="max-width: 25rem; border-top: var(--mygreen) 1px solid;"></div>

    <div class="container content-space-1">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-7 mb-5 mb-lg-0">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Vänligen rätta följande fel:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="mb-4" style="color: var(--mygreen);">Skicka ett meddelande</h3>

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name" class="form-label">Förnamn <span
                                            class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        id="first_name"
                                        name="first_name"
                                        value="{{ old('first_name') }}"
                                        required
                                    >
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="last_name" class="form-label">Efternamn <span
                                            class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        id="last_name"
                                        name="last_name"
                                        value="{{ old('last_name') }}"
                                        required
                                    >
                                    @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-post <span class="text-danger">*</span></label>
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                >
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefon</label>
                                <input
                                    type="tel"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                >
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Meddelande <span
                                        class="text-danger">*</span></label>
                                <textarea
                                    class="form-control @error('message') is-invalid @enderror"
                                    id="message"
                                    name="message"
                                    rows="5"
                                    required
                                >{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100"
                                    style="background-color: var(--mygreen); border-color: var(--mygreen);">
                                <i class="fas fa-paper-plane me-2"></i>
                                Skicka meddelande
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-5">
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h3 class="mb-4" style="color: var(--mygreen);">Kontaktinformation</h3>

                        <div class="mb-4">
                            <h5><i class="fas fa-envelope me-2" style="color: var(--mygreen);"></i>E-post</h5>
                            <p class="mb-0">
                                <a href="mailto:{{$contactSettings->email}}">{{$contactSettings->email}}</a>
                            </p>
                        </div>

                        <div class="mb-4">
                            <h5><i class="fas fa-phone me-2" style="color: var(--mygreen);"></i>Telefon</h5>
                            <p class="mb-0">
                                <a href="tel:{{$contactSettings->phone}}">{{$contactSettings->phone}}</a>
                            </p>
                        </div>

                        <div class="mb-4">
                            <h5><i class="fas fa-map-marker-alt me-2" style="color: var(--mygreen);"></i>Adress</h5>
                            <iframe
                                src="{{$generalSettings->google_reviews_url}}"
                                width="100%" height="250px" style="border:0px;border-radius: 10px" allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .btn-outline-success {
            color: var(--mygreen);
            border-color: var(--mygreen);
        }

        .btn-outline-success:hover {
            background-color: var(--mygreen);
            border-color: var(--mygreen);
            color: white;
        }

        .form-control:focus {
            border-color: var(--mygreen);
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .alert {
            border-radius: 10px;
        }
    </style>
@endpush
