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
                    <h3 class="box-title">Listado de Ordenes para entregar hoy</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bodega Destino</th>
                            <th>Tipo de entrega</th>
                            <th>Tiempo estimado</th>
                            <th>Direccion Entrega</th>
                            <th>Nombre Destinatario</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as  $key => $order)
                            <tr>
                                <td>{{ $key + 1   }}</td>
                                <td>{{ $order['storeDestiny']['name'] }} </td>
                                <td>{{ $order['type'] }}</td>
                                <td>{{ $order['time'] }}</td>
                                <td>
                                    @if( $order['type'] != 'bodega')
                                        {{ $order['order']['sale']['client']['address'][0]['address'] }}
                                    @endif
                                <td>
                                    @if( $order['type'] != 'bodega')
                                        {{ $order['order']['sale']['client']['FullName'] }}
                                    @endif
                                </td>
                                <td>{{ $order['status'] }}</td>
                                <td>
                                    @if( $order['status'] == 'bodega')
                                        <button data-id="{{ $order->id }}"  title="Confirmar Entrega" class="btn btn-effect-ripple btn-small btn-danger confirmOrder"><i class="fa fa-times"></i></button>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<div id="div-modal"></div>
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
