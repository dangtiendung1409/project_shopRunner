@extends("layouts.customer.app")
@section("main")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                @include("layouts.customer.sidebar")
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <h6><span>{{$products->total()}}</span> Products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="slider-area">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <div class="middle">
                                    <div id="multi_range">
                                        <span id="left_value">25</span><span> ~ </span><span id="right_value">75</span>
                                    </div>
                                    <div class="multi-range-slider my-2">
                                        <input type="range" id="input_left" class="range_slider" min="0.00" max="100.00" value="25.00" onmousemove="left_slider(this.value)">
                                        <input type="range" id="input_right" class="range_slider" min="0.00" max="100" value="75.00" onmousemove="right_slider(this.value)">
                                        <div class="slider">
                                            <div class="track"></div>
                                            <div class="range"></div>
                                            <div class="thumb left"></div>
                                            <div class="thumb right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($products->count() >=1)
                    <div class="row">
                        @foreach($products as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset($item->thumbnail) }}">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="/customer/img/icon/heart.png" alt=""></a></li>
                                            <li><a href="#"><img src="/customer/img/icon/compare.png" alt="">
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="/customer/img/icon/search.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6 >{{$item->name}}</h6>
                                        <a href="{{url("/details",["product"=>$item->slug])}}" class="add-cart btn">Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>${{$item->price}}</h5>
                                        <div class="product__color__select">
                                            <label for="pc-40">
                                                <input type="radio" id="pc-40">
                                            </label>
                                            <label class="active black" for="pc-41">
                                                <input type="radio" id="pc-41">
                                            </label>
                                            <label class="grey" for="pc-42">
                                                <input type="radio" id="pc-42">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                @if ($products->lastPage() > 1)
                                    @if ($products->currentPage() > 3)
                                        <a href="{{ $products->url(1) }}">1</a>
                                        @if ($products->currentPage() > 4)
                                            <span>...</span>
                                        @endif
                                    @endif
                                    @for ($i = max(1, $products->currentPage() - 2); $i <= min($products->lastPage(), $products->currentPage() + 2); $i++)
                                        @if ($i == $products->currentPage())
                                            <a class="active" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        @else
                                            <a href="{{ $products->url($i) }}">{{ $i }}</a>
                                        @endif
                                    @endfor
                                    @if ($products->currentPage() < $products->lastPage() - 2)
                                        @if ($products->currentPage() < $products->lastPage() - 3)
                                            <span>...</span>
                                        @endif
                                        <a href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
