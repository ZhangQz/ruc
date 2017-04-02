<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Veiculo;
use App\Marca;
use App\Modelo;

class MarcaController extends Controller
{
    public function index() {
        $marcas = Marca::all(); //retorna todos os marcas

        //verifica se existem marcas (em caso negativo, envia um erro para a view)
        if (is_null($marcas))
            return redirect()->route("index")->withErrors('Erro ao carregar marcas. Por favor, tente mais tarde.');
        else
            return view("marca.index", compact('marcas'));
    }

    public function create() {
        $marcas = Marca::all(); //retorna todos os marcas

        return view("marca.create"); //envia as marcas e marcas para a view
    }

    public function store(Request $dados) {
        $marca = Marca::create($dados->all()); //cria o marca com os dados do formulário (utilizei a facade Request)

        //verifica se o marca foi criado com sucesso
        if(is_null($marca))
            return redirect()->route('marca.index')->withErrors('Erro ao criar categoria. Por favor, tente novamente.');
        else
            return redirect()->route('marca.index')->with('categoria inserido com sucesso!');
    }

    /* Método de store utilizando o facade Input
        public function store() {
            $marca = Veiculo::create(Input::all());
            return redirect()->route('marcas.index')->with('flash_message', 'marca inserido com sucesso!');
        }
    */

    public function show($id) {
        $marca = Veiculo::findOrFail($id); //retorna o marca a mostrar
        $marca->marca = Marca::find($marca->marca); //através do ID da marca, solicita os dados da marca e guarda no parâmetro do marca
        $marca->marca = Marca::find($marca->marca); //através do ID do marca, solicita os dados do marca e guarda no parâmetro do marca

        //verifica se o marca foi preenchido com sucesso
        if (is_null($marca))
            return redirect()->route('marca.index')->withErrors('Erro ao carregar marca. Por favor, tente novamente.');
        else
            return view('marca.item', compact('marca'));
    }

    public function edit($id) {
        $marca = Marca::findOrFail($id); //retorna o marca a mostrar

        //verificar se o marca existe (em caso negativo, envia um erro para a view)
        if (is_null($marca)) {
            return redirect()->route('marca.index')->withErrors('Erro ao carregar marca. Por favor, tente novamente.');
        }
        else
        {
            $marcas = Marca::all(); //retorna todas as marcas
            $marcas = Marca::all(); //retorna todas os marcas

            return view('marca.edit', compact('marca', 'marcas', 'marcas'));
        }
    }

    public function update(Request $dados, $id) {
        $marca = Marca::findOrFail($id); //retorna o marca a mostrar

        //verificar se o marca existe (em caso negativo, envia um erro para a view)
        if (is_null($marca)) {
            return redirect()->route('marca.index')->withErrors('Erro ao carregar marca. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //validações
            $dados_marca = $dados->all();
            $marca->fill($dados_marca)->save(); //atualiza os dados na BD

            return redirect()->route('marca.index')->with('flash_message', 'categoria atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $marca = Marca::findOrFail($id); //retorna o marca a mostrar

        //verificar se o marca existe (em caso negativo, envia um erro para a view)
        if (is_null($marca)) {
            return redirect()->route('marca.index')->withErrors('Erro ao carregar marca. Por favor, tente novamente.');
        }
        else
        {
            $marca->delete(); //apaga os dados da BD

            return redirect()->route('marca.index')->with('flash_message', 'marca apagado com sucesso!');
        }
    }
}
