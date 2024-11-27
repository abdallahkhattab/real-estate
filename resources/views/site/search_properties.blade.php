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


    <div class="section section-properties" id="properties-list">
        <div class="container">
            @include('site.partials.show_properties')
            {{ $properties->links() }}
        </div>
    </div>

@stop


@include('site.partials.show_next_prevouis')

