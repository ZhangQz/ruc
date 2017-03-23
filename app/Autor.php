<?php

namespace App;
use App\Noticia;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
	protected $table = "autor";
	protected $primaryKey = "idautor";
	protected $fillable = array("nome");
	public $timestamps = true;

	public function Noticias()
	{
		return $this->hasMany('App\Noticia');
	}
}
