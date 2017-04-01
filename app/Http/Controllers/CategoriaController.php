<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Noticia;
use App\Categoria;
use App\Modelo;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all(); //retorna todos os categorias

        //verifica se existem categorias (em caso negativo, envia um erro para a view)
        if (is_null($categorias))
            return redirect()->route("index")->withErrors('Erro ao carregar categorias. Por favor, tente mais tarde.');
        else
            return view("categoria.index", compact('categorias'));
    }

    public function create() {
        $categorias = Categoria::all(); //retorna todos os categorias

        return view("categoria.create"); //envia as categorias e categorias para a view
    }

    public function store(Request $dados) {
        $categoria = Categoria::create($dados->all()); //cria o categoria com os dados do formulário (utilizei a facade Request)

        //verifica se o categoria foi criado com sucesso
        if(is_null($categoria))
            return redirect()->route('categoria.index')->withErrors('Erro ao criar Categoria. Por favor, tente novamente.');
        else
            return redirect()->route('categoria.index')->with('Categoria inserido com sucesso!');
    }

    /* Método de store utilizando o facade Input
        public function store() {
            $categoria = Noticia::create(Input::all());
            return redirect()->route('categorias.index')->with('flash_message', 'categoria inserido com sucesso!');
        }
    */

    public function show($id) {
        $categoria = Noticia::findOrFail($id); //retorna o categoria a mostrar
        $categoria->categoria = Categoria::find($categoria->categoria); //através do ID da categoria, solicita os dados da categoria e guarda no parâmetro do categoria
        $categoria->categoria = Categoria::find($categoria->categoria); //através do ID do categoria, solicita os dados do categoria e guarda no parâmetro do categoria

        //verifica se o categoria foi preenchido com sucesso
        if (is_null($categoria))
            return redirect()->route('categoria.index')->withErrors('Erro ao carregar categoria. Por favor, tente novamente.');
        else
            return view('categoria.item', compact('categoria'));
    }

    public function edit($id) {
        $categoria = Categoria::findOrFail($id); //retorna o categoria a mostrar

        //verificar se o categoria existe (em caso negativo, envia um erro para a view)
        if (is_null($categoria)) {
            return redirect()->route('categoria.index')->withErrors('Erro ao carregar categoria. Por favor, tente novamente.');
        }
        else
        {
            $categorias = Categoria::all(); //retorna todas as categorias
            $categorias = Categoria::all(); //retorna todas os categorias

            return view('categoria.edit', compact('categoria', 'categorias', 'categorias'));
        }
    }

    public function update(Request $dados, $id) {
        $categoria = Categoria::findOrFail($id); //retorna o categoria a mostrar

        //verificar se o categoria existe (em caso negativo, envia um erro para a view)
        if (is_null($categoria)) {
            return redirect()->route('categoria.index')->withErrors('Erro ao carregar categoria. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //validações
            $dados_categoria = $dados->all();
            $categoria->fill($dados_categoria)->save(); //atualiza os dados na BD

            return redirect()->route('categoria.index')->with('flash_message', 'Categoria atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $categoria = Categoria::findOrFail($id); //retorna o categoria a mostrar

        //verificar se o categoria existe (em caso negativo, envia um erro para a view)
        if (is_null($categoria)) {
            return redirect()->route('categoria.index')->withErrors('Erro ao carregar categoria. Por favor, tente novamente.');
        }
        else
        {
            $categoria->delete(); //apaga os dados da BD

            return redirect()->route('categoria.index')->with('flash_message', 'categoria apagado com sucesso!');
        }
    }
}
