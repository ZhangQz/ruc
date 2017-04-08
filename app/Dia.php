<?php

namespace App;

use App\Grelhageral;
use App\Programa;
use App\Grelha;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table = "dia";
    protected $primaryKey = "iddia";
    protected $fillable = array("nome");
    public $timestamps = true;

    public function GrelhaGeral() {
        return $this->hasMany('App\Programa');
    }
}