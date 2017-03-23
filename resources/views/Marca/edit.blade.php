@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Editar Marca "{{ $marca->nome }}"</h1>
		<p class="lead">Edite a informação pretendida e carregue no botão guardar.</p>
		<hr>
		<form action="{{ route('marca.update', $marca->idMarca)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="nome" class="control-label">Nome:</label>
				<input type="text" id="nome" name="nome" class="form-control" value="{{ $marca->nome }}" required>
			</div>

			<div class="form-group">
				<label for="stand" class="control-label">Stand:</label>
				<input type="text" id="stand" name="stand" class="form-control" value="{{ $marca->stand }}">
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection