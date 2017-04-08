@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Editar a relação "{{ $programa_locutor->nome }}"</h1>
		<p class="lead">Edite a informação pretendida e carregue no botão guardar.</p>
		<hr>
		<form action="{{ route('programa_locutor.update', $programa_locutor->idprograma_locutor)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="nome" class="control-label">Nome:</label>
				<input type="text" id="nome" name="nome" class="form-control" value="{{ $programa_locutor->nome }}" required>
			</div>

			<div class="form-group">
				<label for="programa" class="control-label">Programa:</label>
				<select id="programa" name="programa" class="form-control" required>
					@foreach($programas as $programa)
						@if($programa->idprograma == $programa_locutor->programa)
							<option value="<?php echo $programa->idprograma; ?>" selected><?php echo $programa->nome; ?></option>
						@else
							<option value="<?php echo $programa->idprograma; ?>"><?php echo $programa->nome; ?></option>
						@endif
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<label for="locutor" class="control-label">Locutor:</label>
				<select id="locutor" name="locutor" class="form-control" required>
					@foreach($locutors as $locutor)
						@if($locutor->idlocutor == $programa_locutor->locutor)
							<option value="<?php echo $locutor->idlocutor; ?>" selected><?php echo $locutor->nome; ?></option>
						@else
							<option value="<?php echo $locutor->idlocutor; ?>"><?php echo $locutor->nome; ?></option>
						@endif
					@endforeach
				</select>
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection