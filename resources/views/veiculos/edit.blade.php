@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Editar veículo "{{ $veiculo->nome }}"</h1>
		<p class="lead">Edite a informação pretendida e carregue no botão guardar.</p>
		<hr>
		<form action="{{ route('veiculo.update', $veiculo->idVeiculo)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label for="nome" class="control-label">Nome:</label>
				<input type="text" id="nome" name="nome" class="form-control" value="{{ $veiculo->nome }}" required>
			</div>
			
			<div class="form-group">
				<label for="marca" class="control-label">Marca:</label>
				<select id="marca" name="marca" class="form-control" required>
					@foreach($marcas as $marca)
						@if($marca->idMarca == $veiculo->marca)
							<option value="<?php echo $marca->idMarca; ?>" selected><?php echo $marca->nome; ?></option>
						@else
							<option value="<?php echo $marca->idMarca; ?>"><?php echo $marca->nome; ?></option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="modelo" class="control-label">Modelo:</label>
				<select id="modelo" name="modelo" class="form-control" required>
					@foreach($modelos as $modelo)
						@if($modelo->idModelo == $veiculo->modelo)
							<option value="<?php echo $modelo->idModelo; ?>" selected><?php echo $modelo->nome; ?></option>
						@else
							<option value="<?php echo $modelo->idModelo; ?>"><?php echo $modelo->nome; ?></option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="cor" class="control-label">Cor:</label>
				<input type="text" id="cor" name="cor" class="form-control" value="{{ $veiculo->cor }}">
			</div>
			
			<div class="form-group">
				<label for="kms" class="control-label">Nº de Kms:</label>
				<input type="text" id="numkms" name="numkms" class="form-control" value="{{ $veiculo->numkms }}">
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection