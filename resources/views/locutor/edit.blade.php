@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Editar Autor "{{ $locutor->nome }}"</h1>
        <p class="lead">Edite a informa��o pretendida e carregue no bot�o guardar.</p>
        <hr>
        <form action="{{ route('locutor.update', $locutor->idlocutor)}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="nome" class="control-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ $locutor->nome }}" required>
            </div>

            <input type="submit" value="Guardar" class="btn btn-primary">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection