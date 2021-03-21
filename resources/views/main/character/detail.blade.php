@extends('layouts.master')

@section('main-content')
<!-- Hero Section -->
<div class="bg-primary bg-img-hero mx-n4" style="background-image: url(https://wallpapercave.com/wp/wp7487062.jpg);">
    <div class="container space-2 space-lg-3">
        <div class="w-lg-65 text-center mx-lg-auto mt-4">
            <h1 class="text-white shadow">Characters</h1>
        </div>
    </div>
</div>
<!-- End Hero Section -->
{{-- {{ dd($data) }} --}}
<!-- Description Section -->
<div class="container space-2">
    <div class="row">
        <div class="col-lg-5 mb-7 mb-lg-0">
            <img class="img-fluid" src="{{ $imageData }}" alt="">
        </div>

        <div id="stickyBlockStartPoint" class="col-lg-7">
            <!-- Sticky Block -->
            <div class="js-sticky-block pl-lg-4">
                <div class="mb-6">
                    <h1 class="h2">{{ $data['name'] }}</h1>
                    <p>{{ $data['description'] }}</p>
                </div>

                <li class="media mb-1">
                    <div class="d-flex w-40 w-sm-30">
                        <h2 class="h5">Birthday</h2>
                    </div>
                    <div class="media-body">
                        {{ \Carbon\Carbon::parse($data['birthday'])->format('d M Y') }}
                    </div>
                </li>

                <hr class="my-5">

                <!-- List -->
                <ul class="list-unstyled mb-0">
                    <li class="media mb-1">
                        <div class="d-flex w-40 w-sm-30">
                            <h2 class="h5">Vision</h2>
                        </div>
                        <div class="media-body">
                            {{ $data['vision'] }}
                        </div>
                    </li>

                    <li class="media mb-1">
                        <div class="d-flex w-40 w-sm-30">
                            <h3 class="h5">Weapon</h3>
                        </div>
                        <div class="media-body">
                            {{ $data['weapon'] }}
                        </div>
                    </li>

                    <li class="media mb-1">
                        <div class="d-flex w-40 w-sm-30">
                            <h4 class="h5">Nation</h4>
                        </div>
                        <div class="media-body">
                            {{ $data['nation'] }}
                        </div>
                    </li>

                    <li class="media">
                        <div class="d-flex w-40 w-sm-30">
                            <h5>Rarity</h5>
                        </div>
                        <div class="media-body">
                            @for ($i = 0; $i < $data['rarity']; $i++) <i class="fas fa-star"></i>
                                @endfor
                        </div>
                    </li>
                </ul>
                <!-- End List -->

                <hr class="my-5">

                <div class="media">
                    <div class="d-flex w-40 w-sm-30">
                        <h5>Share</h5>
                    </div>

                    <div class="media-body">
                        <!-- Social Networks -->
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                                    <i class="fab fa-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                                    <i class="fab fa-github"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Social Networks -->
                    </div>
                </div>
            </div>
            <!-- End Sticky Block -->
        </div>
    </div>
    <div class="row">
        @foreach ($data['skillTalents'] as $skill)
            <div class="col-lg-4 mb-3 mb-lg-5">
                <a class="card card-frame h-100" href="#">
                    <div class="card-body">
                        <!-- Icon Block -->
                        <div class="media d-block d-sm-flex">
                            {{-- <figure class="w-100 max-w-8rem mb-2 mb-sm-0 mr-sm-4">
                                <img class="img-fluid" src="https://htmlstream.com/front/assets/svg/icons/icon-1.svg" alt="SVG">
                            </figure> --}}
                            <div class="media-body">
                                <small class="text-muted">{{ $skill['unlock'] }}</small>
                                <h2 class="h3">{{ $skill['name'] }} </h2>
                                <p class="font-size-1 text-body">{{ $skill['description'] }}</p>
                            </div>
                        </div>
                        <!-- End Icon Block -->
                    </div>
                </a>
            </div>
        @endforeach
        @foreach ($data['passiveTalents'] as $skill)
            <div class="col-lg-4 mb-3 mb-lg-5">
                <a class="card card-frame h-100" href="#">
                    <div class="card-body">
                        <!-- Icon Block -->
                        <div class="media d-block d-sm-flex">
                            {{-- <figure class="w-100 max-w-8rem mb-2 mb-sm-0 mr-sm-4">
                                <img class="img-fluid" src="https://htmlstream.com/front/assets/svg/icons/icon-1.svg" alt="SVG">
                            </figure> --}}
                            <div class="media-body">
                                <small class="text-muted">{{ $skill['unlock'] }}</small>
                                <h2 class="h3">{{ $skill['name'] }} </h2>
                                <p class="font-size-1 text-body">{{ $skill['description'] }}</p>
                            </div>
                        </div>
                        <!-- End Icon Block -->
                    </div>
                </a>
            </div>
        @endforeach
        
    </div>
</div>
<!-- End Description Section -->
@endsection