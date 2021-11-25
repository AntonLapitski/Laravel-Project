@props(['product'])
<!-- Single gallery Item Start -->
<div class="col-12 col-sm-6 col-md-4 single_gallery_item woman wow fadeInUpBig" data-wow-delay="0.2s">
    <!-- Product Image -->
    <div class="product-img">
        <img src="{{asset('img/product-img/' . $product->img . '.jpg')}}" alt="">
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
