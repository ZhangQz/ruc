@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Lista de Locutor</h1>
        <p class="lead">Nesta página apresentamos uma lista de Locutors registados na BD...</p>
        <br>
        <div class="container-fluid table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nº Locutor</th>
                    <th>Nome</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locutors as $locutor)
                    <tr>
                        <td><?php echo $locutor->idlocutor; ?></td>
                        <td><?php echo $locutor->nome; ?></td>

                        <!-- coluna de editar veículo -->
                        <td>
                            <a class="btn btn-default" href="{{ URL::route('locutor.edit', $locutor->idLocutor) }}"><img src="{{ asset('imagens/edit.png') }}" width="20" height="20"></a>
                        </td>

                        <!-- coluna de apagar veículo -->
                        <td>
                            <form action="{{ route('locutor.destroy', $locutor->idLocutor) }}" method="POST">
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
        <p><a href="{{ URL::route('locutor.create') }}">Pretende adicionar um Locutor novo?</a></p>
    </div>
@endsection