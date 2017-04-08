@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Adicionar uma nova relação...</h1>
		<p class="lead">Insira toda a informação sobre a relação.</p>
		<hr>
		<form action="{{ route('programa_locutor.store')}}" method="POST">
			
			<div class="form-group">
				<label for="locutor" class="control-label">Marca:</label>
				<select id="locutor" name="locutor" class="form-control" required>
					@foreach($locutors as $locutor)
						<option value="<?php echo $locutor->idlocutor; ?>"><?php echo $locutor->nome; ?></option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="programa" class="control-label">Modelo:</label>
				<select id="programa" name="programa" class="form-control" required>
					@foreach($programas as $programa)
						<option value="<?php echo $programa->idprograma; ?>"><?php echo $programa->nome; ?></option>
					@endforeach
				</select>
			</div>

			<input type="submit" value="Inserir nova relação" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection