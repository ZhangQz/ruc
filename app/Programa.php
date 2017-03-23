<?php

namespace App;
use App\Locutor;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
  protected $table = "programa";
  protected $primaryKey = "idprograma";
  protected $fillable = array("nome", "descricao", "link");
  public $timestamps = true;

  public function locutores()
  {
    return $this->belongsTo('App\Programa');
  }
}
