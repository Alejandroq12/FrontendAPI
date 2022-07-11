<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    @include('modules.head')
</head>

<body>
    @include('modules.navbar')
    <div class="mapMaxSize container animate__animated animate__fadeInDown" id="app"></div>
    @include('modules.footer')
</body>
<script src="{{asset('../js/main.js')}}" defer></script>

</html>