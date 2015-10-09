@extends('admin._base.home.layout')
@section('header')
    <h1>
      Vehiculos
      <small>listado</small>
    </h1>
    <ol class="breadcrumb" style="">
      <button data-root = 'cars' class="btn btn-block btn-primary btn-sm create">Crear registro</button>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Vehiculos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Codigo</th>
                        <th>Marca</th>
                        <th>Capacidad</th>
                        <th>Tipo de Vehiculo</th>
                        <th>Tienda</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as  $key => $car)
                            <tr>
                                <td>{{ $key + 1   }}</td>
                                <td>{{ $car->code }} </td>
                                <td>{{ $car->brand}} </td>
                                <td>{{ $car->capacity }}</td>
                                <td>{{ $car->type }} </td>
                                <td>{{ $car->stores->name }}</td>

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
