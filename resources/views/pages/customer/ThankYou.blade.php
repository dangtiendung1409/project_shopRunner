@extends("layouts.customer.app")
@section("main")

    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Thank You</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Thank You</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="order_details section_gap">
        <div class="container">
            <h3 style="margin-top: 80px" class="title_confirmation">Thank you. Your order has been received.</h3>
            <div class="row order_d_inner">
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Order Info</h4>
                        <ul class="list">
                            <li><a href="#"><span>Order number</span> : 60235</a></li>
                            <li><a href="#"><span>Date</span> : 05/10/2023</a></li>
                            <li><a href="#"><span>Total</span> : $ 300</a></li>
                            <li><a href="#"><span>Payment method</span> : COD</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Customer Information</h4>
                        <ul class="list">
                            <li><a href="#"><span>Full Name</span>Dang Tien Dung</a></li>
                            <li><a href="#"><span>Telephone</span>02399382982</a></li>
                            <li><a href="#"><span>Email</span>dung@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Shipping</h4>
                        <ul class="list">
                            <li><a href="#"><span>Shipping method</span>: Express </a></li>
                            <li><a href="#"><span>Address</span>: so 8 ton that thuyet</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="order_details_table">
                <h2>Order Details</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <p>Pixelstore fresh Blackberry</p>
                            </td>
                            <td>
                                <h5>x 02</h5>
                            </td>
                            <td>
                                <p>$720.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Pixelstore fresh Blackberry</p>
                            </td>
                            <td>
                                <h5>x 02</h5>
                            </td>
                            <td>
                                <p>$720.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Pixelstore fresh Blackberry</p>
                            </td>
                            <td>
                                <h5>x 02</h5>
                            </td>
                            <td>
                                <p>$720.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Subtotal</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>$2160.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>VAT</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>10%</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>$2210.00</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <button style="margin-top: 30px;" type="submit" class="site-btn">Continue shopping</button>
        </div>

    </section>
@endsection
