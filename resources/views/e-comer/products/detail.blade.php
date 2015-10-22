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
                    <img name="img" src="{{ $data['image'] }}" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box">
                    <h1 name = 'title', class="text-center">{{ $data['title'] }}</h1>
                    <p class="price" name ="price">{{ $data['price'] }}</p>
                    <p class="text-center buttons">
                        <button class="btn btn-primary addCart" data-id = "{{ $data['id'] }}"><i class="fa fa-shopping-cart"></i> Agregar al carro</button>
                        <button type="button" class="btn btn-default" >Agregar a mis Favoritos</button>
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
</div>

{!! Html::script('access/helpsFrontend.js') !!}