<div id="hot">
    <div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2>Nuestros Productos</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="product-slider">
            @foreach ( $products as $value )
                <div class="item" data-id="{{ $value->id }}">
                    <div class="product">
                        <div class="flip-container">
                            <div class="flipper">
                                <div class="front">
                                    <a href="#" class="detail">
                                        <img src="{{ $value->image }}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="#" class="detail">
                                        <img src="{{ $value->image }}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="invisible detail">
                            <img src="{{ $value->image }}" alt="" class="img-responsive">
                        </a>
                        <div class="text">
                            <h3><a href="#" class="detail">{{ $value->title }}</a></h3>
                            <p class="price">{{ $value->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
