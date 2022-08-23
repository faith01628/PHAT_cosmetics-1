<div class="recommended_items">
    <h2 class="title text-center">recommended items</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @foreach ($productRecommend as $keyRec => $productRecommendItem)
                @if ($keyRec % 3 == 0)
                    <div class="item {{ $keyRec == 0 ? 'active' : '' }}">
                @endif
                <div class="col-sm-4">
                    <a href="{{ route('detail.product', $productRecommendItem->id) }}">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ $productRecommendItem->featured_image_path }}" alt="" />
                                    <h2>${{ number_format($productRecommendItem->price) }}</h2>
                                    <p>{{ $productRecommendItem->name }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                @if ($keyRec % 3 == 2)
        </div>
        @endif
        @endforeach

    </div>
    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>
</div>
</div>
