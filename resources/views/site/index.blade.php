@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@section('content')
    <div class="hero">
        <div class="hero-slide">
            <div class="img overlay" style="background-image: url('{{ asset('siteassets/images/hero_bg_3.jpg') }}')">
            </div>
            <div class="img overlay" style="background-image: url('{{ asset('siteassets/images/hero_bg_2.jpg') }}')">
            </div>
            <div class="img overlay" style="background-image: url('{{ asset('siteassets/images/hero_bg_1.jpg') }}')">
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center">
                    <h1 class="heading" data-aos="fade-up">
                        Easiest way to find your dream home
                    </h1>
                    <form action="{{ route('site.search_properties') }}" method="GET"
                        class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                        data-aos-delay="200">
                        <input type="text" name="query" class="form-control px-4"
                            placeholder="Your ZIP code or City. e.g. New York" />
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading">
                        Popular Properties
                    </h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <p>
                        <a href="{{ route('site.properties') }}" target="_blank"
                            class="btn btn-primary text-white py-3 px-4">View all
                            properties</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">

                            @foreach ($properties as $property)
                                <div class="property-item">
                                    <a href="{{ route('site.show', $property->id) }}" class="img">
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

                                            <a href="{{ route('site.show', $property->id) }}"
                                                class="btn btn-primary py-2 px-3">See details</a>
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

    <section class="features-1">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="box-feature">
                        <span class="flaticon-house-3"></span>
                        <h3 class="mb-3">Our Properties</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptates, accusamus.
                        </p>
                        <p><a href="{{ route('site.properties') }}" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="box-feature">
                        <span class="flaticon-house"></span>
                        <h3 class="mb-3">Featured Properties</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptates, accusamus.
                        </p>
                        <p><a href="{{ route('site.properties') }}" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="box-feature">
                        <span class="flaticon-building"></span>
                        <h3 class="mb-3">Buy Property</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptates, accusamus.
                        </p>
                        <p><a href="{{ route('site.properties') }}" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="box-feature">
                        <span class="flaticon-house-3"></span>
                        <h3 class="mb-3">Our Agnets</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptates, accusamus.
                        </p>
                        <p><a href="{{ route('site.agents') }}" class="learn-more">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section sec-testimonials">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-6">
                    <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
                        Customer Says
                    </h2>
                </div>
                <div class="col-md-6 text-md-end">
                    <div id="testimonial-nav">
                        <button class="custom-button prev" data-controls="prev" aria-controls="property"
                            tabindex="-1">Prev</button>
                        <button class="custom-button next" data-controls="next" aria-controls="property"
                            tabindex="-1">Next</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4"></div>
            </div>
            <div class="testimonial-slider-wrap">
                <div class="testimonial-slider">
                    @foreach ($reviews as $review)
                        <div class="item">
                            <div class="testimonial">
                                <img src="{{ asset($review->image) }}" alt="Image"
                                    class="img-fluid rounded-circle w-25 mb-4" />
                                <div class="rate">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->stars)
                                            <span class="icon-star text-warning"></span> <!-- نجمة ملونة -->
                                        @else
                                            <span class="icon-star text-gray"></span> <!-- نجمة غير ملونة -->
                                        @endif
                                    @endfor
                                </div>
                                <h3 class="h5 text-primary mb-4">{{ $review->name }}</h3>
                                <blockquote>
                                    <p>
                                        &ldquo;{{ Str::limit($review->description, 250, '...') }}&rdquo;
                                    </p>
                                </blockquote>
                                <p class="text-black-50">{{ $review->job }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="section section-4 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">
                        Let's find home that's perfect for you
                    </h2>
                    <p class="text-black-50">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
                        enim pariatur similique debitis vel nisi qui reprehenderit.
                    </p>
                </div>
            </div>
            <div class="row justify-content-between mb-5">
                <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
                    <div class="img-about dots">
                        <img src="{{ asset('siteassets/images/hero_bg_3.jpg') }}" alt="Image" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-home2"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">{{ $properties->count() }} Properties</h3>
                            <p class="text-black-50">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nostrum iste.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-person"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Top Rated Agents</h3>
                            <p class="text-black-50">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nostrum iste.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-security"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Legit Properties</h3>
                            <p class="text-black-50">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nostrum iste.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row section-counter mt-5 ml-5">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary" style="visibility: hidden;"></span></span>
                        <span class="caption text-black-50"></span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">{{ $soldPropertiesCount }}</span></span>
                        <span class="caption text-black-50"># of Sell Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">{{ $properties->count() }}</span></span>
                        <span class="caption text-black-50"># of All Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">{{ $agents->count() }}</span></span>
                        <span class="caption text-black-50"># of Agents</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="row justify-content-center footer-cta" data-aos="fade-up">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="mb-4">Be a part of our growing real state agents</h2>
                <p>
                    <a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">Apply for Real Estate
                        agent</a>
                </p>
            </div>
            <!-- /.col-lg-7 -->
        </div>
        <!-- /.row -->
    </div>

    <div class="section section-5 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6 mb-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">
                        Best Agents
                    </h2>
                    <p class="text-black-50">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
                        enim pariatur similique debitis vel nisi qui reprehenderit totam?
                        Quod maiores.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($agents as $agent)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="h-100 person">
                            <img src="{{ asset($agent->image) }}" alt="Image"
                                class="img-fluid" />

                            <div class="person-contents">
                                <h2 class="mb-0"><a href="#">{{ $agent->name }}</a></h2>
                                <span class="meta d-block mb-3">Real Estate Agent</span>
                                <p>
                                    {{ Str::limit($agent->description, 250, '...') }}
                                </p>

                                <ul class="social list-unstyled list-inline dark-hover">
                                    <li class="list-inline-item">
                                        <a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><span class="icon-linkedin"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@stop

@include('site.partials.show_next_prevouis')
