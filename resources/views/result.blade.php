@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="alert alert-info alert-dismissible fade show mt-5" role="alert">
		  <h4 class="alert-heading">Importante!</h4>
		  <p>Para obter o consumo da residência, é necessário copiar o valor da Unidade Consumidora (campo CDC) e inseri-lo na página da
		  <a href="https://www.energisa.com.br/paginas/servicos-online/autoatendimento/extrato-e-2via.aspx" target="blank">Energisa</a> para obter a 2ª via da fatura.</p>
		  
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
	</div>

	<div class="row">
		<div class="col-11 mt-2">
			<a class="btn btn-outline-primary float-right" href="/" role="button">Nova Consulta</a>
		</div>
	</div>
	
	<div class="container-fluid mt-4 mb-4">
		<table class="table table-striped table-sm">
		  <thead>
			<tr>
			  <th scope="col">CPF / CNPJ</th>
			  <th scope="col">CDC</th>
			  <th scope="col">Nome</th>
			  <th scope="col">Telefones</th>
			  <!--<th scope="col">Telefone 2</th>-->
			  <th scope="col">E-mail</th>
			  <!--<th scope="col">Munic&iacute;pio</th>
			  <th scope="col">Bairro</th>
			  <th scope="col">Logradouro</th>
			  <th scope="col">Cep</th>-->
			  <th scope="col">Endere&ccedil;o</th>
			  <th scope="col">Lat / Lng</th>
			  <th scope="col">Data do Contrato</th>
			</tr>
		  </thead>
		  <tbody>
			  <!--<th scope="row">1</th>-->
			@foreach ($people as $person)
			  <tr>
				  <td>{{ $person->cpf_cnpj }}</td>
				  <td>{{ $person->cdc }}</td>
				  <td>{{ $person->nome }}</td>
				  <td>
					  @if($person->telefone != 0)
						{{ $person->telefone }}
					  @endif
					  @if($person->telefone2 != 0)
						, {{ $person->telefone2 }}
					  @endif
				  </td>
				  <td>{{ $person->email }}</td>
				  <td>{{ $person->logradouro }}, {{ $person->numero }}, {{ $person->complemento }}, {{ $person->bairro }}, {{ $person->municipio }}, {{ $person->cep }}</td>
				  <td>{{ $person->lat }}, {{ $person->lng }}</td>
				  <td>{{ $person->data_contrato->format('d/m/Y H:i:s') }}</td>
			  </tr>
			@endforeach
		  </tbody>
		</table>
	</div>
@endsection