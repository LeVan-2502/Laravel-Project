@extends('client.layouts.master')
@section('content')
<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
                @include('client.home.partials.slider')
                @include('client.home.partials.block')
                @include('client.home.partials.posts')
                @include('client.home.partials.lookbook')
                @include('client.home.partials.ins')
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
</div>
@endsection

@section('style')

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('theme/ruper/libs/popper/js/popper.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/jquery/js/jquery.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slick/js/slick.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/countdown/js/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/mmenu/js/jquery.mmenu.all.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection