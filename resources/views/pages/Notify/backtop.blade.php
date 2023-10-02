@extends("layouts.customer.app")
@section("main")
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        #backtop{
            width: 50px;
            height: 50px;
            background-color: tomato;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            position: fixed;
            bottom: 40px;
            right: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="backtop">
    <i class="fa-solid fa-chevron-up"></i>
</div>
</body>
<script>
    $(document).ready(function(){
        $(window).scroll(function(){
            if($(this).scrollTop()){
                $('#backtop').fadeIn();
            } else {
                $('#backtop').fadeOut();
            }
        });
        $('#backtop').click(function(){
            $('html', 'body').animate({
                scrollTop: 0
            }, 500)
        });
    });
</script>
</html>
@endsection
