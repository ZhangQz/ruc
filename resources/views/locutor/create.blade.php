@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Adicionar um novo locutor...</h1>
        <p class="lead">Insira toda a informa��o sobre a locutor.</p>
        <hr>
        <form action="{{ route('locutor.store')}}" method="POST">
            <div class="form-group">
                <label for="nome" class="control-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <input type="submit" value="Inserir nova Categoria" class="btn btn-primary">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection