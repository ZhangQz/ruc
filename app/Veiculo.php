<?php

namespace App;

use App\Marca;
use App\Modelo;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = "t_veiculo";
    protected $primaryKey = "idVeiculo";
    protected $fillable = array("nome", "marca", "modelo", "cor", "numkms");
    public $timestamps = true;

    public function marca() {
    	return $this->belongsTo('App\Marca');
    }

    public function modelo() {
    	return $this->belongsTo('App\Modelo');
    }
}