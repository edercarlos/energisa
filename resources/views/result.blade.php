<!-- resources/views/quote.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Consulta à Base de Dados da Energisa</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Alegreya:400,700|Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
	<nav class="navbar navbar-light bg-light justify-content-between" style="border-bottom: 3px solid #f37021;">
		<img src="/img/energisa-logo.png" class="d-inline-block align-top" alt="">
		<ul class="nav nav-pills justify-content-end">
		  <li class="nav-item">
			<a class="nav-link active" href="/">Pesquisa</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="ajuda">Ajuda</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="contato">Contato</a>
		  </li>
		  @guest
			  <li class="nav-item">
				  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			  </li>
		  @else
			  <li class="nav-item dropdown">
				<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('logout') }}"
					   onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			  </li>
		  @endguest
		</ul>
	</nav>
	
	<div class="container">
		<div class="alert alert-info alert-dismissible fade show mt-5" role="alert">
		  <h4 class="alert-heading">Importante!</h4>
		  <p>Para obter o endereço completo, assim como o consumo da residência, é necessário copiar o valor da Unidade Consumidora (campo CDC) e inserí-lo na página da
		  <a href="https://www.energisa.com.br/paginas/servicos-online/autoatendimento/extrato-e-2via.aspx" target="blank">Energisa</a> para obter a 2ª via da fatura.</p>
		  
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
	</div>

	<div class="row">
		<div class="col-11 mt-5">
			<a class="btn btn-outline-primary float-right" href="/" role="button">Nova Consulta</a>
		</div>
	</div>
	
	<div class="container-fluid mt-5 mb-5">
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
				  <td>{{ $person->telefone }}, {{ $person->telefone2 }}</td>
				  <td>{{ $person->email }}</td>
				  <td>{{ $person->logradouro }}, {{ $person->bairro }}, {{ $person->municipio }}, {{ $person->cep }}</td>
				  <td>{{ $person->lat }}, {{ $person->lng }}</td>
				  <td>{{ $person->data_contrato->format('d/m/Y') }}</td>
			  </tr>
			@endforeach
		  </tbody>
		</table>
	</div>
	<script src="js/popper.min.js"></script>
	<script src="js/jquery-3.2.1.slim.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/energisa.js"></script>
</body>
</html>