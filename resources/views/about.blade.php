@extends('layouts.app')

@section('title', $aboutSettings->title . ' - Edens Gröna')

@section('content')
    <!-- Modern Header Section -->
    <div class="about-header"
         style="background: linear-gradient(135deg, #4CAF50 0%, #388E3C 100%); padding: 80px 0 60px; position: relative; overflow: hidden;">
        <!-- Decorative Elements -->
        <div
            style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
        <div
            style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>

        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center text-white">
                    <h1 class="display-3 fw-bold mb-3 text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">
                        {{ $aboutSettings->title }}
                    </h1>
                    @if($aboutSettings->subtitle)
                        <p class="lead mb-0" style="font-size: 1.25rem; opacity: 0.95;">
                            {{ $aboutSettings->subtitle }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="container" style="margin-top: -40px; margin-bottom: 80px;">
        <div class="row g-4">
            <!-- Image Card -->
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 h-100"
                     style="border-radius: 20px; overflow: hidden; position: sticky; top: 100px;">
                    @if($aboutSettings->image_path)
                        <img src="{{ Storage::url($aboutSettings->image_path) }}"
                             alt="{{ $aboutSettings->title }}"
                             class="card-img-top"
                             style="height: 500px; object-fit: cover;">
                    @else
                        <img src="/assets/img/about-us-image.jpeg"
                             alt="Edensgrona"
                             class="card-img-top"
                             style="height: 500px; object-fit: cover;">
                    @endif

                    <!-- Optional: Add overlay with company info -->
                    <div class="card-img-overlay d-flex align-items-end"
                         style="background: linear-gradient(to top, rgb(255,255,255) 0%, transparent 50%);">
                        <div class="text-white p-3">
                            <h4 class="fw-bold mb-2">Edens Gröna</h4>
                            <p class="mb-0 small">Din partner för trädgårdstjänster</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Card -->
            <div class="col-lg-7">
                <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                    <div class="card-body p-4 p-md-5">
                        <div class="about-content">
                            {!! $aboutSettings->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional: Call to Action -->
    <div class="container mb-5">
        <div class="card shadow-lg border-0"
             style="border-radius: 20px; background: linear-gradient(135deg, #4CAF50 0%, #388E3C 100%); overflow: hidden;">
            <div class="card-body p-5 text-center text-white">
                <h2 class="fw-bold mb-3">Redo att börja ditt projekt?</h2>
                <p class="lead mb-4">Kontakta oss idag för en kostnadsfri konsultation och offert</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-5 py-3 shadow"
                       style="border-radius: 50px; font-weight: 700;">
                        <i class="fas fa-envelope me-2"></i>
                        Kontakta oss
                    </a>
                    <a href="tel:{{ app(\App\Settings\ContactSettings::class)->phone }}"
                       class="btn btn-outline-light btn-lg px-5 py-3"
                       style="border-radius: 50px; font-weight: 700; border-width: 2px;">
                        <i class="fas fa-phone me-2"></i>
                        Ring oss
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Content Styling */
        .about-content {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #333;
        }

        .about-content p {
            margin-bottom: 1.25rem;
        }

        .about-content p:first-of-type {
            font-size: 1.15rem;
            font-weight: 500;
            color: #4CAF50;
        }

        .about-content h2,
        .about-content h3,
        .about-content h4 {
            color: #4CAF50;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .about-content h2 {
            font-size: 2rem;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 0.5rem;
            display: inline-block;
        }

        .about-content h3 {
            font-size: 1.5rem;
        }

        .about-content h4 {
            font-size: 1.25rem;
        }

        .about-content ul,
        .about-content ol {
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .about-content li {
            margin-bottom: 0.75rem;
            padding-left: 0.5rem;
        }

        .about-content ul li::marker {
            color: #4CAF50;
            font-size: 1.2em;
        }

        .about-content ol li::marker {
            color: #4CAF50;
            font-weight: 700;
        }

        .about-content a {
            color: #4CAF50;
            text-decoration: underline;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .about-content a:hover {
            color: #388E3C;
            text-decoration: none;
        }

        .about-content blockquote {
            border-left: 4px solid #4CAF50;
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: #555;
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
        }

        .about-content strong,
        .about-content b {
            color: #388E3C;
            font-weight: 700;
        }

        .about-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Card Hover Effects */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15) !important;
        }

        /* Button Hover Effects */
        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2) !important;
        }

        /* Responsive Adjustments */
        @media (max-width: 991px) {
            .about-header {
                padding: 60px 0 40px !important;
            }

            .about-header h1 {
                font-size: 2.5rem !important;
            }

            .card-img-top {
                height: 300px !important;
            }

            .about-content {
                font-size: 1rem;
            }

            .about-content h2 {
                font-size: 1.75rem;
            }

            .about-content h3 {
                font-size: 1.35rem;
            }
        }

        @media (max-width: 576px) {
            .about-header h1 {
                font-size: 2rem !important;
            }

            .about-header .lead {
                font-size: 1rem !important;
            }

            .card-body {
                padding: 1.5rem !important;
            }
        }

        /* Animation */
        .about-header {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Sticky Image on Desktop */
        @media (min-width: 992px) {
            .sticky-top {
                top: 100px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Smooth scroll animation for content
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
@endpush
