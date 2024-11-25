<div class="row">
    <div class="product-images col-lg-7 col-md-12 col-12">
        <div class="row">
            <div class="col-md-2">
                <div class="content-thumbnail-scroll">
                    <div class="image-thumbnail slick-carousel slick-vertical" data-asnavfor=".image-additional" data-centermode="true" data-focusonselect="true" data-columns4="5" data-columns3="4" data-columns2="4" data-columns1="4" data-columns="4" data-nav="true" data-vertical="&quot;true&quot;" data-verticalswiping="&quot;true&quot;">
                        <div class="img-item slick-slide">
                            <span class="img-thumbnail-scroll">
                                <img width="600" height="600" src="{{ \Storage::url($product['san_pham']['hinh_anh']) }}" alt="">
                            </span>
                        </div>
                        <div class="img-item slick-slide">
                            <span class="img-thumbnail-scroll">
                                <img width="600" height="600" src="{{ \Storage::url($product['san_pham']['hinh_anh']) }}" alt="">
                            </span>
                        </div>
                        <div class="img-item slick-slide">
                            <span class="img-thumbnail-scroll">
                                <img width="600" height="600" src="{{ asset('theme/ruper/media/product/9-3.jpg')}}" alt="">
                            </span>
                        </div>
                        <div class="img-item slick-slide">
                            <span class="img-thumbnail-scroll">
                                <img width="600" height="600" src="{{ \Storage::url($product['san_pham']['hinh_anh']) }}" alt="">
                            </span>
                        </div>
                        <div class="img-item slick-slide">
                            <span class="img-thumbnail-scroll">
                                <img width="600" height="600" src="{{ \Storage::url($product['san_pham']['hinh_anh']) }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="scroll-image main-image">
                    <div class="image-additional slick-carousel" data-asnavfor=".image-thumbnail" data-fade="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
                        <div class="img-item slick-slide">
                            <img width="900" height="900" src="{{ \Storage::url($product['san_pham']['hinh_anh']) }}" alt="" title="">
                        </div>
                        <div class="img-item slick-slide">
                            <img width="900" height="900" src="{{ asset('theme/ruper/media/product/9-2.jpg')}}" alt="" title="">
                        </div>
                        <div class="img-item slick-slide">
                            <img width="900" height="900" src="{{ asset('theme/ruper/media/product/9-3.jpg')}}" alt="" title="">
                        </div>
                        <div class="img-item slick-slide">
                            <img width="900" height="900" src="{{ \Storage::url($product['san_pham']['hinh_anh']) }}" alt="" title="">
                        </div>
                        <div class="img-item slick-slide">
                            <img width="900" height="900" src="{{ asset('theme/ruper/media/product/9-2.jpg')}}" alt="" title="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-info col-lg-5 col-md-12 col-12 ">
        <div id="product-data" data-product-id="{{ $product['san_pham']['id'] }}"></div>
        <h1 class="title">{{$product['san_pham']['ten_san_pham']}}</h1>
        <span class="price">
            <del aria-hidden="true"><span>{{$product['san_pham']['gia']}}</span></del>
            <ins><span>{{$product['san_pham']['gia_khuyen_mai']}}</span></ins>
        </span>
        <div class="rating">
            <div class="star star-5"></div>
            <div class="review-count">
                (3<span> reviews</span>)
            </div>
        </div>
        <div class="description">
            <p>{{$product['san_pham']['mo_ta']}}</p>
        </div>
        <div class="variations">
            <!-- Chọn Size -->

            <table>
                <tbody>
                    <tr>
                        <td style="width: 20%" class="label">Size</td>
                        <td class="attributes">
                            <ul id="size" class="text"></ul>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%" class="label">Màu sắc</td>
                        <td class="attributes">
                            <ul id="color" class="colors"></ul>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%" class="label">Giá</td>
                        <td class="attributes">
                            <span id="price"></span>
                            <div id="error-message" style="color: red; display: none;"></div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Dữ liệu sản phẩm (sẽ được thay đổi bằng JavaScript) -->
            <div id="product-data" data-product-id="12345" style="display:none;"></div>

        </div>
        <form action="{{route('client.cart.store', Auth::id())}}" method="POST">
            @csrf
           
            <input name="san_pham_id" value="{{$product['san_pham']['id']}}" type="text" hidden>
            <input id="san_pham_color_id" name="san_pham_color" value="" type="text" hidden>
            <input id="san_pham_size_id" name="san_pham_size" value="" type="text" hidden>
            <div class="buttons row">
                <div class="add-to-cart-wrap">
                    <div class="quantity">
                        <button type="button" class="plus">+</button>
                        <input type="number" class="qty" step="1" min="0" max="" name="so_luong" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
                        <button type="button" class="minus">-</button>
                    </div>
                    <div class="">
                        <button style="padding: 0.85rem 10.7rem;" class="btn btn-danger" type="submit">Thêm vào giỏ hàng</button>
                    </div>
                </div>
                <div class="btn-quick-buy" data-title="Wishlist">
                    <button class="product-btn">Mua ngay</button>
                </div>
                <div class="btn-wishlist" data-title="Wishlist">
                    <button class="product-btn">Thêm vào yêu thích</button>
                </div>
                <div class="btn-compare" data-title="Compare">
                    <button class="product-btn">Tương tự</button>
                </div>
            </div>
        </form>

        <div class="product-meta">
            <span class="sku-wrapper">SKU: <span class="sku">D2300-3-2-2</span></span>
            <span class="posted-in">Danh mục: <a href="shop-grid-left.html" rel="tag">{{$product['san_pham']['danh_muc']['ten_danh_muc']}}</a></span>
            <span class="tagged-as">Tags: <a href="shop-grid-left.html" rel="tag">Hot</a>, <a href="shop-grid-left.html" rel="tag">Trend</a></span>
        </div>
        <div class="social-share">
            <a href="#" title="Facebook" class="share-facebook" target="_blank"><i class="fa fa-facebook"></i>Facebook</a>
            <a href="#" title="Twitter" class="share-twitter"><i class="fa fa-twitter"></i>Twitter</a>
            <a href="#" title="Pinterest" class="share-pinterest"><i class="fa fa-pinterest"></i>Pinterest</a>
        </div>
    </div>
