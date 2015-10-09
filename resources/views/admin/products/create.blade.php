<div id="respuesta" class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong></strong>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar producto</h3>
            </div>


            {!! Form::open( [ 'method' => 'post' , 'id' => 'form-create', 'class' => 'form-horizontal', 'data-url' => 'products' ]) !!}

                <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Codigo</label>
                      <div class="col-sm-10">
                          {!! Form::text('code',null,['class' => 'form-control', 'placeholder' => 'Codigo del producto debe de ser unico']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-10">
                          {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Nombre del producto']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">descripcion</label>
                      <div class="col-sm-10">
                        {!! Form::textarea('description',null,['class' => 'form-control', 'placeholder' => 'Descriptcion del producto', 'rows' => '4']) !!}

                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Precio</label>
                      <div class="col-sm-10">
                          {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Precio de venta']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Categoria</label>
                      <div class="col-sm-10">
                          {!! Form::select('id_category', $Categories, null, ['placeholder' => 'Seleccione una categoria', 'class' => 'form-control']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Proveedor</label>
                      <div class="col-sm-10">
                          {!! Form::select('id_provider', $Provider, null , ['placeholder' => 'Seleccione un proveedor', 'class' => 'form-control']) !!}

                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Existencia</label>
                      <div class="col-sm-10">
                          {!! Form::number('existence', null, ['class' => 'form-control', 'placeholder' => 'Cantidad de producto']) !!}
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
                    <button  type="button" data-root= "products" class="btn btn-danger btn-normal back">Cancel</button>
                    <button  type="button" id="btn-save" class="btn btn-primary pull-right btn-normal">Guardar</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{!! Html::script('access/helps.js') !!}
