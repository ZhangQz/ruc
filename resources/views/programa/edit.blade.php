@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Editar Programa "{{ $programa->nome }}"</h1>
		<p class="lead">Edite a informação pretendida e carregue no botão guardar.</p>
		<hr>
		<form action="{{ route('programa.update', $programa->idPrograma)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="nome" class="control-label">Nome:</label>
				<input type="text" id="nome" name="nome" class="form-control" value="{{ $programa->nome }}" required>
			</div>
			<div class="form-group">
				<label for="descricao" class="control-label">Nome:</label>
				<input type="text" id="descricao" name="descricao" class="form-control" value="{{ $programa->descricao }}" required>
			</div>
			<div class="form-group">
				<label for="link" class="control-label">Nome:</label>
				<input type="text" id="link" name="link" class="form-control" value="{{ $programa->link }}" required>
			</div>
			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection