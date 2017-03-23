<?php

namespace App;
use App\Noticia;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categoria";
    protected $primaryKey = "idcategoria";
    protected $fillable = array("nome");
    public $timestamps = true;

    public function noticia()
    {
        return $this->hasMany('App\Noticia');
    }
}
