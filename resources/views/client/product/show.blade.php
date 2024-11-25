@extends('client.layouts.master')
@section('content')
<div id="site-main" class="site-main">
	<div id="main-content" class="main-content">
		<div id="primary" class="content-area">
			<div id="title" class="page-title">
				<div class="section-container">
					<div class="content-title-heading">
						<h1 class="text-title-heading">
							Bora Armchair
						</h1>
					</div>
					<div class="breadcrumbs">
						<a href="index.html">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Bora Armchair
					</div>
				</div>
			</div>

			<div id="content" class="site-content" role="main">
				<div class="shop-details zoom" data-product_layout_thumb="scroll" data-zoom_scroll="true" data-zoom_contain_lens="true" data-zoomtype="inner" data-lenssize="200" data-lensshape="square" data-lensborder="" data-bordersize="2" data-bordercolour="#f9b61e" data-popup="false">
					<div class="product-top-info">
						<div class="section-padding">
							<div class="section-container p-l-r">
								@include('client.product.partials.info')
							</div>
						</div>
					</div>
					<div class="product-tabs">
						<div class="section-padding">
							<div class="section-container p-l-r">
								@include('client.product.partials.review')
							</div>
						</div>
					</div>
					<div class="product-related">
						<div class="section-padding">
							<div class="section-container p-l-r">
								<div class="block block-products slider">
									<div class="block-title">
										<h2>SẢN PHẨM LIÊN QUAN</h2>
									</div>
									<div class="block-content">
										<div class="content-product-list slick-wrap">
											@include('client.product.partials.related')
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- #primary -->
	</div><!-- #main-content -->
</div>

@endsection
@section('style')
@yield('style_detail')
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/bootstrap/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/feather-font/css/iconfont.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/icomoon-font/css/icomoon.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/font-awesome/css/font-awesome.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/wpbingofont/css/wpbingofont.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/elegant-icons/css/elegant.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/slick/css/slick.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/slick/css/slick-theme.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/mmenu/css/mmenu.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('theme/ruper/libs/slider/css/jslider.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3n4PYZK8drFffpM0+/CCl0VxXZGpIw8eqpPRL7g+U9Mg69em0ZbiZWZavogZC3zIHwK5C4jXILkA17eKO4uQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-3fFC5AHlqBF1h8+er2TuAxdhLh6uJ4jZLswekmht/pF94ZZBk+MmqBf1z9C2MPBhcj+VO/U66lRXD9g7Eq7EkA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('script')
@yield('script_detail')
<script src="{{ asset('theme/ruper/libs/popper/js/popper.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/jquery/js/jquery.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slick/js/slick.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/countdown/js/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/mmenu/js/jquery.mmenu.all.min.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slider/js/tmpl.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slider/js/jquery.dependClass-0.1.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slider/js/draggable-0.1.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/slider/js/jquery.slider.js')}}"></script>
<script src="{{ asset('theme/ruper/libs/elevatezoom/js/jquery.elevatezoom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-OwtAW5cM0EENbsxMjix7FrxBMPOhlrUrmikKnnTh2vOonZ1pPogZ8nHAw1dFIuxosnfrxV43H61dWlWflXWe5g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
	$(document).ready(function() {
		$(".owl-carousel").owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 4
				}
			}
		});
	});
</script>

@endsection