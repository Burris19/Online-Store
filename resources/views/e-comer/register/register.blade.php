@extends('e-comer._base.home.layout')

@section('content')
    <div class="container">



    <div class="col-md-12">
        <div class="box">
            <h1>Nuevo Contacto</h1>
            <p class="lead">No tienes una cuenta Creala es gratis?</p>
            <hr>

            {!! Form::open() !!}

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
                    {!! Form::select('department', [ 0 => 'Seleccione un departamento'],null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Municipio') !!}
                    {!! Form::select('id_city', [ 0 => 'Seleccione un municipio' ] ,null,['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('Direccion recidencial') !!}
                    {!! Form::text('address',null,['class' => 'form-control']) !!}
                </div>


            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection
