<div id="respuesta" class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong></strong>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h2 class="box-title">Registrar Proveedores</h2>
            </div><!-- /.box-header -->
            <!-- form start -->
              {!!Form::open([ 'method' => 'post', 'id'=>'form-create','class'=>'form-horizontal','data-url' => 'providers'])!!}
                <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Codigo</label>
                      <div class="col-sm-10">
                          {!! Form::text('code',null,['class' => 'form-control', 'placeholder' => 'Codigo del Proveedor debe de ser unico']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-10">
                          {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre del Proveedor']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Descripcion</label>
                      <div class="col-sm-10">
                        {!! Form::textarea('description',null,['class' => 'form-control', 'placeholder' => 'Descriptcion del Proveedor', 'rows' => '2']) !!}

                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Telefono</label>
                      <div class="col-sm-10">
                            {!! Form::text('phone',null,['class' => 'form-control', 'placeholder' => 'Nombre del producto']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                            {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'Correo del Proveedor']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Imagen</label>
                    <div class="col-sm-10">
                        {!! Form::file('logo',['class' => 'form-control']) !!}
                    </div>
                  </div>
                
                </div>
                <div class="box-footer">
                <button data-root="providers" class="btn btn-danger btn-normal back">Cancelar</button>
                <button  type="button" id="btn-save" class="btn btn-primary pull-right btn-normal">Guardar</button>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
{!! Html::script('access/helps.js') !!}
