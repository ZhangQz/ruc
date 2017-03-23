@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<h1>Adicionar um novo veículo...</h1>
		<p class="lead">Insira toda a informação sobre o veículo.</p>
		<hr>
		<form action="{{ route('veiculo.store')}}" method="POST">
			<div class="form-group">
				<label for="nome" class="control-label">Nome:</label>
				<input type="text" id="nome" name="nome" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label for="marca" class="control-label">Marca:</label>
				<select id="marca" name="marca" class="form-control" required>
					@foreach($marcas as $marca)
						<option value="<?php echo $marca->idMarca; ?>"><?php echo $marca->nome; ?></option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="modelo" class="control-label">Modelo:</label>
				<select id="modelo" name="modelo" class="form-control" required>
					@foreach($modelos as $modelo)
						<option value="<?php echo $modelo->idModelo; ?>"><?php echo $modelo->nome; ?></option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="cor" class="control-label">Cor:</label>
				<input type="text" id="cor" name="cor" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label for="kms" class="control-label">Nº de Kms:</label>
				<input type="text" id="numkms" name="numkms" class="form-control">
			</div>

			<input type="submit" value="Inserir novo veículo" class="btn btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
@endsection