@php
    $generalSettings = app(\App\Settings\GeneralSettings::class);
    $contactSettings = app(\App\Settings\ContactSettings::class);
@endphp
@extends('layouts.app')

@section('title', 'Kontakta oss - Edens Gröna')

@section('content')
    <!-- Simple Header matching website style -->
    <div class="contact-header" style="background: linear-gradient(135deg, var(--mygreen) 0%, #388E3C 100%); padding: 60px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="text-white mb-3" style="font-size: 3rem; font-weight: 700;">Kontakta oss!</h1>
                    <p class="text-white mb-0" style="font-size: 1.25rem; opacity: 0.95;">Fyll i formuläret för att få
                                                                                          en kostnadsfri offert</p>
                </div>
                <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
                    <a href="tel:{{$contactSettings->phone}}" class="btn btn-light btn-lg shadow-sm"
                       style="border-radius: 50px; padding: 15px 40px; font-size: 1.5rem; font-weight: 700;">
                        {{$contactSettings->phone}}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form Section -->
    <div class="container" style="max-width: 800px; margin-top: -30px; margin-bottom: 80px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert"
                 style="border-left: 4px solid var(--mygreen); border-radius: 10px;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle fa-2x me-3" style="color: var(--mygreen);"></i>
                    <div>
                        <strong>Tack för ditt meddelande!</strong>
                        <p class="mb-0">{{ session('success') }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert"
                 style="border-left: 4px solid #dc3545; border-radius: 10px;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-circle fa-2x me-3 text-danger"></i>
                    <div>
                        <strong>Ett fel uppstod</strong>
                        <p class="mb-0">{{ session('error') }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert"
                 style="border-left: 4px solid #dc3545; border-radius: 10px;">
                <div class="d-flex align-items-start">
                    <i class="fas fa-exclamation-triangle fa-2x me-3 text-danger"></i>
                    <div class="flex-grow-1">
                        <strong>Vänligen rätta följande fel:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Main Form Card -->
        <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data"
                      id="contactForm">
                    @csrf

                    <!-- Personal Information -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">Förnamn <span
                                    class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control @error('first_name') is-invalid @enderror"
                                id="first_name"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                placeholder="Förnamn"
                                required
                                style="padding: 12px; border-radius: 8px;"
                            >
                            @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Efternamn <span
                                    class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control @error('last_name') is-invalid @enderror"
                                id="last_name"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                placeholder="Efternamn"
                                required
                                style="padding: 12px; border-radius: 8px;"
                            >
                            @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="mb-4">
                        <label for="email" class="form-label">E-post <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: #f5f5f5; border-right: 0;">
                                <i class="fas fa-envelope" style="color: var(--mygreen);"></i>
                            </span>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="E-post"
                                required
                                style="padding: 12px; border-radius: 0 8px 8px 0; border-left: 0;"
                            >
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label">Telefonnummer <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: #f5f5f5; border-right: 0;">
                                <i class="fas fa-phone" style="color: var(--mygreen);"></i>
                            </span>
                            <input
                                type="tel"
                                class="form-control @error('phone') is-invalid @enderror"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="Telefonnummer"
                                required
                                style="padding: 12px; border-radius: 0 8px 8px 0; border-left: 0;"
                            >
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="form-label">Adress <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: #f5f5f5; border-right: 0;">
                                <i class="fas fa-map-marker-alt" style="color: var(--mygreen);"></i>
                            </span>
                            <input
                                type="text"
                                class="form-control @error('address') is-invalid @enderror"
                                id="address"
                                name="address"
                                value="{{ old('address') }}"
                                placeholder="Adress"
                                required
                                style="padding: 12px; border-radius: 0 8px 8px 0; border-left: 0;"
                            >
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="city" class="form-label">Stad/tätort <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control @error('city') is-invalid @enderror"
                                id="city"
                                name="city"
                                value="{{ old('city') }}"
                                placeholder="Stad/tätort"
                                required
                                style="padding: 12px; border-radius: 8px;"
                            >
                            @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="postal_code" class="form-label">Postnummer <span
                                    class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control @error('postal_code') is-invalid @enderror"
                                id="postal_code"
                                name="postal_code"
                                value="{{ old('postal_code') }}"
                                placeholder="Postnummer"
                                required
                                style="padding: 12px; border-radius: 8px;"
                            >
                            @error('postal_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Customer Type -->
                    <div class="mb-4">
                        <label class="form-label">Är du privat fastighetsägare eller företräder du ett företag eller en
                                                  bostadsrättsförening? <span class="text-danger">*</span></label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="customer_type"
                                    id="customer_type_private"
                                    value="private"
                                    {{ old('customer_type', 'private') == 'private' ? 'checked' : '' }}
                                    required
                                    style="width: 20px; height: 20px; border-color: var(--mygreen);"
                                >
                                <label class="form-check-label ms-2" for="customer_type_private"
                                       style="font-size: 1rem;">
                                    Privatperson
                                </label>
                            </div>
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="customer_type"
                                    id="customer_type_company"
                                    value="company"
                                    {{ old('customer_type') == 'company' ? 'checked' : '' }}
                                    style="width: 20px; height: 20px; border-color: var(--mygreen);"
                                >
                                <label class="form-check-label ms-2" for="customer_type_company"
                                       style="font-size: 1rem;">
                                    Företag eller bostadsrättsförening
                                </label>
                            </div>
                        </div>
                        @error('customer_type')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Help Needed -->
                    <div class="mb-4">
                        <label for="help_needed" class="form-label">Berätta gärna vad du behöver hjälp med <span
                                class="text-danger">*</span></label>
                        <textarea
                            class="form-control @error('help_needed') is-invalid @enderror"
                            id="help_needed"
                            name="help_needed"
                            rows="5"
                            placeholder="Berätta gärna vad du behöver hjälp med *"
                            required
                            style="padding: 12px; border-radius: 8px;"
                        >{{ old('help_needed') }}</textarea>
                        @error('help_needed')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Measurements -->
                    <div class="mb-4">
                        <label for="measurements" class="form-label">Vill du ange mått? Skriv dem gärna här</label>
                        <textarea
                            class="form-control @error('measurements') is-invalid @enderror"
                            id="measurements"
                            name="measurements"
                            rows="3"
                            placeholder="Vill du ange mått? Skriv dem gärna här"
                            style="padding: 12px; border-radius: 8px;"
                        >{{ old('measurements') }}</textarea>
                        @error('measurements')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Additional Message -->
                    <div class="mb-4">
                        <label for="message" class="form-label">Ytterligare meddelande (valfritt)</label>
                        <textarea
                            class="form-control @error('message') is-invalid @enderror"
                            id="message"
                            name="message"
                            rows="3"
                            placeholder="Finns det något mer du vill berätta?"
                            style="padding: 12px; border-radius: 8px;"
                        >{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- File Upload -->
                    <div class="mb-5">
                        <label class="form-label">Om du vill kan du bifoga bilder här</label>
                        <div class="upload-box"
                             style="border: 2px dashed var(--mygreen); border-radius: 12px; padding: 40px; text-align: center; background-color: #f9f9f9;">
                            <div class="mb-3">
                                <i class="fas fa-cloud-upload-alt" style="font-size: 3rem; color: var(--mygreen);"></i>
                            </div>
                            <p class="mb-3" style="color: var(--mygreen); font-weight: 600;">Dra och släpp filer här eller
                                                                                      klicka för att välja</p>
                            <input
                                type="file"
                                class="form-control @error('attachments.*') is-invalid @enderror"
                                id="attachments"
                                name="attachments[]"
                                multiple
                                accept=".jpg,.jpeg,.png,.pdf"
                                style="cursor: pointer;"
                            >
                            <small class="text-muted d-block mt-3">Max filstorlek 10 MB per fil. Godkända format: JPG,
                                                                   PNG, PDF</small>
                            @error('attachments.*')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="fileList" class="mt-3"></div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg px-5 py-3 shadow"
                                style="background-color: var(--mygreen); border: none; color: white; border-radius: 50px; font-size: 1.25rem; font-weight: 700; min-width: 250px;">
                            Skicka förfrågan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .form-control:focus,
        .form-check-input:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }

        .form-check-input:checked {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .input-group-text {
            border-color: #dee2e6;
        }

        .upload-box {
            transition: all 0.3s ease;
        }

        .upload-box:hover {
            background-color: #f0f8f0 !important;
            border-color: #388E3C !important;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4) !important;
        }

        .alert {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #fileList .file-item {
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #fileList .file-item i {
            color: #4CAF50;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // File upload preview
        document.getElementById('attachments').addEventListener('change', function (e) {
            const fileList = document.getElementById('fileList');
            fileList.innerHTML = '';

            if (this.files.length > 0) {
                Array.from(this.files).forEach(file => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'file-item';

                    const icon = file.type.includes('pdf') ? 'fa-file-pdf' : 'fa-image';
                    const size = (file.size / 1024).toFixed(2);

                    fileItem.innerHTML = `
                        <i class="fas ${icon}"></i>
                        <span class="flex-grow-1">${file.name}</span>
                        <small class="text-muted">${size} KB</small>
                    `;

                    fileList.appendChild(fileItem);
                });
            }
        });
    </script>
@endpush
