@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Lista de Marca</h1>
        <p class="lead">Nesta página apresentamos uma lista de Marcas registados na BD...</p>
        <br>
        <div class="container-fluid table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nº Marca</th>
                    <th>Nome</th>
                    <th>Stand</th>
                </tr>
                </thead>
                <tbody>
                @foreach($marcas as $marca)
                    <tr>
                        <td><?php echo $marca->idMarca; ?></td>
                        <td><?php echo $marca->nome; ?></td>
                        <td><?php echo $marca->stand; ?></td>
                        
                        <!-- coluna de editar veículo -->
                        <td>
                            <a class="btn btn-default" href="{{ URL::route('marca.edit', $marca->idMarca) }}"><img src="{{ asset('imagens/edit.png') }}" width="20" height="20"></a>
                        </td>

                        <!-- coluna de apagar veículo -->
                        <td>
                            <form action="{{ route('marca.destroy', $marca->idMarca) }}" method="POST">
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
        <p><a href="{{ URL::route('marca.create') }}">Pretende adicionar um Modelo novo?</a></p>
    </div>
@endsection