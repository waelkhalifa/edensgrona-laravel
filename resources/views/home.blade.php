@extends('layouts.app')

@section('title', 'Edens Gröna - Hem')
@push('styles')
    <style>
        .hero-section {
            position: relative;
            width: 100%;
            height: 85vh;
            min-height: 600px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .video-container {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            z-index: 0;
        }

        .hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.3) 0%,
                rgba(0, 0, 0, 0.5) 100%
            );
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            padding: 2rem 0;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 700;
            line-height: 1.2;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.75rem;
            font-weight: 400;
            line-height: 1.6;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.8);
            opacity: 0.95;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 3rem;
            }

            .hero-subtitle {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 500px;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.25rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }
        }

        /* Ensure video covers properly on all devices */
        @media (max-aspect-ratio: 16/9) {
            .hero-video {
                width: auto;
                height: 100%;
            }
        }

        @media (min-aspect-ratio: 16/9) {
            .hero-video {
                width: 100%;
                height: auto;
            }
        }
    </style>
@endpush

@section('content')
    @if($heroSettings->is_active)
        <section class="hero-section">
            <!-- Background Video -->
            <div class="video-container">
                <video autoplay muted loop playsinline class="hero-video">
                    <source src="{{ $heroSettings->background_video_path }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Overlay -->
            <div class="hero-overlay"></div>

            <!-- Content -->
            {{--<div class="hero-content">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-10">
                            @if($hero->title)
                                <h1 class="hero-title text-white mb-4" data-aos="fade-up">
                                    {{ $hero->title }}
                                </h1>
                            @endif

                            @if($hero->subtitle)
                                <p class="hero-subtitle text-white" data-aos="fade-up" data-aos-delay="100">
                                    {{ $hero->subtitle }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>--}}
        </section>
    @endif

    {{-- Service cards - DYNAMIC --}}
    <div class="container content-space-1">
        <!-- Tags -->
        <div class="proje-msj mb-6">
            <h2 class="text-center">
                Vilken trädgårdstjänst söker du?
            </h2>
            <p class="text-center">
                Vi erbjuder ett omfattande utbud av tjänster som hjälper dig att förverkliga din drömträdgård.
                <br>
                🌿Stora och små projekt
            </p>
        </div>

        <div class="row" id="card-1">
            @forelse($services as $index => $service)
                <div class="order-lg-0 col-sm-6 col-lg-4 mb-3 mb-sm-7 home-article-card" id="card{{ $index + 1 }}">
                    <!-- Card -->
                    <a class="card card-stretched-vertical card-transition service-card-hover"
                       href="#!"
                       style="background-image: url({{ $service->hasMedia('image') ? $service->image_url : asset('assets/img/default-service.jpg') }});
                          min-height: 25rem;
                          background-position: center;
                          background-size: cover;
                          position: relative;
                          overflow: hidden;">

                        <!-- Enhanced Overlay -->
                        <div class="service-card-overlay"></div>

                        <div class="card-footer"
                             style="position: relative; z-index: 2; bottom: 0; top: auto; margin-top: auto;">
                            @if($service->icon)
                                <i class="{{ $service->icon }} text-white mb-2" style="font-size: 2rem;"></i>
                            @endif
                            <h3 class="card-title text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                {{ $service->title }}
                            </h3>
                            @if($service->description)
                                <p class="text-white small d-none d-lg-block"
                                   style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">
                                    {{ Str::limit($service->description, 80) }}
                                </p>
                            @endif
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Inga tjänster tillgängliga för tillfället.</p>
                </div>
            @endforelse
        </div>
        <!-- End Row -->
    </div>

    {{-- Process Steps Section --}}
    <div class="position-relative bg-dark"
         style="background-image: url({{ asset('assets/img/wave-pattern-light.svg') }});">
        <div class="container text-center content-space-3">
            <div class="proje-msj mt-4 mb-5">
                <div class="text-center mx-md-auto mb-md-9">
                    <h2 class="text-white">Så här går det till – Enkel och smidig process för din drömträdgård</h2>
                    <span class="text-white-70">Vi förstår vikten av att snabbt förverkliga dina trädgårds idéer. Därför erbjuder vi en effektiv och smidig process – från första kontakt till färdigt resultat. Så här går det till</span>
                </div>
            </div>

            <!-- Dynamic Process Steps -->
            <div class="container content-space-1 content-space-lg-1">
                <div class="row justify-content-lg-center align-items-stretch">
                    @foreach($steps as $step)
                        <div class="col-md-6 col-lg-5 mb-3 mb-md-7">
                            <!-- Icon Blocks -->
                            <div class="card p-3 h-100">
                                <div class="d-flex pe-lg-5 text-start" data-aos="fade-up"
                                     data-aos-delay="{{ $step->step_number * 100 }}">
                                    <div class="flex-shrink-0">
                                        <span class="svg-icon text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                 viewBox="0 0 50 50">
                                                <text x="10" y="40" font-family="Arial" font-size="40"
                                                      fill="green">{{ $step->step_number }}</text>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h4>{{ $step->title }}</h4>
                                        <p>{{ $step->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Icon Blocks -->
                        </div>

                        @if($loop->iteration % 2 == 0 && !$loop->last)
                            <div class="w-100"></div>
                        @endif
                    @endforeach
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>

    <!-- Feature Stats -->
    <div class="container mt-10">
        <div class="row justify-content-lg-center home-article p-3">
            <div class="col-sm-4 col-lg-3 mb-4 mb-sm-0">
                <div class="text-center home-article-card"
                     style="box-shadow: 1px 2px 5px 0px rgba(0, 0, 0, 0.559); padding: 9px; background-color: var(--mygreen); border-radius: 8px;">
                    <h2 class="display-4">
                        <i class="far fa-heart white"></i>
                    </h2>
                    <h3 class="f-color white">Kärlek</h3>
                </div>
            </div>

            <!-- End Col -->
            <div class="col-sm-4 col-lg-3 mb-4">
                <div class="text-center home-article-card"
                     style="box-shadow: 1px 1px 3px 0px var(--mygreen); padding: 9px; background-color: var(--mygreen); border-radius: 8px;">
                    <h2 class="display-4">
                        <i class="fa-solid fa-book white fa-md mb-1"></i>
                    </h2>
                    <h3 class="white">Kunskap</h3>
                </div>
            </div>
            <!-- End Col -->
            <div class="col-sm-4 col-lg-3">
                <div class="text-center home-article-card"
                     style="box-shadow: 1px 2px 5px 0px var(--mygreen); padding: 9px; background-color: var(--mygreen); border-radius: 8px;">
                    <h2 class="display-4 counter">
                        <i class="fa-solid fa-medal white fa-md mb-1"></i>
                    </h2>
                    <h3 class="f-color white">Kvalitet</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Feature Stats -->

    <!--video slider-->
    <div class="container text-center content-space-lg-1" id="videos">
        <div class="proje-msj mt-4 mb-5">
            <h2 class="text-center">
                Din blivande trädgårdsmästare
                <br>
                Vi fixar din trädgård till perfektion
            </h2>
        </div>
        <section class="video-slid mb-7">
            <video id="slider" autoplay muted loop>
                <source src="{{ asset('assets/video/slide-3.mp4') }}" type="video/mp4">
            </video>
            <ul class="list-inline d-block navigation">
                <li onclick="videoUrl('{{ asset('assets/video/slide-4.mp4') }}')" class="white">
                    <i class="fa-solid fa-1"></i>
                </li>
                <li onclick="videoUrl('{{ asset('assets/video/slide-2.mp4') }}')" class="white">
                    <i class="fa-solid fa-2"></i>
                </li>
                <li onclick="videoUrl('{{ asset('assets/video/slide-1.mp4') }}')" class="white">
                    <i class="fa-solid fa-3"></i>
                </li>
                <li onclick="videoUrl('{{ asset('assets/video/slide-5.mp4') }}')" class="white">
                    <i class="fa-solid fa-4"></i>
                </li>
            </ul>
        </section>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        function videoUrl(hmmm) {
            document.getElementById("slider").src = hmmm;
        }
    </script>
@endpush
