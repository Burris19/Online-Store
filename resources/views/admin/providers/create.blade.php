<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h2 class="box-title">Registrar Proveedores</h2>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
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
                      <label class="col-sm-2 control-label">Descripcion</label>
                      <div class="col-sm-10">
                        {!! Form::textarea('description',null,['class' => 'form-control', 'placeholder' => 'Descriptcion del producto', 'rows' => '4']) !!}

                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Telefono</label>
                      <div class="col-sm-10">
                          {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Precio de venta']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                          {!! Form::select('id_category', array('L' => 'Large', 'S' => 'Small'), null, ['placeholder' => 'Seleccione una categoria', 'class' => 'form-control']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Imagen</label>
                    <div class="col-sm-10">
                        {!! Form::file('image',['class' => 'form-control']) !!}
                    </div>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                <button type="submit" class="btn btn-danger btn-normal">Cancelar</button>
                <button type="submit" class="btn btn-primary pull-right btn-normal">Confirmar</button>
                </div><!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
