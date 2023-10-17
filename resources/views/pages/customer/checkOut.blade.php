@extends("layouts.customer.app")
@section("main")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- CheckoutController Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{url("/payment")}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>

                            <div class="checkout__input">
                                <p>Full Name<span>*</span></p>
                                <input name="full_name" value="{{old("full_name")}}" type="text">
                                @error("full_name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input name="address" value="{{old("address")}}" type="text" placeholder="Street Address" class="checkout__input__add">
                                @error("address")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telephone<span>*</span></p>
                                        <input value="{{old("tel")}}" name="tel" type="tel">
                                        @error("tel")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input value="{{old("email")}}" name="email" type="email">
                                        @error("email")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <p>Shipping method<span>*</span></p>
                                <label for="acc">
                                    Express
                                    <input name="shipping_method" @if(old("shipping_method")== "Express") checked @endif value="Express" type="radio" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="free">
                                    Free Shipping
                                    <input name="shipping_method" @if(old("shipping_method")== "Free_Shipping") checked @endif value="Free_Shipping" type="radio" id="free">
                                    <span class="checkmark"></span>
                                </label>
                                @error("shipping_method")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach($cartShop as $item)
                                        <li>{{$item->name}} (x{{$item->buy_qty}})<span>${{$item->price * $item->buy_qty}}</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>${{$subtotal}}</span></li>
                                    <li>VAT <span>10%</span></li>
                                    <li>Total <span>${{$total}}</span></li>
                                </ul>

                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        COD
                                        <input name="payment_method"  @if(old("payment_method")== "COD") checked @endif value="COD" type="radio" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="Vnpay">
                                        Vnpay
                                        <input name="payment_method"  @if(old("payment_method")== "Vnpay") checked @endif  value="Vnpay" type="radio" id="Vnpay">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                @error("payment_method")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
{{--                                <form action="{{url('/payment')}}" method="POST">--}}
{{--                                    @csrf--}}
                                <button name="redirect" type="submit" class="site-btn">PLACE ORDER</button>
{{--                                </form>--}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- CheckoutController Section End -->

@endsection
