@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Lista de Categoria</h1>
        <p class="lead">Nesta página apresentamos uma lista de Categorias registados na BD...</p>
        <br>
        <div class="container-fluid table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nº Categoria</th>
                    <th>Nome</th>
                    <th>Stand</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td><?php echo $categoria->idcategoria; ?></td>
                        <td><?php echo $categoria->nome; ?></td>
                        
                        <!-- coluna de editar veículo -->
                        <td>
                            <a class="btn btn-default" href="{{ URL::route('categoria.edit', $categoria->idCategoria) }}"><img src="{{ asset('imagens/edit.png') }}" width="20" height="20"></a>
                        </td>

                        <!-- coluna de apagar veículo -->
                        <td>
                            <form action="{{ route('categoria.destroy', $categoria->idCategoria) }}" method="POST">
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
        <p><a href="{{ URL::route('categoria.create') }}">Pretende adicionar um Modelo novo?</a></p>
    </div>
@endsection