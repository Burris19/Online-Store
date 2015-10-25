<div class="container">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li>Inicio</li>
            <li>Carrito de compras</li>
        </ul>
    </div>
    <div class="col-md-12" id="basket">
        <div class="box">
            <form method="post" action="checkout1.html">
                <h1>Carrito de compras</h1>
                <p class="text-muted">Actualmente tienes 3 artículo (s) en su carrito</p>
                <div class="table-responsive">
                    <table class="table" id="tableBuy">
                        <thead>
                        <tr>
                            <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Descuento</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total</th>
                                <th id="fullTotal">Q 0.00</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="pull-left">
                        <a href="/" class="btn btn-default"><i class="fa fa-chevron-left"></i>Seguir comprando</a>
                    </div>
                    <div class="pull-right">
                        @if (Auth::check())
                            <a href="/" class="btn btn-primary" id='btn-process-buy'><i class="fa fa-chevron-right"></i>Procesar Compra</a>
                        @else
                            <p>Para realizar la compra debe de <a href="/login">Iniciar seccion</a></p>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{!! Html::script('access/helpsFrontend.js') !!}
