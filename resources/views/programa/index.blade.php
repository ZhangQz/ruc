@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Lista de Programa</h1>
        <p class="lead">Nesta página apresentamos uma lista de Programas registados na BD...</p>
        <br>
        <div class="container-fluid table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nº Programa</th>
                    <th>Nome</th>
                    <th>descrição</th>
                    <th>link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($programas as $programa)
                    <tr>
                        <td><?php echo $programa->idprograma; ?></td>
                        <td><?php echo $programa->nome; ?></td>
                        <td><?php echo $programa->descricao; ?></td>
                        <td><?php echo $programa->link; ?></td>
                        <!-- coluna de editar veículo -->
                        <td>
                            <a class="btn btn-default" href="{{ URL::route('programa.edit', $programa->idPrograma) }}"><img src="{{ asset('imagens/edit.png') }}" width="20" height="20"></a>
                        </td>

                        <!-- coluna de apagar veículo -->
                        <td>
                            <form action="{{ route('programa.destroy', $programa->idPrograma) }}" method="POST">
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
        <p><a href="{{ URL::route('programa.create') }}">Pretende adicionar um programa novo?</a></p>
    </div>
@endsection