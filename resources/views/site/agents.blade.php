@extends('site.master')

@section('title', 'Agents | ' . env('APP_NAME'))

@section('content')
    <div class="hero page-inner overlay" style="background-image: url('{{ asset('siteassets/images/hero_bg_1.jpg') }}')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Agents</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('site.index') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                agents
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="section section-properties" id="properties-list">
        <div class="container">
            <div class="row">
                @foreach ($agents as $agent)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-5 bg-light mt-5">
                        <div class="h-100 person mb-5">
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
            {{ $agents->links() }}
        </div>
    </div>

@stop


@include('site.partials.show_next_prevouis')
