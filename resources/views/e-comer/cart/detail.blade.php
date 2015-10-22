<div class="container">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li>Inicio</li>
            <li>Carrito de compras</li>
        </ul>
    </div>
    <div class="col-md-9" id="basket">
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
                                <th>$446.00</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="pull-left">
                        <a href="category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Seguir comprando</a>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Procesar Compra<i class="fa fa-chevron-right"></i>
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="col-md-3">
        <div class="box" id="order-summary">
        <div class="box-header">
        <h3>Order summary</h3>
        </div>
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

        <div class="table-responsive">
        <table class="table">
        <tbody>
        <tr>
        <td>Order subtotal</td>
        <th>$446.00</th>
        </tr>
        <tr>
        <td>Shipping and handling</td>
        <th>$10.00</th>
        </tr>
        <tr>
        <td>Tax</td>
        <th>$0.00</th>
        </tr>
        <tr class="total">
        <td>Total</td>
        <th>$456.00</th>
        </tr>
        </tbody>
        </table>
        </div>
        </div>

    </div>


</div>
{!! Html::script('access/helpsFrontend.js') !!}
