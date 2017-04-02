<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Modelo;
use App\Marca;
use App\Veiculos;

class ModeloController extends Controller
{
    public function index() {
        $modelos = Modelo::all(); //retorna todos os modelos

        //verifica se existem ve�culos (em caso negativo, envia um erro para a view)
        if (is_null($modelos))
            return redirect()->route("index")->withErrors('Erro ao carregar modelos. Por favor, tente mais tarde.');
        else
            return view("modelo.index", compact('modelos'));
    }

    public function create() {
        $modelos = Modelo::all(); //retorna todos os modelos

        return view("modelo.create");
    }

    public function store(Request $dados) {
        $modelo = Modelo::create($dados->all()); //cria o ve�culo com os dados do formul�rio (utilizei a facade Request)

        //verifica se o ve�culo foi criado com sucesso
        if(is_null($modelo))
            return redirect()->route('modelo.index')->withErrors('Erro ao criar autor. Por favor, tente novamente.');
        else
            return redirect()->route('modelo.index')->with('autor inserido com sucesso!');
    }

    /* M�todo de store utilizando o facade Input
        public function store() {
            $modelo = autor::create(Input::all());
            return redirect()->route('modelo.index')->with('flash_message', 'Ve�culo inserido com sucesso!');
        }
    */

    public function show($id) {
        $modelo = Modelo::findOrFail($id); //retorna o ve�culo a mostrar

        //verifica se o ve�culo foi preenchido com sucesso
        if (is_null($modelo))
            return redirect()->route('modelo.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        else
            return view('modelo.item', compact('modelo'));
    }

    public function edit($id) {
        $modelo = Modelo::findOrFail($id); //retorna o ve�culo a mostrar

        //verificar se o ve�culo existe (em caso negativo, envia um erro para a view)
        if (is_null($modelo)) {
            return redirect()->route('modelo.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        }
        else
        {
            $modelos = Modelo::all(); //retorna todas os modelos

            return view('modelo.edit', compact('modelo'));
        }
    }

    public function update(Request $dados, $id) {
        $modelo = Modelo::findOrFail($id); //retorna o ve�culo a mostrar

        //verificar se o ve�culo existe (em caso negativo, envia um erro para a view)
        if (is_null($modelo)) {
            return redirect()->route('modelo.index')->withErrors('Erro ao carregar modelo. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //valida��es
            $dados_modelo = $dados->all();
            $modelo->fill($dados_modelo)->save(); //atualiza os dados na BD

            return redirect()->route('modelo.index')->with('flash_message', 'autor atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $modelo = Modelo::findOrFail($id); //retorna o ve�culo a mostrar

        //verificar se o ve�culo existe (em caso negativo, envia um erro para a view)
        if (is_null($modelo)) {
            return redirect()->route('modelo.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        }
        else
        {
            $modelo->delete(); //apaga os dados da BD

            return redirect()->route('modelo.index')->with('flash_message', 'Ve�culo apagado com sucesso!');
        }
    }
}
