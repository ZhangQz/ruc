@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Adicionar um novo veículo...</h1>
		<p class="lead">Insira toda a informação sobre o veículo.</p>
		<hr>
		<form action="{{ route('noticia.store')}}" method="POST">
			<div class="form-group">
				<label for="nome" class="control-label">Nome:</label>
				<input type="text" id="nome" name="nome" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label for="autor" class="control-label">Marca:</label>
				<select id="autor" name="autor" class="form-control" required>
					@foreach($autors as $autor)
						<option value="<?php echo $autor->idMarca; ?>"><?php echo $autor->nome; ?></option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="categoria" class="control-label">Modelo:</label>
				<select id="categoria" name="categoria" class="form-control" required>
					@foreach($categorias as $categoria)
						<option value="<?php echo $categoria->idModelo; ?>"><?php echo $categoria->nome; ?></option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="titulo" class="control-label">Titulo:</label>
				<input type="text" id="titulo" name="titulo" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label for="artigo" class="control-label">Artigo:</label>
				<input type="text" id="artigo" name="artigo" class="form-control">
			</div>

			<input type="submit" value="Inserir novo veículo" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection