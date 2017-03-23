@extends('layouts.master')
@section('content')
  <div class="container-fluid">
    <h1>Lista de Veículos</h1>
    <p class="lead">Nesta página apresentamos uma lista de veículos registados na BD...</p>
    <br>
    <div class="container-fluid table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nº Veículo</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Nº de Kms</th>
            <th>Editar</th>
            <th>Apagar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($veiculos as $veiculo)
            <tr>
              <td><?php echo $veiculo->idVeiculo; ?></td>
              <td><?php echo $veiculo->nome; ?></td>
              <td><?php echo $veiculo->marca->nome; ?></td>
              <td><?php echo $veiculo->modelo->nome; ?></td>
              <td><?php echo $veiculo->cor; ?></td>
              <td><?php echo $veiculo->numKms; ?></td>
                    
              <!-- coluna de editar veículo -->
              <td>
                <a class="btn btn-default" href="{{ URL::route('veiculo.edit', $veiculo->idVeiculo) }}"><img src="{{ asset('imagens/edit.png') }}" width="20" height="20"></a>
              </td>

              <!-- coluna de apagar veículo -->
              <td>
                <form action="{{ route('veiculo.destroy', $veiculo->idVeiculo) }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger">
                    <img src="{{ asset('imagens/delete.png') }}" width="20" height="20">
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p><a href="{{ URL::route('veiculo.create') }}">Pretende adicionar mais um veículo?</a></p>
  </div>
@endsection