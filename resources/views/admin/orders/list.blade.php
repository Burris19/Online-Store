@extends('admin._base.home.layout')
@section('header')
    <h1>
        Ordenes
        <small>Listado</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Ordenes general</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bodega Origen</th>
                            <th>Bodega Destino</th>
                            <th>Direccion Entrega</th>
                            <th>Nombre Destinatario</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as  $key => $order)
                            <tr>
                                <td>{{ $key + 1   }}</td>
                                <td>{{ $order['storeOrigin']['name'] }} </td>
                                <td>{{ $order['storeDestiny']['name'] }} </td>
                                <td>{{ $order['sale']['client']['address'][0]['address'] }} </td>
                                <td>{{ $order['sale']['client']['FullName'] }} </td>
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
    {!! Html::script('access/helps.js') !!}
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endsection
