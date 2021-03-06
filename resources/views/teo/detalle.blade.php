@extends('app')

@section('content')
    <style>
        .centrado{
            margin: auto;

        }
        td{

            padding-left: 25px;
            padding-top: 3px;
            font-size: 20px;
        }
        .or{

        }
        #statusRecord{
            margin-top: 20px;
        }


    </style>
    <script>
        $(document).ready(function(){

            $("#pm").hide();

            $("#addstatuscap").click(function() {


                if($("#checkRecord").val()=="1"){
                    alert('ingrese una opcion valida');
                    return false;
                }else {
                   $("#formulario").submit();

                    }


            });

            $("#statusRecord").hide();

            $("#checkRecord").change(function(){

                if($(this).val() !="OK"){
                    $("#statusRecord").fadeIn();
                    if($(this).val() !="1"){
                        $("#statusRecord").fadeIn();
                    }else{
                        $("#statusRecord").fadeOut();
                        $("#motivo").val('');
                    }
                }else{
                    $("#statusRecord").fadeOut();
                    $("#motivo").val('');
                }
            });

            //segunda parte
            $("#statusRecordMdt").hide();

            $("#status_mdt").change(function(){

                if($(this).val() !="OK"){
                    $("#statusRecordMdt").fadeIn();
                    if($(this).val() !="1"){
                        $("#statusRecordMdt").fadeIn();
                    }else{
                        $("#statusRecordMdt").fadeOut();
                        $("#motivoMdt").val('');
                    }
                }else{
                    $("#statusRecordMdt").fadeOut();
                    $("#motivoMdt").val('');
                }
            });

        });
    </script>

 <div class="container">

        <div class="col-md-2">
            <button type="button" class="btn btn-outline btn-default or" onclick="history.go(-1); return false;"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</button>

        </div>

<div  id="dialog" title="Revicion Captaciones" >
    <p id="pm">Modificaciones realizadas con Exito!!</p>
</div>

            <table class="centrado table-hover col-md-6">

                <tr>
                     <td>ID </td>
                     <td id="id_cap">:  {{$detalle->id}}</td>

                </tr>

                <tr>
                    <td>Nombre </td>
                    <td>:  {{$detalle->nombre}}</td>
                </tr>

                <tr>
                    <td>Apellido</td>
                    <td>: {{$detalle->apellido}}</td>
                </tr>

                <tr>
                    <td>Rut</td>
                    <td>: {{$detalle->rut}}</td>
                </tr>

                <tr>
                    <td>Fono</td>
                    <td>: {{$detalle->fono_1}}</td>
                </tr>

                <tr>
                  <td>Correo</td>
                  <td>: {{$detalle->correo_1}}</td>
                </tr>

                <tr>
                  <td>Tipo Retiro</td>
                  <td>: {{$detalle->tipo_retiro}}</td>
                </tr>

                <tr>
                    <td>Fecha Captacion</td>
                    <td>: {{$detalle->fecha_captacion}}</td>
                </tr>

                <tr>
                    <td>Direccion</td>
                    <td>: {{$detalle->direccion}}</td>
                </tr>

                <tr>
                    <td>Comuna</td>
                    <td>: {{$detalle->comuna}}</td>
                </tr>

                     <tr>
                    <td>Ciudad</td>
                    <td>: {{$detalle->ciudad}}</td>
                </tr>

                <tr>
                    <td>Region</td>
                    <td>: {{$detalle->region}}</td>
                </tr>

                <tr>
                    <td>Observaciones</td>
                    <td>: {{$detalle->observaciones}}</td>
                </tr>
                <tr>

                  <tr>
                    <td>Fundacion</td>
                    <td>: {{$foundation}}</td>
                  </tr>

                  <tr>
                      <td>Campaña</td>
                      <td>: {{$detalle->nom_campana}}</td>
                  </tr>

     @if($detalle->tipo_retiro =="Acepta Grabacion")
                    <tr>
                        <td>Cuenta Movistar</td>
                        <td>: {{$detalle->cuenta_movistar}}</td>
                    </tr>
    @else
                    <tr>
                      <td>Fecha Retiro</td>
                      <td>: {{$detalle->fecha_agendamiento}}</td>
                    </tr>

                    <tr>
                        <td>Rutero</td>
                        <td>: {{$detalle->rutero}}</td>
                    </tr>

                    <tr>
                        <td>Horario</td>
                        <td>: {{$detalle->horario}}</td>
                    </tr>

    @endif



                <tr>
                    <td>Forma de Pago</td>
                    <td>: {{$detalle->forma_pago}}</td>
                </tr>

                <tr>
                    <td>Monto</td>
                    <td>: {{$detalle->monto}}</td>
                </tr>



                <tr>
                    <td >Estado Captacion</td>
                    <td id="status">: {{$detalle->estado_captacion}}</td>
                </tr>
