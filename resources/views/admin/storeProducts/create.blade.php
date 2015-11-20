<table id="example1" class="table ">
  <thead>
    <tr>
      <th>#</th>
      <th>Codigo</th>
      <th>Nombre</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($Products as $key=> $valor)
       <tr>
        <td>{{ $key+1}}</td>
        <td>{{ $valor->code}}</td>
        <td>{{ $valor->title}}</td>
        <td>  {!! Form::checkbox('agree', 1, false) !!}</td>

      </tr>
    @endforeach

  </tbody>
</table>
