<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title","Male-Fashion | Template")</title>
    @yield("before_css")
    @include("layouts.customer.head")
    @yield("after_css")
</head>
<body>

<div id="preloder">
    <div class="loader"></div>
</div>

@include("layouts.customer.header")

<section class="product spad">
    @yield("main")
</section>

@include("layouts.customer.footer")
@include("layouts.customer.icon")

@yield("before_js")
@include("layouts.customer.script")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function (e) {
        $('.range_slider').on('change', function () {
            let left_value = $('#input_left').val();
            let right_value = $('#input_right').val();
            // alert(left_value+right_value);
            $.ajax({
                url: "{{ route('search.products') }}",
                method: "GET",
                data: {left_value: left_value, right_value: right_value},
                success: function (res) {
                    $('.search-result').html(res);
                }
            });
        });
    })
</script>
@yield("after_js")

</body>
</html>
