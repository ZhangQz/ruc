<?php

namespace App;
use App\Programa_Locutor;
use App\Grelhageral;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
  protected $table = "programa";
  protected $primaryKey = "idprograma";
  protected $fillable = array("nome", "descricao", "link");
  public $timestamps = true;

  public function Programa_Locutor()
  {
    return $this->hasMany('App\Programa_Locutor');
  }

  public function grelhageral()
  {
    return $this->hasMany('App\Programa_Locutor');
  }
}
