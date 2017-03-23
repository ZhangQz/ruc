<?php

namespace App;
use App\Veiculo;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = "t_marca";
    protected $primaryKey = "idMarca";
    protected $fillable = array("nome", "stand");
    public $timestamps = true;

    public function veiculos()
	{
		return $this->hasMany('App\Veiculo');
	}
}
