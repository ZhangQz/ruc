<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Grelhageral;
use App\Locutor;
use App\Programa_Locutor;
use App\Programa;

class ProgramaController extends Controller
{
    public function index() {
        $programas = Programa::all(); //retorna todos os programas

        //verifica se existem programas (em caso negativo, envia um erro para a view)
        if (is_null($programas))
            return redirect()->route("index")->withErrors('Erro ao carregar programas. Por favor, tente mais tarde.');
        else
            return view("programa.index", compact('programas'));
    }

    public function create() {
        $programas = Programa::all(); //retorna todos os programas

        return view("programa.create"); //envia as programas e programas para a view
    }

    public function store(Request $dados) {
        $programa = Programa::create($dados->all()); //cria o programa com os dados do formul�rio (utilizei a facade Request)

        //verifica se o programa foi criado com sucesso
        if(is_null($programa))
            return redirect()->route('programa.index')->withErrors('Erro ao criar programa. Por favor, tente novamente.');
        else
            return redirect()->route('programa.index')->with('programa inserido com sucesso!');
    }

    /* M�todo de store utilizando o facade Input
        public function store() {
            $programa = grelhageral::create(Input::all());
            return redirect()->route('programas.index')->with('flash_message', 'programa inserido com sucesso!');
        }
    */

    public function show($id) {
        $programa = Grelhageral::findOrFail($id); //retorna o programa a mostrar
        $programa->programa = Programa::find($programa->programa); //atrav�s do ID da programa, solicita os dados da programa e guarda no par�metro do programa
        $programa->programa = Programa::find($programa->programa); //atrav�s do ID do programa, solicita os dados do programa e guarda no par�metro do programa

        //verifica se o programa foi preenchido com sucesso
        if (is_null($programa))
            return redirect()->route('programa.index')->withErrors('Erro ao carregar programa. Por favor, tente novamente.');
        else
            return view('programa.item', compact('programa'));
    }

    public function edit($id) {
        $programa = Programa::findOrFail($id); //retorna o programa a mostrar

        //verificar se o programa existe (em caso negativo, envia um erro para a view)
        if (is_null($programa)) {
            return redirect()->route('programa.index')->withErrors('Erro ao carregar programa. Por favor, tente novamente.');
        }
        else
        {
            $programas = Programa::all(); //retorna todas as programas
            $programas = Programa::all(); //retorna todas os programas

            return view('programa.edit', compact('programa', 'programas', 'programas'));
        }
    }

    public function update(Request $dados, $id) {
        $programa = Programa::findOrFail($id); //retorna o programa a mostrar

        //verificar se o programa existe (em caso negativo, envia um erro para a view)
        if (is_null($programa)) {
            return redirect()->route('programa.index')->withErrors('Erro ao carregar programa. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //valida��es
            $dados_programa = $dados->all();
            $programa->fill($dados_programa)->save(); //atualiza os dados na BD

            return redirect()->route('programa.index')->with('flash_message', 'programa atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $programa = Programa::findOrFail($id); //retorna o programa a mostrar

        //verificar se o programa existe (em caso negativo, envia um erro para a view)
        if (is_null($programa)) {
            return redirect()->route('programa.index')->withErrors('Erro ao carregar programa. Por favor, tente novamente.');
        }
        else
        {
            $programa->delete(); //apaga os dados da BD

            return redirect()->route('programa.index')->with('flash_message', 'programa apagado com sucesso!');
        }
    }
}
