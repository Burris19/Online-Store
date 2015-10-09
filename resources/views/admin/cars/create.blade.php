<div id="respuesta" class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong></strong>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar Vehiculos</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::open( [ 'method' => 'post' , 'id' => 'form-create', 'class' => 'form-horizontal', 'data-url' => 'cars' ]) !!}

                <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Codigo</label>
                      <div class="col-sm-10">
                          {!! Form::text('code',null,['class' => 'form-control', 'placeholder' => 'Codigo del Vehicul']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Capacidad</label>
                      <div class="col-sm-10">
                          {!! Form::text('capacity',null,['class' => 'form-control', 'placeholder' => 'Capacidad del Vehiculo']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Marca</label>
                      <div class="col-sm-10">
                        {!! Form::text('brand',null,['class' => 'form-control', 'placeholder' => 'Marca del Vehiculo']) !!}

                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tipo</label>
                      <div class="col-sm-10">
                        {!! Form::select('type', ['1' => 'Camion', '2' => 'Motocicleta' , '3' => 'Pick-Up'] , null , ['placeholder' => 'Sleccione Un tipo', 'class' => 'form-control']) !!}
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tienda</label>
                      <div class="col-sm-10">
                        {!! Form::select('id_store', $Store, null , ['placeholder' => 'Seleccione una Tienda', 'class' => 'form-control']) !!}
                      </div>
                  </div>

                </div>

                <div class="box-footer">
                    <button  type="button" data-root= "employees" class="btn btn-danger btn-normal back">Cancel</button>
                    <button  type="button" id="btn-save" class="btn btn-primary pull-right btn-normal">Guardar</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{!! Html::script('access/helps.js') !!}