@if($detalle->estado_captacion !="OK" && $detalle->estado_captacion!="")
                <tr id="cap">
                    <td >Motivo Captacion</td>
                    <td id="reason">: {{$detalle->motivo_cap}}</td>
                </tr>
 @endif
                <tr id="ruta">
                    <td>Estado de Ruta</td>
                    <td>: {{$detalle->estadoRuta->estado}}</td>
                </tr>

                <tr>
                    <td>Estado Mandato</td>
                    <td>: {{$detalle->estado_mandato}}</td>
                </tr>
    @if($detalle->estado_mandato !="OK" && $detalle->estado_mandato !="")
                <tr id="mdt">
                    <td>Motivo Mandato</td>
                    <td>: {{$detalle->motivo_mdt}}</td>
                </tr>
     @endif

                </tbody>
            </table>

            @if(Auth::user()->perfil ==1 || Auth::user()->perfil==4)
                @if($detalle->estado_captacion != 'OK')

                     @if(Auth::user()->perfil==1)
                         {!! Form::open(array('url'=>'admin/addStatusCap','id'=>'formulario')) !!}
                    @elseif(Auth::user()->perfil==4)
                        {!! Form::open(array('url'=>'ope/addStatusCap','id'=>'formulario')) !!}
                    @endif
                            <div class="col-md-2">
                                <label for="status_cap" class="control-label">Revisar Captacion</label>

                                <select name="status_cap" id="checkRecord" class="form-control">
                                    <option value="1">-- Seleccione --</option>
                                    <option value="OK">OK</option>
                                    <option value="conReparo">Con Reparo</option>
                                    <option value="rechazada">Rechazada</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn1 btn-success " id="addstatuscap" >
                            </div>

                            <div class="col-md-4" id="statusRecord">
                                <label for="" class="control-label">Añadir Estado</label>
                                <input type="text" class="form-control" name="motivo_cap" id="motivo">
                            </div>

                            <input type="hidden" id="cap_id" name="cap_id" value="{{$detalle->id}}">

                      {!! Form::close() !!}
                     <div class="col-md-4">
                        <label for=""></label>
                     </div>
                @elseif($detalle->estadoRuta->estado =="OK")

                        @if($detalle->estado_mandato =="OK")
                          <h3>Estado Actual del Mandato</h3>
                         <h4>{{$detalle->estadoRuta->estado}}</h4>
                       @else
                        <div class="mdt">
                              @if(Auth::user()->perfil==1)
                                  {!! Form::open(array('url'=>'admin/addStatusMdt','id'=>'form-mandato'))!!}
                              @elseif(Auth::user()->perfil==4)
                                  {!! Form::open(array('url'=>'ope/addStatusMdt','id'=>'form-mandato'))!!}
                              @endif
                                  <div class="col-md-2">
                                       <label for="status-mdt" class="control-label"> Revision Mandato</label>
                                       <select name="status_mdt" id="status_mdt" class="form-control">
                                           <option value="1">-- Seleccione --</option>
                                          <option value="OK">OK</option>
                                          <option value="conReparo">Con Reparo</option>
                                          <option value="rechazado">Rechazado</option>
                                       </select>
                                  </div>
                                  <div class="col-md-2">
                                      <input type="submit" class="btn btn1 btn-success " id="enviarmdt" value="Agregar Estado Mandato">

                                  </div>
                                  <div class="col-md-4">
                                      <a href="{{url('ope/mdtWhithEdition',$detalle->id)}}" class="btn btn-warning btn1"> Agregar Estado Con Edicion</a>
                                  </div>

                                  <div class="col-md-4" id="statusRecordMdt">
                                       <label for="reasonmdt" class="control-label">Estado</label>
                                      <input type="text" class="form-control" id="motivoMdt" name="motivoMdt">
                                   </div>
                                  <input type="hidden" name="id_captacion" value="{{$detalle->id}}">
                              {!! Form::close() !!}
                              </div>

                    @endif
                @endif


           @else
             <h3>Estado Actual de la Visita</h3>
             <h4>{{$detalle->estadoRuta->estado}}</h4>
             @endif<!--cierre if perfiles-->


 </div>


@endsection
