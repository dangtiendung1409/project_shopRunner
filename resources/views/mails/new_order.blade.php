<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .row-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .col-md-4 {
            width: calc(33.33% - 2px); /* Adjust width as needed, considering the 20px gap */
            background-color: white; /* Set the background color to white */
            border: 1px solid #ddd; /* Add a 1px solid border with #ddd color */
            border-radius: 5px; /* Add a 5px border radius for rounded corners */
            text-align: center;
            padding: 20px 0 20px 0;
        }



        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }



        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details table th, .order-details table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .order-details table th {
            background-color: #f2f2f2;
        }



        .order-summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-summary table th, .order-summary table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .order-summary table th {
            background-color: #f2f2f2;
        }



        body{margin-top:20px;
        }



        .order-list th, .order-list td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .order-list th {
            background-color: #f2f2f2;
        }

        .cart__total {
            background:white;
            padding: 3px 40px 40px;
            width: 30%;
            border: 1px solid  #ddd;
            margin-left: 20px;
        }
        .cart__total h4 {
            font-size: 23px;
            border-bottom: 1px solid #ddd;
            padding: 1px 0 20px 20px;

        }



        .cart__total ul {
            margin-bottom: 5px;
            padding-left: 1px
        }


        .cart__total ul li {
            list-style: none;
            font-size: 16px;
            color: #444444;
            line-height: 50px;
            overflow: hidden;


        }

        .cart__total ul li span {
            font-weight: 700;
            /*color: #e53637;*/
            float: right;
        }

        .Order{
            display: flex;
            justify-content: space-between;
        }

        .Order_list{
            width: 60%;
            background-color: white;
            justify-content: space-between;
            border: 1px solid #ddd;


        }
        .Order_list h4{
            font-size: 23px;
            border-bottom: 1px solid  #ddd;
            padding: 3px 0 20px 20px;
        }


        .Order_list_product {

            display: flex;
            align-items: center;
            justify-content: space-between;

        }


        .Order_list_product1 {
            flex: 2;
            max-width: 30%; /* Điều chỉnh max-width theo cần thiết */
            word-wrap: break-word;
            margin-left: 30px;
            width:300px;

        }
        .Order_list_product1 h5{
            font-size: 18px;
            font-weight: normal; /* Loại bỏ kiểu in đậm */

        }

        .Order_list_product p{

            padding: 17px 5px 0 0;
            text-align: right; /* Canh giá trị giá bên phải */

        }
        .Order_list_product {
            display: flex;
        }

        .Order_list_product img {
            margin-right: 10px;
        }

        .Order_list_product1 {
            flex-grow: 1;
        }

        .quantity, .total {
            margin-left: auto;
        }
        .cart__total ul li.vat {
            border-bottom: 1px solid #ddd;
        }


    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Thank You!</h1>
        <p>Your order #<strong>156</strong> has been successfully placed.<br>
            We sent an email to <strong>dung@gmail.com</strong> with your order confirmation and receipt. If the email hasn't arrived<br>
            within two minutes, please check your spam folder to see if the email was routed there.</p>
        <p><span style="margin-right: 5px;"><i class="fa-regular fa-clock"></i></span><strong>Time Placed</strong>: 16/10/2023 16:12 CEST</p>
    </div>
    <div class="row-container">
        <div class="col-md-4 mb-4">
            <div class="card">
                <i class="fas fa-map-marked-alt fa-3x mx-auto mt-3"></i>
                <div class="card-body text-center">
                    <strong style="font-size: 23px;" class="card-title">Shipping</strong>
                    <p class="card-text">456 Business Avenue</p>
                    <p class="card-text">City, Country</p>
                    <p class="card-text">Phone: +987654321</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <i class="fa-regular fa-credit-card fa-3x mx-auto mt-3"></i>
                <div class="card-body text-center">
                    <strong style="font-size: 23px;" class="card-title">Billing details</strong>
                    <p class="card-text">456 Business Avenue</p>
                    <p class="card-text">City, Country</p>
                    <p class="card-text">Phone: +987654321</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <i class="fa-solid fa-truck-moving fa-3x mx-auto mt-3"></i>
                <div class="card-body text-center">
                    <strong style="font-size: 23px;" class="card-title">Shipping Method</strong>
                    <p class="card-text">789 Mobile Street</p>
                    <p class="card-text">City, Country</p>
                    <p class="card-text">Phone: +543216789</p>
                </div>
            </div>
        </div>
    </div>

    <div class="Order">

        <div class="Order_list">

            <h4>Order List</h4>

            <div class="Order_list_product" >
                <div class="Order_list_product1">

                    <h5>adidas forum</h5>
                </div>
                <div class="quantity">
                    <p>Qty: 1</p>
                </div>
                <div class="total">
                    <p>$19</p>
                </div>
            </div>

        </div>

        <div class="cart__total">
            <h4>Order Summary</h4>

            <ul>
                <li>Subtotal <span>$189.50</span></li>
                <li class="vat">VAT <span>10%</span></li>
                <li>Total <span>$189.50</span></li>
            </ul>
        </div>

    </div>

</div>

</body>
</html>
