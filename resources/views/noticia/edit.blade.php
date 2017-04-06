@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Editar veículo "{{ $noticia->nome }}"</h1>
		<p class="lead">Edite a informação pretendida e carregue no botão guardar.</p>
		<hr>
		<form action="{{ route('noticia.update', $noticia->idnoticia)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="nome" class="control-label">Nome:</label>
				<input type="text" id="nome" name="nome" class="form-control" value="{{ $noticia->nome }}" required>
			</div>
			
			<div class="form-group">
				<label for="autor" class="control-label">Marca:</label>
				<select id="autor" name="autor" class="form-control" required>
					@foreach($autors as $autor)
						@if($autor->idautor == $noticia->autor)
							<option value="<?php echo $autor->idautor; ?>" selected><?php echo $autor->nome; ?></option>
						@else
							<option value="<?php echo $autor->idautor; ?>"><?php echo $autor->nome; ?></option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="categoria" class="control-label">Modelo:</label>
				<select id="categoria" name="categoria" class="form-control" required>
					@foreach($categorias as $categoria)
						@if($categoria->idcategoria == $noticia->categoria)
							<option value="<?php echo $categoria->idcategoria; ?>" selected><?php echo $categoria->nome; ?></option>
						@else
							<option value="<?php echo $categoria->idcategoria; ?>"><?php echo $categoria->nome; ?></option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="cor" class="control-label">Cor:</label>
				<input type="text" id="cor" name="cor" class="form-control" value="{{ $noticia->titulo }}">
			</div>
			
			<div class="form-group">
				<label for="kms" class="control-label">Nº de Kms:</label>
				<input type="text" id="numkms" name="numkms" class="form-control" value="{{ $noticia->artigo }}">
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection