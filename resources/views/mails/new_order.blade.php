<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
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

        .order-details {
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

        .order-summary {
            margin-bottom: 20px;
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

        .continue-shopping {
            text-align: center;
            margin-bottom: 20px;
        }
        body{margin-top:20px;
        }

        .order-list {
            width: 100%;
            border-collapse: collapse;
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
            padding: 35px 40px 40px;
            width: 370px;
            margin-left: 66%;
            border: 1px solid  #ddd;
        }




        .cart__total ul {
            margin-bottom: 5px;
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
            color: #e53637;
            float: right;
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
    <div class="row">
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
    <h4>Order List</h4>



    <div class="cart__total">
        <h4>Order Summary</h4>
        <ul>
            <li>Subtotal <span>$ 169.50</span></li>
            <li>VAT <span>10%</span></li>
            <li>Total <span>$ 189.50</span></li>
        </ul>

    </div>


</div>

</body>
</html>
