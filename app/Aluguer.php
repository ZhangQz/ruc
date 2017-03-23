<?php

namespace App;
use App\Equipamento;
use App\Cliente;

use Illuminate\Database\Eloquent\Model;

class assistencia extends Model
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
