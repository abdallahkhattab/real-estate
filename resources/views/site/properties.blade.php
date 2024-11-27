@extends('site.master')

@section('title', 'Properties | ' . env('APP_NAME'))

@section('content')
    <div class="hero page-inner overlay" style="background-image: url('{{ asset('siteassets/images/hero_bg_1.jpg') }}')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Properties</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Properties
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6 text-center mx-auto">
                    <h2 class="font-weight-bold text-primary heading">
                        Featured Properties
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">

                            @foreach ($properties as $property)
                                <div class="property-item">
                                    <a href="property-single.html" class="img">
                                        <img src="{{ asset('uploads/' . $property->main_image) }}" alt="Image"
                                            class="img-fluid" />
                                    </a>

                                    <div class="property-content">
                                        <div class="price mb-2"><span>${{ $property->price }}</span></div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">{{ $property->address }},
                                                {{ $property->city }}, {{ $property->state }}
                                                {{ $property->zip_code }}</span>
                                            <span class="city d-block mb-3">{{ $property->address }},
                                                {{ $property->city }}</span>

                                            <div class="specs d-flex mb-4">
                                                <span class="d-block d-flex align-items-center me-3">
                                                    <span class="icon-bed me-2"></span>
                                                    <span class="caption">{{ $property->bed_rooms }} beds</span>
                                                </span>
                                                <span class="d-block d-flex align-items-center">
                                                    <span class="icon-bath me-2"></span>
                                                    <span class="caption">{{ $property->bath_rooms }} baths</span>
                                                </span>
                                            </div>

                                            <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- .item -->
                        </div>

                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <button class="custom-button prev" data-controls="prev" aria-controls="property"
                                tabindex="-1">Prev</button>
                            <button class="custom-button next" data-controls="next" aria-controls="property"
                                tabindex="-1">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-properties">
        <div class="container">
            @include('site.partials.show_properties')
            {{ $properties->links() }}
        </div>
    </div>
@stop


@include('site.partials.show_next_prevouis')
