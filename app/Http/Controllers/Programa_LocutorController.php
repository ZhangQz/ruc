<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Programa_Locutor;
use App\Locutor;
use App\Programa;

class Programa_LocutorController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $programa_locutors = Programa_Locutor::all(); //retorna todos os programa_locutor


        foreach($programa_locutors as $programa_locutor) {
            $programa_locutor->locutor = Locutor::find($programa_locutor->idlocutor);
            $programa_locutor->programa = Programa::find($programa_locutor->idprograma);
        }


        if (is_null($programa_locutors))
            return redirect()->route("index")->withErrors('Erro ao carregar programa_locutor. Por favor, tente mais tarde.');
        else
            return view("programa_locutor.index", compact('programa_locutors'));
    }


    public function create() {
        $locutors = Locutor::all();
        $programas = Programa::all();

        return view("programa_locutor.create", compact('locutors', 'programas'));
    }


    public function store(Request $dados) {
        $programa_locutor = Programa_Locutor::create($dados->all());



        if(is_null($programa_locutor))
            return redirect()->route('programa_locutor.index')->withErrors('Erro ao criar ve?culo. Por favor, tente novamente.');
        else
            return redirect()->route('programa_locutor.index')->with('Ve?culo inserido com sucesso!');
    }

    /* Metodo de store utilizando o facade Input
        public function store() {
            $programa_locutor = Programa_Locutor::create(Input::all());
            return redirect()->route('programa_locutor.index')->with('flash_message', 'Ve?culo inserido com sucesso!');
        }
    */

    public function show($id) {
        $programa_locutor = Programa_Locutor::findOrFail($id); //retorna o ve?culo a mostrar
        $programa_locutor->locutor = Locutor::find($programa_locutor->locutor); //atrav?s do ID da locutor, solicita os dados da locutor e guarda no par?metro do ve?culo
        $programa_locutor->programa = Programa::find($programa_locutor->programa); //atrav?s do ID do programa, solicita os dados do programa e guarda no par?metro do ve?culo

        //verifica se o ve?culo foi preenchido com sucesso
        if (is_null($programa_locutor))
            return redirect()->route('programa_locutor.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        else
            return view('programa_locutor.item', compact('programa_locutor'));
    }

    public function edit($id) {
        $programa_locutor = Programa_Locutor::findOrFail($id); //retorna o ve?culo a mostrar

        //verificar se o ve?culo existe (em caso negativo, envia um erro para a view)
        if (is_null($programa_locutor)) {
            return redirect()->route('programa_locutor.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        }
        else
        {
            $locutors = Locutor::all(); //retorna todas as locutors
            $programas = Programa::all(); //retorna todas os programas

            return view('programa_locutor.edit', compact('programa_locutor', 'locutors', 'programas'));
        }
    }

    public function update(Request $dados, $id) {
        $programa_locutor = Programa_Locutor::findOrFail($id); //retorna o ve?culo a mostrar

        //verificar se o ve?culo existe (em caso negativo, envia um erro para a view)
        if (is_null($programa_locutor)) {
            return redirect()->route('programa_locutor.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //valida??es
            $dados_programa_locutor = $dados->all();
            $programa_locutor->fill($dados_programa_locutor)->save(); //atualiza os dados na BD

            return redirect()->route('programa_locutor.index')->with('flash_message', 'Ve?culo atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $programa_locutor = Programa_Locutor::findOrFail($id); //retorna o ve?culo a mostrar

        //verificar se o ve?culo existe (em caso negativo, envia um erro para a view)
        if (is_null($programa_locutor)) {
            return redirect()->route('programa_locutor.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        }
        else
        {
            $programa_locutor->delete(); //apaga os dados da BD

            return redirect()->route('programa_locutor.index')->with('flash_message', 'Ve?culo apagado com sucesso!');
        }
    }
}
