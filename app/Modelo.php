<?php

namespace App;
use App\Veiculo;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = "t_modelo";
    protected $primaryKey = "idModelo";
    protected $fillable = array("nome", "combustivel", "num_lugares", "ano_construcao");
    public $timestamps = true;

    public function veiculos()
	{
		return $this->hasMany('App\Veiculo');
	}
}
