<!DOCTYPE html>
<html lang="en">
<head>
    @include('e-comer._base.home.style')
</head>
<body>
@include('e-comer._base.home.navbar')
<div id="all">
    <div id="content">
        @include('e-comer._base.home.carusel')
        @include('e-comer._base.home.products')
    </div>

    @include('e-comer._base.home.footer')
    @include('e-comer._base.home.script')
</div>

</body>
</html>