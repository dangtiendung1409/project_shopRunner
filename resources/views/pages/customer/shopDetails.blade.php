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
                            <a href="/my-order">My Order</a>
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
                                <img class="img-fluid" id="largeImage" src="{{$product->thumbnail}}" alt="">
                            </div>
                            <div class="item">
                                <img data-imgbigurl="{{$product->thumbnail}}"
                                     src="{{$product->thumbnail}}" style="width: 120px; height: 120px;" alt="">
                                <img data-imgbigurl="customer/img/shop-details/product-details-2.jpg"
                                      src="customer/img/shop-details/thumb-2.jpg" alt="">
                                <img data-imgbigurl="customer/img/shop-details/product-details-3.jpg"
                                     src="customer/img/shop-details/thumb-3.jpg" alt="">
                                <img data-imgbigurl="customer/img/shop-details/product-details-4.jpg"
                                     src="customer/img/shop-details/thumb-4.jpg" alt="">
                            </div>
                        </div>
                    </div>
                <div class="col-lg-5 offset-lg-1">
                    <form action="{{ url("/add-to-cart", ["product"=>$product->id])}}" method="get">
                        @csrf
                        <div class="s_product_text">
                            <h3 style="margin-left: -8px; font-size:25px;">{{$product->name}}</h3>
                            <h2>${{$product->price}}</h2>

                            <ul class="list">
                                <li><a class="active" href="#"><span>Category</span> : {{$product->Category->name}}</a></li>
                                <li><a>Availability </a>
                                    @if($product->qty > 0)
                                        <span style="margin-left: 25px" class="text-success">: In Stock</span>
                                    @else
                                        <span style="margin-left: 25px" class="text-danger">: Out of Stock</span>
                                    @endif
                                </li>
                                <li><a href="#"><span>Sold</span> : {{$product->Orders->count()}}</a></li>

                               <div>
                                   <?php
                                   $star = 1;
                                   while ($star <= $avgStarRating){ ?>
                                   <span style="color: #ffc700">&#9733;</span>
                                       <?php $star++; } ?> ({{$avgRating}})
                               </div>
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
                            <div class="error-message" style="color: red;"></div>

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
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="category_id" value="{{ $product->category_id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="thumbnail" value="{{ $product->thumbnail }}">
                <button type="submit" class="IYjGwk" tabindex="0" id="favorite-button">
                    @if (Auth::check() && Auth::user()->hasFavorite($product->name))
                        <svg width="24" height="20" class="x0F377 favorite" id="heart-icon">
                            <i style="color: red; float: left; margin-right: 10px; margin-top: 15px" class="fa-solid fa-heart fa-xl"></i>
                        </svg>
                    @else
                        <svg width="24" height="20" class="x0F377 not-favorite" id="heart-icon">
                            <i style="color: red; float: left; margin-right: 10px; margin-top: 15px" class="fa-regular fa-heart fa-xl"></i>
                        </svg>
                    @endif
                    <div style="margin-top: 15px; font-size: 16px" class="Ne7dEf">Favorite({{ $favoriteCount }})</div>
                </button>
            </form>

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
                                        <h4>{{$avgRating}}</h4>
                                        <h6>(03 Reviews)</h6>
                                    </div>
                                </div>
{{--                                @endforeach--}}
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
                                @if(count($ratings)>0)
                                    @foreach($product->Reviews as $rating)
                                <div class="review_item">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4>{{$rating['user']['name']}}</h4>
                                            @php
                                                $count=1;
                                                while ($count<= $rating['rating']){ @endphp
                                                    <span style="color: #ffc700">&#9733;</span>
                                            @php $count++; } @endphp
                                            <h4>{{ date("d-m-Y H:i:s", strtotime($rating->created_at))}}</h4>
                                            <br>
                                            <h4>{{$rating->message}}</h4>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                    @endforeach
                                @else
                                    <p>Review are not available for this product!!!</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                <hr>
                                <form class="row contact_form" name="ratingForm" id="ratingForm contactForm"
                                      action="{{url("/details-rating")}}" method="post" novalidate="novalidate">
                                    @csrf

                                    <input type="hidden" class="form-control" id="product_id" name="product_id" value="{{$product->id}}">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rating" value="5" />
                                        <label for="star5">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label for="star4">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label for="star3">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label for="star2">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label for="star1">1 star</label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <hr>
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
    <script>
        // Lấy số lượng sản phẩm trong kho từ biến PHP
        var productQtyInStock = <?php echo $product->qty; ?>;

        // Lắng nghe sự kiện khi người dùng nhấn nút "ADD TO CART"
        document.querySelector('.site-btn').addEventListener('click', function(event) {
            var inputQty = parseInt(document.querySelector('input[name="buy_qty"]').value);
            var errorMessage = document.querySelector('.error-message');

            // Kiểm tra số lượng nhập vào
            if (inputQty > productQtyInStock) {
                errorMessage.textContent = 'Số lượng nhập vào lớn hơn số lượng hàng trong kho.';
                event.preventDefault(); // Ngăn chặn việc thêm vào giỏ hàng
            } else {
                errorMessage.textContent = ''; // Xóa thông báo lỗi nếu số lượng hợp lệ
            }
        });
    </script>

@stop()
@section("before_css")
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

    </style>
    <style>
        .item {
            display: flex;
        }

        .item img {
            margin-right: 25px;
        }
        .item img:last-child {
            margin-right: 0;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy danh sách các ảnh thumb
            const thumbImages = document.querySelectorAll('.item img');

            // Lấy ảnh lớn
            const largeImage = document.getElementById('largeImage'); // Sử dụng id "largeImage"

            // Thêm sự kiện click cho từng ảnh thumb
            thumbImages.forEach(function(thumb) {
                thumb.addEventListener('click', function() {
                    // Lấy đường dẫn của ảnh lớn từ thuộc tính data-imgbigurl của ảnh thumb
                    const imgBigUrl = thumb.getAttribute('data-imgbigurl');

                    // Cập nhật ảnh lớn
                    largeImage.setAttribute('src', imgBigUrl);
                });
            });
        });


    </script>


@stop()


