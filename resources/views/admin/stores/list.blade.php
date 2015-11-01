@extends('admin._base.home.layout')
@section('header')
    <h1>
      Tiendas
      <small>Listado</small>
    </h1>
    <ol class="breadcrumb" style="">
      <button data-root = 'stores' class="btn btn-block btn-primary btn-sm create">Crear registro</button>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Tiendas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Direccion Fisica</th>
                      </tr>
                    </thead>
                    <tbody>
   	 	                  @foreach($data as $key=> $valor)
   	 		                   <tr>
                     	 			<td>{{ $key+1}}</td>
                     	 			<td>{{ $valor->code}}</td>
                     	 			<td>{{ $valor->name}}</td>
                     	 			<td>{{ $valor->phone}}</td>
                                    <td>{{ $valor['city']['department']['description'] }}</td>
                                   <td>{{ $valor['city']['description'] }}</td>
                                    <td>{{ $valor->address }}</td>
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
