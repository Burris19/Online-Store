@extends('e-comer._base.home.layout')

@section('content')

<style>
  #google_canvas{
    border: solid;
    height: 600px;
  }
</style>
    <div class="container">
        <div class="col-md-5">
            <div id="respuesta" class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong></strong>
            </div>
            <div class="box">
                <h1>Nuevo Contacto</h1>
                <p class="lead">No tienes una cuenta, Creala es gratis?</p>
                <hr>

                {!!Form::open([ 'method' => 'post', 'id'=>'form-create','class'=>'form-horizontal','data-url' => 'register'])!!}

                    <div class="form-group">
                        {!! Form::label('Nombre') !!}
                        {!! Form::text('name',null,['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Apellido') !!}
                        {!! Form::text('last_name',null,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Telefono') !!}
                        {!! Form::number('phone',null,['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email') !!}
                        {!! Form::email('email',null,['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password') !!}
                        {!! Form::password('password',['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Departamento') !!}
                        {!! Form::select('department', $departments, null , ['placeholder' => 'Seleccione un Departamento', 'class' => 'form-control', 'id' => 'idDepartment']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Municipio') !!}
                        {!! Form::select('id_city', [] ,null , ['placeholder' => 'Seleccione un Departamento', 'class' => 'form-control', 'id' => 'cboMunicipio']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Direccion recidencial') !!}
                        {!! Form::text('address',null,['class' => 'form-control']) !!}
                    </div>
                    <div class="text-center">
                        <button type="button" id="btn-register" class="btn btn-primary"><i class="fa fa-user"></i>Registrar</button>
                    </div>

            </div>
        </div>

        <div class="col-md-7">
            <div class="box" id="google_canvas">
        </div>
            <div>
                <div class="form-group">
                    {!! Form::label('Latitude') !!}
                    {!! Form::text('latitude',null,['class' => 'form-control lati'  ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Longitude') !!}
                    {!! Form::text('longitude',null,['class' => 'form-control lodi' ]) !!}
                </div>
            </div>
    </div>

{!! Form::close() !!}


@endsection
@section('otherScript')
    {{--{!! Html::script('access/mapsRegister.js') !!}--}}
    {!! Html::script('access/helps.js') !!}

@endsection
