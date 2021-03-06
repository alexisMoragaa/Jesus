@extends('app')
@section('content')
<style>

</style>
<script>
  $(document).ready(function(){

  });
</script>
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <h2 class="center text-muted">{{$breadcrum}}</h2>
    </div>

    <div class=" col-xs-12 col-md-2">
      @if(Auth::user()->perfil==1)
        <a href="{{url('admin/export/delivery/daily')}}" class="btn btn-success btn1 right col-xs-12">Exportar A excel</a>
      @elseif(Auth::user()->perfil==4)
        <a href="{{url('ope/export/delivery/daily')}}" class="btn btn-success btn1 right col-xs-12">Exportar A excel</a>
      @endif
    </div>

    <h5 class="right mt-2">Total Registros <span class="badge">{{$data->count()}}</span></h5>
    </div>

    <div class="row">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12 table-responsive">
          <table class="table table-hover">
            <thead>
              <th>id</th>
              <th>Nombre</th>
              <th>Rut</th>
              <th>fecha Calidad</th>
              <th>Fecha Venta</th>
              <th>Fecha retiro</th>
              <th>Direccion</th>
              <th>Comuna</th>
              <th>Oberservaciones</th>
              <th>To</th>
            </thead>
            <tbody>
              @if(isset($data))

              @foreach ($data as $d)
                <tr>
                  <td>{{$d->id}}</td>
                  <td>{{$d->nombre}} {{$d->apellido}}</td>
                  <td>{{$d->rut}}</td>
                  <td>{{$d->fecha_captacion}}</td>
                  <td>{{$d->fecha_captacion}}</td>
                  <td>{{$d->fecha_agendamiento}}</td>
                  <td>{{$d->direccion}}</td>
                  <td>{{$d->comuna}}</td>
                  <td>{{str_limit($d->observaciones,115)}}</td>
                  <td>{{$d->user->name}} {{$d->user->last_name}}</td>

                </tr>
              @endforeach
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>{{--row del encabezado--}}
</div>
@endsection
