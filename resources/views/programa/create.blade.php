@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Adicionar um programa...</h1>
        <p class="lead">Insira toda a informação sobre a programa.</p>
        <hr>
        <form action="{{ route('programa.store')}}" method="POST">
            <div class="form-group">
                <label for="nome" class="control-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{$programa->nome }}" required>
            </div>
            <div class="form-group">
                <label for="descricao" class="control-label">Nome:</label>
                <input type="text" id="descricao" name="descricao" class="form-control" value="{{ $programa->descricao }}" required>
            </div>
            <div class="form-group">
                <label for="link" class="control-label">Nome:</label>
                <input type="text" id="link" name="link" class="form-control" value="{{ $programa->link }}" required>
            </div>

            <input type="submit" value="Inserir nova Categoria" class="btn btn-primary">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection