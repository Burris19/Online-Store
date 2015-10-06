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
              {!!Form::open([ 'method' => 'post', 'id'=>'form-create','class'=>'form-horizontal','data-url' => 'typeEmployees'])!!}
                <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Descripcion</label>
                      <div class="col-sm-10">
                          {!! Form::text('description',null,['class' => 'form-control', 'placeholder' => 'Descripcion del tipo de Empleado']) !!}
                      </div>
                  </div>
                  <div class="box-footer">
                  <button data-root="typeEmployees" class="btn btn-danger btn-normal back">Cancelar</button>
                  <button  type="button" id="btn-save" class="btn btn-primary pull-right btn-normal">Guardar</button>
                  </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
{!! Html::script('access/helps.js') !!}
