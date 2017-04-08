<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Noticia;
use App\Autor;
use App\Categoria;

class NoticiaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $noticias = Noticia::all(); //retorna todos os ve?culos


        foreach($noticias as $noticia) {
            $noticia->autor = Autor::find($noticia->autor); //atrav?s do ID da autor, solicita os dados da autor e guarda no par?metro do ve?culo
            $noticia->categoria = Categoria::find($noticia->categoria); //atrav?s do ID do categoria, solicita os dados do categoria e guarda no par?metro do ve?culo
        }

        //verifica se existem ve?culos (em caso negativo, envia um erro para a view)
        if (is_null($noticias))
            return redirect()->route("index")->withErrors('Erro ao carregar ve?culos. Por favor, tente mais tarde.');
        else
            return view("noticia.index", compact('noticias'));
    }

    public function create() {
        $autors = Autor::all(); //retorna todas as autors
        $categorias = Categoria::all(); //retorna todos os categorias

        return view("noticia.create", compact('autors', 'categorias')); //envia as autors e categorias para a view
    }

    public function store(Request $dados) {
        $noticia = Noticia::create($dados->all()); //cria o ve?culo com os dados do formul?rio (utilizei a facade Request)

        //verifica se o ve?culo foi criado com sucesso
        if(is_null($noticia))
            return redirect()->route('noticia.index')->withErrors('Erro ao criar ve?culo. Por favor, tente novamente.');
        else
            return redirect()->route('noticia.index')->with('Ve?culo inserido com sucesso!');
    }

    /* M?todo de store utilizando o facade Input
        public function store() {
            $noticia = Noticia::create(Input::all());
            return redirect()->route('noticia.index')->with('flash_message', 'Ve?culo inserido com sucesso!');
        }
    */

    public function show($id) {
        $noticia = Noticia::findOrFail($id); //retorna o ve?culo a mostrar
        $noticia->autor = Autor::find($noticia->autor); //atrav?s do ID da autor, solicita os dados da autor e guarda no par?metro do ve?culo
        $noticia->categoria = Categoria::find($noticia->categoria); //atrav?s do ID do categoria, solicita os dados do categoria e guarda no par?metro do ve?culo

        //verifica se o ve?culo foi preenchido com sucesso
        if (is_null($noticia))
            return redirect()->route('noticia.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        else
            return view('noticia.item', compact('noticia'));
    }

    public function edit($id) {
        $noticia = Noticia::findOrFail($id); //retorna o ve?culo a mostrar

        //verificar se o ve?culo existe (em caso negativo, envia um erro para a view)
        if (is_null($noticia)) {
            return redirect()->route('noticia.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        }
        else
        {
            $autors = Autor::all(); //retorna todas as autors
            $categorias = Categoria::all(); //retorna todas os categorias

            return view('noticia.edit', compact('noticia', 'autors', 'categorias'));
        }
    }

    public function update(Request $dados, $id) {
        $noticia = Noticia::findOrFail($id); //retorna o ve?culo a mostrar

        //verificar se o ve?culo existe (em caso negativo, envia um erro para a view)
        if (is_null($noticia)) {
            return redirect()->route('noticia.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //valida??es
            $dados_noticia = $dados->all();
            $noticia->fill($dados_noticia)->save(); //atualiza os dados na BD

            return redirect()->route('noticia.index')->with('flash_message', 'Ve?culo atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $noticia = Noticia::findOrFail($id); //retorna o ve?culo a mostrar

        //verificar se o ve?culo existe (em caso negativo, envia um erro para a view)
        if (is_null($noticia)) {
            return redirect()->route('noticia.index')->withErrors('Erro ao carregar ve?culo. Por favor, tente novamente.');
        }
        else
        {
            $noticia->delete(); //apaga os dados da BD

            return redirect()->route('noticia.index')->with('flash_message', 'Ve?culo apagado com sucesso!');
        }
    }
}
