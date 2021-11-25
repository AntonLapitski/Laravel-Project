@if(count($products) === 0)
    <div class="col-md-12">
        <div class="error-template">
            <h1>
                Oops!</h1>
            <h2>No Results Found</h2>
            <div class="error-details">
                NO elements appeared on your search!
            </div>
        </div>
@else
    @foreach($products as $product)
        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUpBig;">
            <!-- Product Image -->
            <div class="product-img">
                <img src="{{ asset('img/product-img/' . $product->img . '.jpg') }}" alt="">
                <div class="product-quicview">
                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                </div>
            </div>
            <!-- Product Description -->
            <div class="product-description">
                <h4 class="product-price">$39.90</h4>
                <p>{{ $product->description }}</p>
                <!-- Add to Cart -->
                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
            </div>
        </div>
    @endforeach

    {{ $products->links('vendor.pagination.default') }}
@endif
