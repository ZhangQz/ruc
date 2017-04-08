<?php

namespace App;

use App\Grelhageral;
use App\Programa;
use App\Dia;
use Illuminate\Database\Eloquent\Model;

class Grelha extends Model
{
    protected $table = "grelha";
    protected $primaryKey = "idgrelha";
    protected $fillable = array("nome");
    public $timestamps = true;

    public function GrelhaGeral() {
        return $this->hasMany('App\Programa');
    }
}