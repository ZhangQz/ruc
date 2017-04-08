<?php

namespace App;
use App\Programa;
use App\Noticia;

use Illuminate\Database\Eloquent\Model;

class Locutor extends Model
{
	protected $table = "locutor";
	protected $primaryKey = "idlocutor";
	protected $fillable = array("nome");
	public $timestamps = true;

	public function programa_locutor()
	{
		return $this->hasMany('App\Prorama_Locutor');
	}
}
