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
          @foreach($programa_locutors as $programa_locutor)
            <tr>
              <td><?php echo $programa_locutor->idprograma_locutor; ?></td>
              <td><?php echo $programa_locutor->programa->nome; ?></td>
              <td><?php echo $programa_locutor->locutor->nome; ?></td>
              <!-- coluna de editar notícia -->
              <td>
                <a class="btn btn-default" href="{{ URL::route('programa_locutor.edit', $programa_locutor->idprograma_locutor) }}"><img src="{{ asset('imagens/edit.png') }}" width="20" height="20"></a>
              </td>

              <!-- coluna de apagar notícia -->
              <td>
                <form action="{{ route('programa_locutor.destroy', $programa_locutor->idprograma_locutor) }}" method="POST">
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
    <p><a href="{{ URL::route('programa_locutor.create') }}">Pretende associar um programa a um locutor?</a></p>
  </div>
@endsection