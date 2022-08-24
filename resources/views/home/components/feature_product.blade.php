<div class="features_items">
    <h2 class="title text-center">Features Items</h2>
    @foreach ($products as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ $product->featured_image_path }}" alt=""/>
                        <h2>${{ number_format($product->price) }}</h2>
                        <p>{{ $product->name }}</p>
                    </div>
                    <a href="{{ route('detail.product', $product->id) }}" class="product_details">
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>${{ number_format($product->price) }}</h2>
                            <p>{{ $product->name }}</p>
                           
                        </div>
                    </div>
                    </a>
                </div>
               
            </div>
        </div>
    @endforeach



</div>