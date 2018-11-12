@extends('layouts.app')

@section('content')
	<div class="container">
		<!-- Alerta -->
		<div class="alert alert-info alert-dismissible fade show mt-5 mb-5" role="alert">
		  <h4 class="alert-heading">Importante!</h4>
		  <p>Esse sistema é de uso temporário, até que sua base seja importada no sistema <strong>ATLAS</strong>. Há algumas inconsistências na base,
		  então, se não for possível encontrar uma pessoa, especialmente a partir do <strong>CPF/CNPJ</strong>, não quer dizer que a mesma não exista. Tente utilizar outros campos como filtros.</p>
		  <hr>
		  <p>É possível utilizar o caractere coringa '%' para substituir uma cadeia qualquer de caracteres (quando não se tem certeza do nome completo, por exemplo)
			e o caractere '_' para substituir 1 (um) caractere (quando não se tem certeza sobre a grafia de uma palavra). Isso pode ser útil para pesquisar fragmentos de nomes.</p>
		  <hr>
		  <p class="mb-2">Os  campos podem ser combinados entre si para um resultado mais preciso.<p>
		  
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
				
		<form method="POST" action="resultado" >
			@csrf
			<div class="row">
				<!--<div class="col-sm-6">
				  <div class="form-group">
					<label for="cpf_cnpjInput">CPF/CNPJ</label>
					<input type="text" class="form-control" name="cpf_cnpj" id="cpf_cnpjInput" aria-describedby="help" placeholder="Insira um CPF ou CNPJ">
					<small id="help" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>  
				</div>
				<div class="col-sm-6">
				  <div class="form-group">
					<label for="nomeImput">Nome</label>
					<input type="text" class="form-control" name="nome" id="nomeImput" aria-describedby="help" placeholder="Insira um Nome">
					<small id="help" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div> 
				</div>-->
				<div class="col-sm-6">
					<div class="input-group mb-3">
					  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
					  data-content="O CPF ou CNPJ pode ser inserido utilizando-se somente números ou da máscara padrão para tais entradas. <br /><br />
					  Exemplo:<br />
					  CPF => 000.000.000-00<br />
					  CPF => 00000000000<br />
					  CNPJ => 00.000.000/0000-00<br />
					  CNPJ => 00000000000000">
						<span class="input-group-text" id="input-cpf-cnpj">CPF / CNPJ</span>
					  </div>
					  <input type="text" class="form-control" name="cpf_cnpj" id="cpf_cnpjInput" aria-describedby="input-cpf-cnpj" value="{{ old('cpf_cnpj') }}" placeholder="Insira um CPF ou CNPJ">
					</div>
				</div>
				
				<div class="col-sm-6">
					<div class="input-group mb-3">
					  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
					  data-content="É possível utilizar o caractere coringa '%' para substituir uma cadeia qualquer de caracteres (quando não se tem certeza do nome completo)
					  e o caractere '_' para substituir 1 (um) caractere (quando não se tem certeza sobre a grafia de um nome).<br /><br />
					  Isso pode ser útil para pesquisar fragmentos de nomes.<br /><br />
					  Exemplo:<br />
					  PEDRO % SOUZA => retorna todas as pessoas que contenham o primeiro nome PEDRO e o último SOUZA<br /><br />
					  _ILSON => retorna nomes como WILSON, UILSON, VILSON, etc<br />">
						<span class="input-group-text" id="input-nome">Nome</span>
					  </div>
					  <input type="text" class="form-control" name="nome" id="nomeImput" aria-describedby="input-nome" value="{{ old('nome') }}" placeholder="Insira um Nome">
					</div>
				</div>
			</div>
			
			<div class="row">
				<!--<div class="col-sm-6">
				  <div class="form-group">
					<label for="municipioInput">Municipio</label>
					<input type="text" class="form-control" name="municipio" id="municipioInput" aria-describedby="help" placeholder="Insira um Municipio">
					<small id="help" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				</div>
				<div class="col-sm-6">
				  <div class="form-group">
					<label for="bairroInput">Bairro</label>
					<input type="text" class="form-control" name="bairro" id="bairroInput" aria-describedby="help" placeholder="Insira um Bairro">
					<small id="help" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				</div>-->
				
				<div class="col-sm-6">
					<div class="input-group mb-3">
					  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
					  data-content="É possível utilizar o caractere coringa % para substituir uma cadeia qualquer de caracteres e o caractere _ para substituir 1 (um) caractere.<br /><br />
					  Isso pode ser útil para pesquisar fragmentos de nomes.">
						<span class="input-group-text" id="input-municipio">Munic&iacute;pio</span>
					  </div>
					  <input type="text" class="form-control" name="municipio" id="municipioInput" aria-describedby="input-municipio" value="{{ old('municipio') }}" placeholder="Insira um Municipio">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-group mb-3">
					  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
					  data-content="É possível utilizar o caractere coringa % para substituir uma cadeia qualquer de caracteres e o caractere _ para substituir 1 (um) caractere.<br /><br />
					  Isso pode ser útil para pesquisar fragmentos de nomes.">
						<span class="input-group-text" id="input-bairro">Bairro</span>
					  </div>
					  <input type="text" class="form-control" name="bairro" id="bairroInput" aria-describedby="input-bairro" value="{{ old('bairro') }}" placeholder="Insira um Bairro">
					</div>
				</div>
			</div>
			<div class="row">
				<!--<div class="col-sm-6">
				  <div class="form-group">
					<label for="logradouroInput">Logradouro</label>
					<input type="text" class="form-control" name="logradouro" id="logradouroInput" aria-describedby="help" placeholder="Insira um Logradouro">
					<small id="help" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				</div>
				<div class="col-sm-6">
				  <div class="form-group">
					<label for="cepInput">CEP</label>
					<input type="text" class="form-control" name="cep" id="cepInput" aria-describedby="help" placeholder="Insira um CEP">
					<small id="help" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				</div>-->
				
				<div class="col-sm-6">
					<div class="input-group mb-3">
					  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
					  data-content="É possível utilizar o caractere coringa % para substituir uma cadeia qualquer de caracteres e o caractere _ para substituir 1 (um) caractere.<br /><br />
					  Isso pode ser útil para pesquisar fragmentos de nomes.">
						<span class="input-group-text" id="input-logradouro">Logradouro</span>
					  </div>
					  <input type="text" class="form-control" name="logradouro" id="logradouroInput" aria-describedby="input-logradouro" value="{{ old('logradouro') }}" placeholder="Insira um Logradouro">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-group mb-3">
					  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
					  data-content="O CEP pode ser inserido utilizando-se somente números ou da máscara padrão para tal entrada.<br /><br />
					  Exemplo:<br />
					  CEP => 00000-000<br />
					  CEP => 00000000">
						<span class="input-group-text" id="input-cep">CEP</span>
					  </div>
					  <input type="text" class="form-control" name="cep" id="cepInput" aria-describedby="input-cep" value="{{ old('cep') }}" placeholder="Insira um CEP">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col mt-3">
					<button type="submit" class="btn btn-outline-primary float-right">Enviar</button>
				</div>
			</div>
		</form>
	</div>
@endsection
