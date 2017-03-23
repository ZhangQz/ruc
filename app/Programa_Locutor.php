<?php

namespace App;

use App\Programa;
use App\Locutor;
use Illuminate\Database\Eloquent\Model;

class Programa_Locutor extends Model
{
    protected $table = "programa_locutor";
    protected $primaryKey = "idprograma_locutor";
    protected $fillable = array("idprograma", "idlocutor");
    public $timestamps = true;

    public function programa() {
        return $this->belongsTo('App\Programa');
    }

    public function locutor() {
        return $this->belongsTo('App\Locutor');
    }
}