<?php

namespace App;
use App\Equipamento;
use App\Cliente;

use Illuminate\Database\Eloquent\Model;

class aluguer extends Model
{
    protected $table = "aluguer";
    protected $primaryKey = "id_aluguer";
    protected $fillable = array("iduser", "idequipamento", "idkit", "data_inicio", "data_fim", "preco_total");
    public $timestamps = true;

    public function iduser()
    {
        return $this->belongsTo('App\User');
    }
}
