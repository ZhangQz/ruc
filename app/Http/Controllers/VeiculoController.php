<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Veiculo;
use App\Marca;
use App\Modelo;

class VeiculoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
    	$veiculos = Veiculo::all(); //retorna todos os ve�culos

        //percorre todos os ve�culos
        foreach($veiculos as $veiculo) {
            $veiculo->marca = Marca::find($veiculo->marca); //atrav�s do ID da marca, solicita os dados da marca e guarda no par�metro do ve�culo
            $veiculo->modelo = Modelo::find($veiculo->modelo); //atrav�s do ID do modelo, solicita os dados do modelo e guarda no par�metro do ve�culo
        }
    	
        //verifica se existem ve�culos (em caso negativo, envia um erro para a view)
        if (is_null($veiculos))
            return redirect()->route("index")->withErrors('Erro ao carregar ve�culos. Por favor, tente mais tarde.');
        else
           return view("noticia.index", compact('noticiad'));
    }

    public function create() {
        $marcas = Marca::all(); //retorna todas as marcas
        $modelos = Modelo::all(); //retorna todos os modelos
    	
        return view("noticia.create", compact('marcas', 'modelos')); //envia as marcas e modelos para a view
    }

    public function store(Request $dados) {
    	$veiculo = Veiculo::create($dados->all()); //cria o ve�culo com os dados do formul�rio (utilizei a facade Request)
        
        //verifica se o ve�culo foi criado com sucesso
        if(is_null($veiculo))
            return redirect()->route('veiculo.index')->withErrors('Erro ao criar ve�culo. Por favor, tente novamente.');
        else
            return redirect()->route('veiculo.index')->with('Ve�culo inserido com sucesso!');
    }

    /* M�todo de store utilizando o facade Input
        public function store() {
            $veiculo = Veiculo::create(Input::all());
            return redirect()->route('noticia.index')->with('flash_message', 'Ve�culo inserido com sucesso!');
        }
    */

    public function show($id) {
        $veiculo = Veiculo::findOrFail($id); //retorna o ve�culo a mostrar
        $veiculo->marca = Marca::find($veiculo->marca); //atrav�s do ID da marca, solicita os dados da marca e guarda no par�metro do ve�culo
        $veiculo->modelo = Modelo::find($veiculo->modelo); //atrav�s do ID do modelo, solicita os dados do modelo e guarda no par�metro do ve�culo

        //verifica se o ve�culo foi preenchido com sucesso
        if (is_null($veiculo))
            return redirect()->route('veiculo.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        else
            return view('noticia.item', compact('veiculo'));
    }

    public function edit($id) {
        $veiculo = Veiculo::findOrFail($id); //retorna o ve�culo a mostrar

        //verificar se o ve�culo existe (em caso negativo, envia um erro para a view)
        if (is_null($veiculo)) {
            return redirect()->route('veiculo.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        }
        else
        {
            $marcas = Marca::all(); //retorna todas as marcas
            $modelos = Modelo::all(); //retorna todas os modelos
            
            return view('noticia.edit', compact('veiculo', 'marcas', 'modelos'));
        }
    }

    public function update(Request $dados, $id) {
        $veiculo = Veiculo::findOrFail($id); //retorna o ve�culo a mostrar
        
        //verificar se o ve�culo existe (em caso negativo, envia um erro para a view)
        if (is_null($veiculo)) {
            return redirect()->route('veiculo.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //valida��es
            $dados_veiculo = $dados->all();
            $veiculo->fill($dados_veiculo)->save(); //atualiza os dados na BD

            return redirect()->route('veiculo.index')->with('flash_message', 'Ve�culo atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $veiculo = Veiculo::findOrFail($id); //retorna o ve�culo a mostrar

        //verificar se o ve�culo existe (em caso negativo, envia um erro para a view)
        if (is_null($veiculo)) {
            return redirect()->route('veiculo.index')->withErrors('Erro ao carregar ve�culo. Por favor, tente novamente.');
        }
        else
        {
            $veiculo->delete(); //apaga os dados da BD

            return redirect()->route('veiculo.index')->with('flash_message', 'Ve�culo apagado com sucesso!');
        }
    }
}
