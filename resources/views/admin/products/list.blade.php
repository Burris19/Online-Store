@extends('admin._base.home.layout')
@section('header')
    <h1>
      Productos
      <small>listado</small>
    </h1>
    <ol class="breadcrumb" style="">
      <button data-root = 'products' class="btn btn-block btn-primary btn-sm create">Crear registro</button>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Inventario productos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Existencia</th>
                        <th>Proveedor</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data['products'] as  $key => $product)
                            <tr>
                                <td>{{ $key + 1   }}</td>
                                <td>{{ $product['title'] }} </td>
                                <td>{{ $product['category']['title'] }} </td>
                                <td>{{ $product['price']  }}</td>
                                <td>{{ $product['existence'] }} </td>
                                <td>{{ $product['provider']['name'] }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
    </div>
@endsection

@section('other-scripts')
      {!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
      {!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}
      {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
      <script>
        $(function () {
           $("#example1").DataTable();
        });
      </script>
@endsection
