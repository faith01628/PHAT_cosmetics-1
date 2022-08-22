<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">

            @foreach ($categories as $keyCategory => $categoryItem)
                <li class="{{ $keyCategory == 0 ? 'active' : '' }}"><a href="#categoryItem_{{ $categoryItem->id }}"
                        data-toggle="tab">{{ $categoryItem->name }}</a></li>
            @endforeach

        </ul>
    </div>



    <div class="tab-content">
        @foreach ($categories as $keyCategoryProduct => $categoryItemProduct)
            <div class="tab-pane fade {{ $keyCategoryProduct == 0 ? 'active in' : '' }}" id="categoryItem_{{ $categoryItemProduct->id }}">

                @foreach ($categoryItemProduct->products as $tabItemProduct)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src=" {{ $tabItemProduct->featured_image_path }}" alt="" />
                                    <h2>$ {{ number_format($tabItemProduct->price) }}</h2>
                                    <p>{{ $tabItemProduct->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>    
                @endforeach
                
  
            </div>
        @endforeach


    </div>


</div>
