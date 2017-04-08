<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Locutor;
use App\Programa_Locutor;

class LocutorController extends Controller
{
    public function index() {
        $locutors = Locutor::all(); //retorna todos os locutors

        //verifica se existem ve�culos (em caso negativo, envia um erro para a view)
        if (is_null($locutors))
            return redirect()->route("index")->withErrors('Erro ao carregar locutors. Por favor, tente mais tarde.');
        else
            return view("locutor.index", compact('locutors'));
    }

    public function create() {
        $locutors = Locutor::all(); //retorna todos os locutors

        return view("locutor.create");
    }

    public function store(Request $dados) {
        $locutor = Locutor::create($dados->all()); //cria o ve�culo com os dados do formul�rio (utilizei a facade Request)

        //verifica se o ve�culo foi criado com sucesso
        if(is_null($locutor))
            return redirect()->route('locutor.index')->withErrors('Erro ao criar autor. Por favor, tente novamente.');
        else
            return redirect()->route('locutor.index')->with('autor inserido com sucesso!');
    }

    /* M�todo de store utilizando o facade Input
        public function store() {
            $locutor = autor::create(Input::all());
            return redirect()->route('locutor.index')->with('flash_message', 'Ve�culo inserido com sucesso!');
        }
    */

    public function show($id) {
        $locutor = Locutor::findOrFail($id); //retorna o ve�culo a mostrar

        //verifica se o ve�culo foi preenchido com sucesso
        if (is_null($locutor))
            return redirect()->route('locutor.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        else
            return view('locutor.item', compact('locutor'));
    }

    public function edit($id) {
        $locutor = Locutor::findOrFail($id); //retorna o ve�culo a mostrar

        //verificar se o ve�culo existe (em caso negativo, envia um erro para a view)
        if (is_null($locutor)) {
            return redirect()->route('locutor.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        }
        else
        {
            $locutors = Locutor::all(); //retorna todas os locutors

            return view('locutor.edit', compact('locutor'));
        }
    }

    public function update(Request $dados, $id) {
        $locutor = Locutor::findOrFail($id); //retorna o ve�culo a mostrar

        //verificar se o ve�culo existe (em caso negativo, envia um erro para a view)
        if (is_null($locutor)) {
            return redirect()->route('locutor.index')->withErrors('Erro ao carregar locutor. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //valida��es
            $dados_locutor = $dados->all();
            $locutor->fill($dados_locutor)->save(); //atualiza os dados na BD

            return redirect()->route('locutor.index')->with('flash_message', 'autor atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $locutor = Locutor::findOrFail($id); //retorna o ve�culo a mostrar

        //verificar se o ve�culo existe (em caso negativo, envia um erro para a view)
        if (is_null($locutor)) {
            return redirect()->route('locutor.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        }
        else
        {
            $locutor->delete(); //apaga os dados da BD

            return redirect()->route('locutor.index')->with('flash_message', 'Ve�culo apagado com sucesso!');
        }
    }
}
