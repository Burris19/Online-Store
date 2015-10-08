<div id="respuesta" class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong></strong>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar Empleados</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::open( [ 'method' => 'post' , 'id' => 'form-create', 'class' => 'form-horizontal', 'data-url' => 'employees' ]) !!}

                <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-10">
                          {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre del Empleado']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Apellido</label>
                      <div class="col-sm-10">
                          {!! Form::text('last_name',null,['class' => 'form-control', 'placeholder' => 'Apellido del Empleado']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Telefono</label>
                      <div class="col-sm-10">
                        {!! Form::text('phone',null,['class' => 'form-control', 'placeholder' => 'Telefono del Empleado']) !!}

                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tipo de Licencia</label>
                      <div class="col-sm-10">
                        {!! Form::select('type_license', ['1' => 'Tipo A', '2' => 'Tipo B' , '3' => 'Tipo C'] , null , ['placeholder' => 'Seleccione un tipo de empleado', 'class' => 'form-control']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label"># de licencia</label>
                      <div class="col-sm-10">
                          {!! Form::number('license_no',null, ['placeholder' => 'Numero de licencia', 'class' => 'form-control']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tipo de Empleado</label>
                      <div class="col-sm-10">
                        {!! Form::select('id_type_employee', $Types, null , ['placeholder' => 'Seleccione un tipo de empleado', 'class' => 'form-control']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tienda</label>
                      <div class="col-sm-10">
                        {!! Form::select('id_store', $Store, null , ['placeholder' => 'Seleccione una tienda', 'class' => 'form-control']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Imagen</label>
                    <div class="col-sm-10">
                        {!! Form::file('image',['class' => 'form-control']) !!}
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
