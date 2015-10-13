@extends('e-comer._base.home.layout')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div id="respuesta" class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong></strong>
            </div>

            <div class="box">
                <h1>Iniciar Sesion</h1>

                <p class="text-muted">Inicia session para poder obtner los maximos beneficios, recuerdad para poder realizar compras debes de tener una cuenta.</p>

                <hr>

                {!!Form::open([ 'method' => 'post', 'id'=>'form-create','class'=>'form-horizontal','data-url' => 'register'])!!}
                    <div class="form-group">
                        {!! Form::label('email') !!}
                        {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'Ingresa tu correo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password') !!}
                        {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Ingresa tu contraseña']) !!}
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" id="login"><i class="fa fa-sign-in"></i> Entrar</button>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
@section('otherScript')
    {!! Html::script('access/helps.js') !!}
@endsection
