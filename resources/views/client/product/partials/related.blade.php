<div class="tab-pane fade show active" id="layout-grid" role="tabpanel">
    <div id="dataContainer" class="products-list grid row">
       
        @foreach($relatedProducts as $product)
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="products-entry clearfix product-wapper">
                <div class="products-thumb">
                    <div class="product-lable">
                        <div class="hot">Hot</div>
                    </div>
                    <div class="product-thumb-hover">
                        <a href="{{route('client.shop.show',$product['id'])}}">
                            <img width="600" height="600" src="{{ \Storage::url($product['image']) }}" class="post-image" alt="{{ $product['name'] }}">
                            <img width="600" height="600" src="{{ \Storage::url($product['image']) }}" class="hover-image back" alt="{{ $product['name'] }}">
                        </a>
                    </div>
                    <div class="product-button">
                        <div class="btn-add-to-cart" data-title="Add to cart">
                            <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                        </div>
                        <div class="btn-wishlist" data-title="Wishlist">
                            <button class="product-btn">Add to wishlist</button>
                        </div>
                        <div class="btn-compare" data-title="Compare">
                            <button class="product-btn">Compare</button>
                        </div>
                        <span class="product-quickview" data-title="Quick View">
                            <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                        </span>
                    </div>
                </div>
                <div class="products-content">
                    <div class="contents text-center">
                        <h3 class="product-title"><a href="{{route('client.shop.show',$product['id'])}}">{{ $product['name'] }}</a></h3>
                        <span class="price">{{ number_format($product['price'], 0, ',', '.') }} VND</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
