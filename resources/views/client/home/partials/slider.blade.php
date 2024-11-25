<section class="section section-padding m-b-70">
    <div class="section-container">
        <!-- Block Sliders -->
        <div class="block block-sliders layout-2 nav-center">
            <div class="block-widget-wrap">
                <div class="slick-sliders" data-autoplay="true" data-dots="true" data-nav="false" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns1440="1" data-columns="1">
                    <div class="item slick-slide">
                        <div class="item-content">
                            <div class="cont-image">
                                <img width="1920" height="1080" src="{{ asset('storage/banners/bn1.jpg')}}" alt="Image Slider">
                            </div>
                            <div class="cont-info">
                                <div class="content">
                                    <h2 class="title-slider">Outdoor Chair</h2>
                                    <a class="button-slider button-white" href="shop-grid-left.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slick-slide">
                        <div class="item-content">
                            <div class="cont-image">
                                <img width="1920" height="1080" src="{{ asset('storage/banners/bn3.jpg')}}" alt="Image Slider">
                            </div>
                            <div class="cont-info">
                                <div class="content">
                                    <h2 class="title-slider">Outdoor Chair</h2>
                                    <a class="button-slider button-white" href="shop-grid-left.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slick-slide">
                        <div class="item-content">
                            <div class="cont-image">
                                <img width="1920" height="1080" src="{{ asset('storage/banners/bn4.jpg')}}" alt="Image Slider">
                            </div>
                            <div class="cont-info">
                                <div class="content">
                                    <h2 class="title-slider">Outdoor Chair</h2>
                                    <a class="button-slider button-white" href="shop-grid-left.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slick-slide">
                        <div class="item-content">
                            <div class="cont-image">
                                <img width="1920" height="1080" src="{{ asset('storage/banners/bn5.jpg')}}" alt="Image Slider">
                            </div>
                            <div class="cont-info">
                                <div class="content">
                                    <h2 class="title-slider">Outdoor Chair</h2>
                                    <a class="button-slider button-white" href="shop-grid-left.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@section('style')
<style>
    /* Đặt khung hình ảnh */
    /* Đặt khung cho phần tử cha của ảnh */
    .item-content {
        position: relative;
        /* Để phần thông tin có thể nằm bên trên ảnh */
        width: 100%;
        /* Đảm bảo khung ảnh chiếm 100% chiều rộng của phần tử chứa */
        aspect-ratio: 2 / 1;
        /* Đảm bảo tỉ lệ ảnh luôn là 2:1 */
        overflow: hidden;
        /* Ẩn phần ảnh thừa nếu cần thiết */
    }

    .cont-image img {
        width: 100%;
        /* Chiều rộng ảnh chiếm 100% của khung chứa */
        height: 100%;
        /* Chiều cao tự động theo tỉ lệ của khung */
        object-fit: cover;
        /* Đảm bảo ảnh vừa khung mà không bị biến dạng */
        display: block;
    }

    /* Đặt vị trí cho phần thông tin nằm trong ảnh */
    .cont-info {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        /* Căn giữa nội dung theo chiều ngang */
        align-items: center;
        /* Căn giữa nội dung theo chiều dọc */
        text-align: center;
        /* Căn giữa nội dung text */
      
    }

    .cont-info .content {
        color: white;
        /* Đổi màu chữ cho dễ đọc */
    }

    .title-slider {
        font-size: 2rem;
        margin-bottom: 1rem;
    } 
</style>
@endsection