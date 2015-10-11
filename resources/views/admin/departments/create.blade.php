<div id="respuesta" class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong></strong>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar Departamento y Municipios</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::open( [ 'method' => 'post' , 'id' => 'form-create', 'class' => 'form-horizontal', 'data-url' => 'departments' ]) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Departamento</label>
                        <div class="col-sm-9">
                          {!! Form::text('description',null,['class' => 'form-control', 'placeholder' => 'Nombre del departamento', 'id' => 'depto']) !!}

                        </div>
                    </div>
                    <hr>
                    <div class="form-group col-md-6">
                        <label class="col-sm-4 control-label">Nombre del Municipio</label>
                        <div class="col-sm-8">
                          {!! Form::text('description',null,['class' => 'form-control', 'placeholder' => 'Nombre del departamento', 'id' => 'addCity']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Lista de municipios</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered" id="municipios">
                                    <thead>
                                        <tr>
                                          <td style="width:10px">#</td>
                                          <td>Municipio</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                  <button  type="button" data-root= "employees" class="btn btn-danger btn-normal back">Cancel</button>
                  <button  type="button" id="btn-save2" class="btn btn-primary pull-right btn-normal">Guardar</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{!! Html::script('access/helps.js') !!}
