@extends('layouts.master')

@section('main-content')
<!-- Hero Section -->
<div class="bg-primary bg-img-hero mx-n4" style="background-image: url(https://wallpapercave.com/wp/wp7487062.jpg);">
    <div class="container space-1 space-lg-2"></div>
    <div class="container space-1 space-lg-1">
        <div class="w-lg-65 text-center mx-lg-auto mt-4">
            <h1 class="text-white shadow">Characters</h1>
            <form class="input-group input-group-merge input-group-borderless">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="askQuestions">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                <input type="search" class="form-control" placeholder="Search for answers"
                    aria-label="Search for answers" aria-describedby="askQuestions">
            </form>
        </div>
    </div>
</div>
<!-- End Hero Section -->
<!-- Cards Section -->
<div class="container space-2">
    <!-- Title -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">All Characters</h3>
        <a class="font-size-1 font-weight-bold" href="#">View All <i class='fas fa-angle-right fa-sm ml-1'></i></a>
    </div>
    <!-- End Title -->

    <div class="row mx-n2">
        <!-- Card -->
        @foreach ($list as $char)
        <div class="col-sm-6 col-md-3 px-2 mb-3">
            <div class="card card-frame h-100">
                <a class="card-body" href="{{ route('genshin.characters.detail',$char->name) }}">
                    <div class="media">
                        <div class="avatar avatar-sm mt-1 mr-3">
                            <img class="avatar-img" src="{{ $char->icon }}" alt="Image Description">
                        </div>
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                <span class="d-block text-dark font-weight-bold">{{ $char->name }}</span>
                                <img class="ml-2" src="{{ $char->elements_image }}" alt="Image Description"
                                    title="Top Vendor" width="16">
                            </div>
                            <small class="d-block text-body">{{ $char->elements }}</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        <!-- End Card -->
    </div>
</div>
<!-- End Cards Section -->
@endsection