@extends('layouts.master')
@section('content')
  <div class="container-fluid">
    <h1>Lista de Noticias</h1>
    <p class="lead">Nesta página apresentamos uma lista de notícias registados na BD...</p>
    <br>
    <div class="container-fluid table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Id Noticia</th>
            <th>Título</th>
            <th>Artigo</th>
            <th>Categoria</th>
            <th>Autor</th>
            <th>Editar</th>
            <th>Apagar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($noticias as $noticia)
            <tr>
              <td><?php echo $noticia->idnoticia; ?></td>
              <td><?php echo $noticia->categoria->nome; ?></td>
              <td><?php echo $noticia->autor->nome; ?></td>
              <td><?php echo $noticia->titulo; ?></td>
              <td><?php echo $noticia->artigo; ?></td>
              <td><?php echo $noticia->data_noticia; ?></td>
                    
              <!-- coluna de editar notícia -->
              <td>
                <a class="btn btn-default" href="{{ URL::route('noticia.edit', $noticia->idnoticia) }}"><img src="{{ asset('imagens/edit.png') }}" width="20" height="20"></a>
              </td>

              <!-- coluna de apagar notícia -->
              <td>
                <form action="{{ route('noticia.destroy', $noticia->idnoticia) }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger">
                    <img src="{{ asset('imagens/delete.png') }}" width="20" height="20">
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p><a href="{{ URL::route('noticia.create') }}">Pretende adicionar mais um notícia?</a></p>
  </div>
@endsection