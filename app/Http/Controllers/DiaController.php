<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Veiculo;
use App\Dia;
use App\Modelo;

class DiaController extends Controller
{
    public function index() {
        $dias = Dia::all(); //retorna todos os dias

        //verifica se existem dias (em caso negativo, envia um erro para a view)
        if (is_null($dias))
            return redirect()->route("index")->withErrors('Erro ao carregar dias. Por favor, tente mais tarde.');
        else
            return view("dia.index", compact('dias'));
    }

    public function create() {
        $dias = Dia::all(); //retorna todos os dias

        return view("dia.create"); //envia as dias e dias para a view
    }

    public function store(Request $dados) {
        $dia = Dia::create($dados->all()); //cria o dia com os dados do formul�rio (utilizei a facade Request)

        //verifica se o dia foi criado com sucesso
        if(is_null($dia))
            return redirect()->route('dia.index')->withErrors('Erro ao criar categoria. Por favor, tente novamente.');
        else
            return redirect()->route('dia.index')->with('categoria inserido com sucesso!');
    }

    /* M�todo de store utilizando o facade Input
        public function store() {
            $dia = Veiculo::create(Input::all());
            return redirect()->route('dias.index')->with('flash_message', 'dia inserido com sucesso!');
        }
    */

    public function show($id) {
        $dia = Veiculo::findOrFail($id); //retorna o dia a mostrar
        $dia->dia = Dia::find($dia->dia); //atrav�s do ID da dia, solicita os dados da dia e guarda no par�metro do dia
        $dia->dia = Dia::find($dia->dia); //atrav�s do ID do dia, solicita os dados do dia e guarda no par�metro do dia

        //verifica se o dia foi preenchido com sucesso
        if (is_null($dia))
            return redirect()->route('dia.index')->withErrors('Erro ao carregar dia. Por favor, tente novamente.');
        else
            return view('dia.item', compact('dia'));
    }

    public function edit($id) {
        $dia = Dia::findOrFail($id); //retorna o dia a mostrar

        //verificar se o dia existe (em caso negativo, envia um erro para a view)
        if (is_null($dia)) {
            return redirect()->route('dia.index')->withErrors('Erro ao carregar dia. Por favor, tente novamente.');
        }
        else
        {
            $dias = Dia::all(); //retorna todas as dias
            $dias = Dia::all(); //retorna todas os dias

            return view('dia.edit', compact('dia', 'dias', 'dias'));
        }
    }

    public function update(Request $dados, $id) {
        $dia = Dia::findOrFail($id); //retorna o dia a mostrar

        //verificar se o dia existe (em caso negativo, envia um erro para a view)
        if (is_null($dia)) {
            return redirect()->route('dia.index')->withErrors('Erro ao carregar dia. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //valida��es
            $dados_dia = $dados->all();
            $dia->fill($dados_dia)->save(); //atualiza os dados na BD

            return redirect()->route('dia.index')->with('flash_message', 'categoria atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $dia = Dia::findOrFail($id); //retorna o dia a mostrar

        //verificar se o dia existe (em caso negativo, envia um erro para a view)
        if (is_null($dia)) {
            return redirect()->route('dia.index')->withErrors('Erro ao carregar dia. Por favor, tente novamente.');
        }
        else
        {
            $dia->delete(); //apaga os dados da BD

            return redirect()->route('dia.index')->with('flash_message', 'dia apagado com sucesso!');
        }
    }
}
