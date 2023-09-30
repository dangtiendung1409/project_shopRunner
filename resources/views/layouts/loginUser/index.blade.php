<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield("title","Male-Fashion | Template")</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/loginUser/css/style.css">
</head>
@include("layouts.loginUser.nav")
<section>
    @yield("main")
</section>

<script src="/loginUser/js/script.js"></script>
</body>

</html>