</div>

@section('script_detail')
<style>
    .size-item.active {
        font-weight: bold;
        background-color: black;
        color: #fff;
        /* Màu sắc cho kích thước đã chọn */
    }

    .color-item.active {
        width: 36px;
        height: 36px;
        border: 2px solid #007bff;
        /* Đường viền cho màu đã chọn */
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let sanPhamBienThes = [];

        const productId = document.getElementById('product-data').getAttribute('data-product-id');
        const apiUrl = `http://127.0.0.1:8000/api/products/${productId}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                sanPhamBienThes = data.san_pham_bien_thes;
                renderSizes();
                const initialSize = sizeSelect.value;
                renderColors(initialSize);
                const initialColor = colorList.querySelector('.color-item.active')?.style.backgroundColor; // Sửa lại ở đây
                updatePrice(initialSize, initialColor);
            })
            .catch(error => {
                console.error('Error fetching product data:', error);
            });

        const sizeSelect = document.getElementById('size');
        const colorList = document.getElementById('color');
        const priceDisplay = document.getElementById('price');
        const errorMessage = document.getElementById('error-message');

        function renderSizes() {
            const uniqueSizes = [...new Set(sanPhamBienThes.map(item => item.san_pham_size.ten_size))];
            const san_pham_size_id = document.getElementById('san_pham_size_id')
            uniqueSizes.forEach(size => {
                const li = document.createElement('li');
                li.textContent = size;
                li.className = 'size-item btn';
                li.style.cursor = 'pointer';

                li.addEventListener('click', function() {
                    const selectedSize = li.textContent;
                    san_pham_size_id.value = size;
                    updateSize(selectedSize);
                    renderColors(selectedSize);
                    const selectedColor = colorList.querySelector('.color-item.active');
                    updatePrice(selectedSize, selectedColor ? selectedColor.style.backgroundColor : null); // Sửa lại ở đây
                });

                sizeSelect.appendChild(li);
            });
        }

        function renderColors(selectedSize) {
            colorList.innerHTML = '';
            const filteredColors = sanPhamBienThes.filter(item => item.san_pham_size.ten_size === selectedSize);
            const uniqueColors = [...new Set(filteredColors.map(item => item.san_pham_color.ma_mau))];

            uniqueColors.forEach(color => {
                const li = document.createElement('li');
                const san_pham_color_id = document.getElementById('san_pham_color_id')
                li.className = 'color-item btn';
                li.style.cssText = `background-color: ${color}; width: 30px; height: 30px;display: inline-block; margin: 5px; cursor: pointer;`;

                li.addEventListener('click', function() {
                    san_pham_color_id.value = color;
                    updateColor(color);
                    updatePrice(selectedSize, color);
                });

                colorList.appendChild(li);
            });
        }

        function updatePrice(selectedSize, selectedColor) {
            const selectedVariant = sanPhamBienThes.find(item => item.san_pham_size.ten_size === selectedSize && item.san_pham_color.ma_mau === selectedColor);
            if (selectedVariant) {
                priceDisplay.textContent = selectedVariant.gia + ' VND  -  Còn: ' + selectedVariant.so_luong + ' sản phẩm.';
                errorMessage.style.display = 'none';
            } else {
                priceDisplay.textContent = '';
                errorMessage.textContent = 'Bạn chưa chon size và màu sắc';
                errorMessage.style.display = 'block';
            }
        }

        function updateSize(selectedSize) {
            document.querySelectorAll('.size-item').forEach(item => {
                item.classList.remove('active');
                if (item.textContent === selectedSize) {
                    item.classList.add('active');
                }
            });
        }

        function updateColor(selectedColor) {
            document.querySelectorAll('.color-item').forEach(item => {
                item.classList.remove('active');
                item.style.border = '';
                if (item.style.backgroundColor === selectedColor) {
                    item.classList.add('active');
                }
            });
        }
    });
</script>

@endsection