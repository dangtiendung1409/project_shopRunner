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
                            <a href="/">Product</a>
                            <span>{{$product->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            @if(session()->has("success"))
                <div class="alert alert-success" role="alert">
                    {{ session("success") }}
                </div>
            @endif

            @if(session()->has("error"))
                <div class="alert alert-danger" role="alert">
                    {{ session("error") }}
                </div>
            @endif
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{$product->thumbnail}}" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1">
                    <form action="{{ url("/add-to-cart", ["product"=>$product->id])}}" method="get">
                        @csrf
                        <div class="s_product_text">
                            <h3 style="margin-left: -8px; font-size:25px;">{{$product->name}}</h3>
                            <h2>${{$product->price}}</h2>
                            <input type="hidden" name="color" value="" id="selectedColor">
                            <input type="hidden" name="size" value="" id="selectedSize">
                            <ul class="list">
                                <li><a class="active" href="#"><span>Category</span> : {{$product->Category->name}}</a></li>
                                <li><a href="#"><span>Qty</span> : {{$product->qty}}</a></li>
                                <li><a href="#"><span>Sold</span> : {{$product->Orders->count()}}</a></li>
                            </ul>
                            <p>{{$product->description}}</p>
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input name="buy_qty" type="text" value="1">
                                    </div>
                                </div>
                            </div>
                            @if($product->qty > 0)
                                <button type="submit" class="site-btn">ADD TO CART</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="share">
            <p>Share:</p>
            <div class="foorter-right__iconpro">
                <a href="https://twitter.com"><img style="height: 27px;" src="https://dongphucphuongthao.vn/wp-content/themes/mayphuongthao/assets/images/icon/tc1.png" /></a>
                <a href="https://www.pinterest.com/"><img style="height: 27px;" src="https://dongphucphuongthao.vn/wp-content/themes/mayphuongthao/assets/images/icon/tc2.png" alt="" /></a>
                <a href="https://www.messenger.com/"><img style="height: 27px;" src="https://dongphucphuongthao.vn/wp-content/themes/mayphuongthao/assets/images/icon/tc3.png" alt="" /></a>
                <a href="https://vi-vn.facebook.com/"><img style="height: 27px;" src="https://dongphucphuongthao.vn/wp-content/themes/mayphuongthao/assets/images/icon/tc5.png" alt="" /></a>
            </div>
            <form action="{{ url('/add-to-favorite') }}" method="GET">
                @csrf
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="thumbnail" value="{{ $product->thumbnail }}">
                <button type="submit" class="IYjGwk" tabindex="0">
                    <svg width="24" height="20" class="x0F377" id="heart-icon">
                        <path d="M19.469 1.262c-5.284-1.53-7.47 4.142-7.470 4.142S9.815-.269 4.532 1.262C-1.937 3.138.44 13.832 12 19.333c11.559-5.501 13.938-16.195 7.469-18.07z" stroke="#FF424F" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round"></path>
                    </svg>
                    <div class="Ne7dEf">Đã thích (16)</div>
                </button>
            </form>
        </div>


    </div>
    <!--================End Single Product Area =================-->
    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false">Specification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                       aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>{{$product->description}}</p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <h5>Width</h5>
                                </td>
                                <td>
                                    <h5>128mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Height</h5>
                                </td>
                                <td>
                                    <h5>508mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Depth</h5>
                                </td>
                                <td>
                                    <h5>85mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>52gm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quality checking</h5>
                                </td>
                                <td>
                                    <h5>yes</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>When packeting</h5>
                                </td>
                                <td>
                                    <h5>Without touch of hand</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>4.0</h4>
                                        <h6>(03 Reviews)</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on 3 Reviews</h3>
                                        <ul class="list">
                                            <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">

                                <div class="review_item">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4>bla bla</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>ânsa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                <hr>
                                <form class="row contact_form" action="{{url("/details/{product:slug}")}}" method="post" id="contactForm" novalidate="novalidate">
                                 @csrf
                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12 text-right">
                                        <hr>
                                        {{--                                        rating--}}
                                        <div class="rate" data-rate-value= ></div>
                                        <form action="" method="POST" class="form-inline" role="form">
                                            <div class="form-group row">
                                                <input type="hidden" class="form-control" name="rating_start" id="rating_start">
                                                <input type="hidden" class="form-control" id="product_id" name="product_id" value="{{$product->id}}">
                                            </div>
                                        </form>
                                        <button type="submit" value="submit" class="site-btn">Submit Now</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================End Product Description Area =================-->
    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
            @foreach($relate as $item)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="{{$item->thumbnail}}">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="/customer/img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="/customer/img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="/customer/img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$item->name}}</h6>
                            <a href="{{url("/details",["product"=>$item->slug])}}" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>${{$item->price}}</h5>
                            <div class="product__color__select">
                                <label for="pc-7">
                                    <input type="radio" id="pc-7">
                                </label>
                                <label class="active black" for="pc-8">
                                    <input type="radio" id="pc-8">
                                </label>
                                <label class="grey" for="pc-9">
                                    <input type="radio" id="pc-9">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@stop()
@section("before_css")
    <style>
        .rate{
            color: #fbd600;
            font-size: 30px;
        }
        #rating_start, #product_id{
            height: 40px;
            width: 60px;
        }
        .rate-base-layer
        {
            color: #aaa;
        }
        .rate-hover-layer
        {
            color: orange;
        }

        .rate-base-layer span, .rate-base-layer span
        {
            opacity: 0.5;
        }
        hr
        {
            border: 1px solid #ccc;
        }
    </style>
@stop()
@section("before_js")
    {{--rating--}}
    <script src="http://code.jquery.com/jquery-1.11.3.min.js" charset="utf-8"></script>
    <script>
        $(document).ready(function(){
            var options = {
                max_value: 5,
                step_size: 1,
                initial_value: 3,
            }
            $(".rate").rate(options).on("click", function() {
                var ratingValue = $(this).rate("getValue");  // Get the clicked rating value
                $("#rating_start").val(ratingValue);  // Update the input value
            });

        });
    </script>

    <!-- Related Section End -->
@stop()
