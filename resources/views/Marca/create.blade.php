@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Adicionar uma nova Marca de Carros...</h1>
        <p class="lead">Insira toda a informação sobre a marca.</p>
        <hr>
        <form action="{{ route('marca.store')}}" method="POST">
            <div class="form-group">
                <label for="nome" class="control-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="stand" class="control-label">Stand:</label>
                <input id="stand" name="stand" class="form-control">
            </div>

            <input type="submit" value="Inserir nova Marca" class="btn btn-primary">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection