<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class informeRuta extends Model {


protected $table='informe_rutas';

protected $fillable=['id_captacion','id_ruta','fecha_agendamiento','estado','num_retiro'];

public function Captacion(){
  return $this->belongTo(CaptacionesExitosa::class);
}

public function Ruta(){
  return  $this->belongsTo(estadoRuta::class);
}

}
