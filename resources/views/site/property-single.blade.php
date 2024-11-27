@extends('site.master')

@section('title', 'Properties | ' . env('APP_NAME'))

@section('content')

    <div class="hero page-inner overlay" style="background-image: url('{{ asset('siteassets/images/hero_bg_3.jpg') }}')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">Home</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('site.properties') }}">Properties</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="img-property-slide-wrap">
                        <div class="img-property-slide">
                            @foreach ($property->photos as $photo)
                                <img src="{{ asset($photo->photo_path) }}" alt="Image" class="img-fluid" />
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2 class="heading text-primary">{{ $property->name }}</h2>
                    <p class="meta">{{ $property->address }}, {{ $property->city }}</p>
                    
                    <!-- Added price -->
                    <p class="text-success"><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                    
                    <!-- Moved name before description -->
                    <h4 class="text-dark">{{ $property->name }}</h4>
                    
                    <p class="text-black-50">{{ $property->description }}</p>

                    <div class="contact-box p-5">
                        <h4>If you're interested in this property and want to take the next step, please contact us on WhatsApp:</h4>
                        
                    
                        <script src="https://static.elfsight.com/platform/platform.js" async></script>
                        <div class="elfsight-app-407986da-509b-4d91-a5f2-7559387048c7" data-elfsight-app-lazy></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
