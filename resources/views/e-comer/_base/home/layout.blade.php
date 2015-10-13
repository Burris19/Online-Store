<!DOCTYPE html>
<html lang="en">
<head>
    @include('e-comer._base.home.style')
</head>
<body>
@include('e-comer._base.home.navbar')
<div id="all">

    <div id="content">
        @yield('content')
    </div>

    @include('e-comer._base.home.footer')
    @include('e-comer._base.home.script')
    @yield('otherScript')
</div>

</body>
</html>