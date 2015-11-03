@extends('base_modal.modal')

@section('modal-title')
    Detalle del Pedido
@stop

@section('modal-id')
    "modal-edit"
@stop

@section('modal-body')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bodega origen</th>
                            <th>Bodega destino</th>
                            <th>Tipo</th>
                            <th>Tiempo</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as  $key => $detail)
                            <tr>
                                <td>{{ $key + 1   }}</td>
                                <td>{{ $detail['storeOrigin']['name'] }} </td>
                                <td>{{ $detail['storeDestiny']['name'] }} </td>
                                <td>
                                    @if($detail->type === 'entrega')
                                        Entregar al Cliente
                                    @else
                                        Entregara bodega
                                    @endif
                                <td>{{ $detail->time }} </td>
                                <td>{{ $detail->status }} </td>
                                <td>
                                    @if($detail->status === 'bodega')
                                        <img src="bodega.png" alt="">
                                    @else
                                        <img src="entregado.png" alt="">
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

@stop

@section('modal-footer')
    <button id="btn-edit" type="button" class="btn btn-effect-ripple btn-primary">Guardar</button>
    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancelar</button>
@stop
