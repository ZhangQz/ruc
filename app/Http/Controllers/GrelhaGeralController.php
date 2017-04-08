<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Grelhageral;
use App\Locutor;
use App\Programa;

class GrelhageralController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $grelhagerals = Grelhageral::all(); //retorna todos os ve?culos


        foreach($grelhagerals as $grelhageral) {
            $grelhageral->locutor = Locutor::find($grelhageral->locutor); //atrav?s do ID da locutor, solicita os dados da locutor e guarda no par?metro do ve?culo
            $grelhageral->programa = Programa::find($grelhageral->programa); //atrav?s do ID do programa, solicita os dados do programa e guarda no par?metro do ve?culo
        }

        //verifica se existem ve?culos (em caso negativo, envia um erro para a view)
        if (is_null($grelhagerals))
            return redirect()->route("index")->withErrors('Erro ao carregar ve?culos. Por favor, tente mais tarde.');
        else
            return view("grelhageral.index", compact('grelhageral'));
    }

    public function create() {
        $locutors = Locutor::all(); //retorna todas as locutors
        $programas = Programa::all(); //retorna todos os programas

        return view("grelhageral.create", compact('locutors', 'programas')); //envia as locutors e programas para a view
    }

    public function store(Request $dados) {
        $grelhageral = Grelhageral::create($dados->all()); //cria o ve?culo com os dados do formul?rio (utilizei a facade Request)

        //verifica se o ve?culo foi criado com sucesso
        if(is_null($grelhageral))
            return redirect()->route('grelhageral.index')->withErrors('Erro ao criar ve?culo. Por favor, tente novamente.');
        else
            return redirect()->route('grelhageral.index')->with('Ve?culo inserido com sucesso!');
    }

    /* M?todo de store utilizando o facade Input
        public function store() {
            $grelhageral = Grelhageral::create(Input::all());
            return redirect()->route('grelhageral.index')->with('flash_message', 'Ve?culo inserido com sucesso!');
        }
    */

    public function show($id) {
        $grelhageral = Grelhageral::findOrFail($id); //retorna o ve?culo a mostrar
        $grelhageral->locutor = Locutor::find($grelhageral->locutor); //atrav?s do ID da locutor, solicita os dados da locutor e guarda no par?metro do ve?culo
        $grelhageral->programa = Programa::find($grelhageral->programa); //atrav?s do ID do programa, solicita os dados do programa e guarda no par?metro do ve?culo

        //verifica se o ve?culo foi preenchido com sucesso
        if (is_null($grelhageral))
            return redirect()->route('grelhageral.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        else
            return view('grelhageral.item', compact('grelhageral'));
    }

    public function edit($id) {
        $grelhageral = Grelhageral::findOrFail($id); //retorna o ve?culo a mostrar

        //verificar se o ve?culo existe (em caso negativo, envia um erro para a view)
        if (is_null($grelhageral)) {
            return redirect()->route('grelhageral.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        }
        else
        {
            $locutors = Locutor::all(); //retorna todas as locutors
            $programas = Programa::all(); //retorna todas os programas

            return view('grelhageral.edit', compact('grelhageral', 'locutors', 'programas'));
        }
    }

    public function update(Request $dados, $id) {
        $grelhageral = Grelhageral::findOrFail($id); //retorna o ve?culo a mostrar

        //verificar se o ve?culo existe (em caso negativo, envia um erro para a view)
        if (is_null($grelhageral)) {
            return redirect()->route('grelhageral.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //valida??es
            $dados_grelhageral = $dados->all();
            $grelhageral->fill($dados_grelhageral)->save(); //atualiza os dados na BD

            return redirect()->route('grelhageral.index')->with('flash_message', 'Ve?culo atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $grelhageral = Grelhageral::findOrFail($id); //retorna o ve?culo a mostrar

        //verificar se o ve?culo existe (em caso negativo, envia um erro para a view)
        if (is_null($grelhageral)) {
            return redirect()->route('grelhageral.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        }
        else
        {
            $grelhageral->delete(); //apaga os dados da BD

            return redirect()->route('grelhageral.index')->with('flash_message', 'Ve?culo apagado com sucesso!');
        }
    }
}
