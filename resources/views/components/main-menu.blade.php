<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ route('home') }}" class="active">Home</a></li>

        @foreach ($categoryMenus as $categoryMenuParent)
            <li class="dropdown"><a href="#">{{ $categoryMenuParent->name }}<i class="fa fa-angle-down"></i></a>

                @if ($categoryMenuParent->categoryChildren->count())
                    <ul role="menu" class="sub-menu">
                        @foreach ($categoryMenuParent->categoryChildren as $categoryChild)
                            <li><a
                                    href="{{ route('category.product', ['slug' => $categoryChild->slug, 'id' => $categoryChild->id]) }}">{{ $categoryChild->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif


            </li>
        @endforeach


        <li class="dropdown"><a href="{{ asset('user/brand') }}">Brands</a></li>
        <li class="dropdown"><a href="#">News</a></li>
        <li class="dropdown"><a href="{{ asset('user/contact') }}">Contact</a></li>
    </ul>
</div>
