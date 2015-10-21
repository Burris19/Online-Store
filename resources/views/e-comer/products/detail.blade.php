<div class="container">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li>Productos</li>
            <li>Detalle</li>
            <li>{{ $data['title'] }}</li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="row" id="productMain">
            <div class="col-sm-6">
                <div id="mainImage">
                    <img src="{{ $data['image'] }}" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box">
                    <h1 class="text-center">{{ $data['title'] }}</h1>
                    <p class="price">{{ $data['price'] }}</p>
                    <p class="text-center buttons">
                        <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        <a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                    </p>
                </div>

                <div class="row" id="thumbs">
                    <div class="col-xs-4">
                        <a href="{{ $data['image'] }}" class="thumb">
                            <img src="{{ $data['image'] }}" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{ $data['image'] }}" class="thumb">
                            <img src="{{ $data['image'] }}" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{ $data['image'] }}" class="thumb">
                            <img src="{{ $data['image'] }}" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="box" id="details">
            <blockquote>
                <p><em>{{ $data['description'] }}</em>
                </p>
            </blockquote>
        </div>



    </div>
    <!-- /.col-md-9 -->
</div>