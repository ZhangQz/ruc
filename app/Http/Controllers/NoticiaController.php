<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Noticia;
use App\Categoria;
use App\Autor;

class NoticiaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $noticias = Noticia::all(); //retorna todos os noticias

        //percorre todos os noticias
        foreach($noticias as $noticia) {
            $noticia->categoria = Categoria::find($noticia->categoria); //atrav?s do ID da categoria, solicita os dados da categoria e guarda no par?metro do noticia
            $noticia->autor = Autor::find($noticia->autor); //atrav?s do ID do autor, solicita os dados do autor e guarda no par?metro do noticia
        }

        //verifica se existem noticias (em caso negativo, envia um erro para a view)
        if (is_null($noticias))
            return redirect()->route("index")->withErrors('Erro ao carregar noticias. Por favor, tente mais tarde.');
        else
            return view("noticias.index", compact('noticias'));
    }

    public function create() {
        $categorias = Categoria::all(); //retorna todas as categorias
        $autors = Autor::all(); //retorna todos os autors

        return view("noticias.create", compact('categorias', 'autors')); //envia as categorias e autors para a view
    }

    public function store(Request $dados) {
        $noticia = Noticia::create($dados->all()); //cria o noticia com os dados do formul?rio (utilizei a facade Request)

        //verifica se o noticia foi criado com sucesso
        if(is_null($noticia))
            return redirect()->route('noticia.index')->withErrors('Erro ao criar noticia. Por favor, tente novamente.');
        else
            return redirect()->route('noticia.index')->with('noticia inserido com sucesso!');
    }

    /* M?todo de store utilizando o facade Input
        public function store() {
            $noticia = noticia::create(Input::all());
            return redirect()->route('noticias.index')->with('flash_message', 'noticia inserido com sucesso!');
        }
    */

    public function show($id) {
        $noticia = Noticia::findOrFail($id); //retorna o noticia a mostrar
        $noticia->categoria = Categoria::find($noticia->categoria); //atrav?s do ID da categoria, solicita os dados da categoria e guarda no par?metro do noticia
        $noticia->autor = Autor::find($noticia->autor); //atrav?s do ID do autor, solicita os dados do autor e guarda no par?metro do noticia

        //verifica se o noticia foi preenchido com sucesso
        if (is_null($noticia))
            return redirect()->route('noticia.index')->withErrors('Erro ao carregar noticia. Por favor, tente novamente.');
        else
            return view('noticias.item', compact('noticia'));
    }

    public function edit($id) {
        $noticia = Noticia::findOrFail($id); //retorna o noticia a mostrar

        //verificar se o noticia existe (em caso negativo, envia um erro para a view)
        if (is_null($noticia)) {
            return redirect()->route('noticia.index')->withErrors('Erro ao carregar noticia. Por favor, tente novamente.');
        }
        else
        {
            $categorias = Categoria::all(); //retorna todas as categorias
            $autors = Autor::all(); //retorna todas os autors

            return view('noticias.edit', compact('noticia', 'categorias', 'autors'));
        }
    }

    public function update(Request $dados, $id) {
        $noticia = Noticia::findOrFail($id); //retorna o noticia a mostrar

        //verificar se o noticia existe (em caso negativo, envia um erro para a view)
        if (is_null($noticia)) {
            return redirect()->route('noticia.index')->withErrors('Erro ao carregar noticia. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //valida??es
            $dados_noticia = $dados->all();
            $noticia->fill($dados_noticia)->save(); //atualiza os dados na BD

            return redirect()->route('noticia.index')->with('flash_message', 'noticia atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $noticia = Noticia::findOrFail($id); //retorna o noticia a mostrar

        //verificar se o noticia existe (em caso negativo, envia um erro para a view)
        if (is_null($noticia)) {
            return redirect()->route('noticia.index')->withErrors('Erro ao carregar noticia. Por favor, tente novamente.');
        }
        else
        {
            $noticia->delete(); //apaga os dados da BD

            return redirect()->route('noticia.index')->with('flash_message', 'noticia apagado com sucesso!');
        }
    }
}
