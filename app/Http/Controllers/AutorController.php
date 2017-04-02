<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Noticia;
use App\Autor;
use App\Categoria;

class AutorController extends Controller
{
    public function index() {
        $autors = Autor::all(); //retorna todos os autors

        //verifica se existem autors (em caso negativo, envia um erro para a view)
        if (is_null($autors))
            return redirect()->route("index")->withErrors('Erro ao carregar autores. Por favor, tente mais tarde.');
        else
            return view("autor.index", compact('autors'));
    }

    public function create() {
        $autors = Autor::all(); //retorna todos os autors

        return view("autor.create"); //envia as autors e autors para a view
    }

    public function store(Request $dados) {
        $autor = Autor::create($dados->all()); //cria o autor com os dados do formulário (utilizei a facade Request)

        //verifica se o autor foi criado com sucesso
        if(is_null($autor))
            return redirect()->route('autor.index')->withErrors('Erro ao criar autor. Por favor, tente novamente.');
        else
            return redirect()->route('autor.index')->with('autor inserido com sucesso!');
    }

    /* Método de store utilizando o facade Input
        public function store() {
            $autor = noticia::create(Input::all());
            return redirect()->route('autors.index')->with('flash_message', 'autor inserido com sucesso!');
        }
    */

    public function show($id) {
        $autor = Noticia::findOrFail($id); //retorna o autor a mostrar
        $autor->autor = Autor::find($autor->autor); //através do ID da autor, solicita os dados da autor e guarda no parâmetro do autor
        $autor->autor = Autor::find($autor->autor); //através do ID do autor, solicita os dados do autor e guarda no parâmetro do autor

        //verifica se o autor foi preenchido com sucesso
        if (is_null($autor))
            return redirect()->route('autor.index')->withErrors('Erro ao carregar autor. Por favor, tente novamente.');
        else
            return view('autor.item', compact('autor'));
    }

    public function edit($id) {
        $autor = Autor::findOrFail($id); //retorna o autor a mostrar

        //verificar se o autor existe (em caso negativo, envia um erro para a view)
        if (is_null($autor)) {
            return redirect()->route('autor.index')->withErrors('Erro ao carregar autor. Por favor, tente novamente.');
        }
        else
        {
            $autors = Autor::all(); //retorna todas as autors
            $autors = Autor::all(); //retorna todas os autors

            return view('autor.edit', compact('autor', 'autors', 'autors'));
        }
    }

    public function update(Request $dados, $id) {
        $autor = Autor::findOrFail($id); //retorna o autor a mostrar

        //verificar se o autor existe (em caso negativo, envia um erro para a view)
        if (is_null($autor)) {
            return redirect()->route('autor.index')->withErrors('Erro ao carregar autor. Por favor, tente novamente.');
        }
        else
        {
            $this->validate($dados, ['nome' => 'required']); //validações
            $dados_autor = $dados->all();
            $autor->fill($dados_autor)->save(); //atualiza os dados na BD

            return redirect()->route('autor.index')->with('flash_message', 'autor atualizado com sucesso!');
        }
    }

    public function destroy($id) {
        $autor = Autor::findOrFail($id); //retorna o autor a mostrar

        //verificar se o autor existe (em caso negativo, envia um erro para a view)
        if (is_null($autor)) {
            return redirect()->route('autor.index')->withErrors('Erro ao carregar autor. Por favor, tente novamente.');
        }
        else
        {
            $autor->delete(); //apaga os dados da BD

            return redirect()->route('autor.index')->with('flash_message', 'autor apagado com sucesso!');
        }
    }
}
