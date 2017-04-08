<?php

namespace App;

use App\Dia;
use App\Programa;
use App\Grelha;
use Illuminate\Database\Eloquent\Model;

class Grelhageral extends Model
{
	protected $table = "grelhageral";
	protected $primaryKey = "idgrelhageral";
	protected $fillable = array("dia", "programa", "grelha");
	public $timestamps = true;

	public function dia() {
		return $this->belongsTo('App\Dia');
	}

	public function programa_locutor() {
		return $this->belongsTo('App\Programa_Locutor');
	}

	public function grelha() {
		return $this->belongsTo('App\Gelha');
	}
}