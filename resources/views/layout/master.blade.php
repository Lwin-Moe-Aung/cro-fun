<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    @include('layout.header')
</head>

<body style="background-color:white;position:relative;" id="myPage">
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


@include('layout.nav')

	<div class="move-container">
    @yield('container')
    </div>

</body>
</html>


