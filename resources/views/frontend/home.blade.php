@extends('frontend.layouts.master')

@section('content')

    <!-- Tranding news  carousel-->
    @include('frontend.home-components.breaking-news')
    <!-- End Tranding news carousel -->

    <!-- Hero news Section -->
    @include('frontend.home-components.hero-slider')
    
    <!-- End Hero news Section -->
    
    <!-- Popular news category -->
    @include('frontend.home-components.main-news')
    <!-- End Popular news category -->
    
@endsection
