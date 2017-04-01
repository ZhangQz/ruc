<?php

namespace App;
use App\Autor;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
	protected $table = "Noticia";
	protected $primaryKey = "idnoticia";
	protected $fillable = array("titulo", "artigo", "data_noticia", "extra");
	public $timestamps = true;

	public function Autor()
	{
		return $this->belongsTo('App\Autor');
	}

	public function Categoria()
	{
		return $this->belongsTo('App\Categoria');
	}
}
