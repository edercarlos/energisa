@extends('layouts.app')

@section('content')
	<div class="container">
				
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
			<div class="wrap">
				<h3 class="wrap-title">Dados pessoais</h3>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group mb-3">
						  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
						  data-content="O CPF ou CNPJ pode ser inserido utilizando-se somente de números ou da máscara padrão para tais entradas. <br /><br />
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
					<div class="col-sm-6">
						<div class="input-group mb-3">
						  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
						  data-content="O Telefone pode ser inserido utilizando-se somente de números ou com qualquer uma das máscaras abaixo:<br /><br />
						  (00) 00000 0000<br />
						  (00) 00000-0000<br />
						  (00) 000000000<br />
						  00 00000 0000<br />
						  00 000000000<br />
						  00000000000">
							<span class="input-group-text" id="input-telefone">Telefone</span>
						  </div>
						  <input type="text" class="form-control" name="telefone" id="telefoneInput" aria-describedby="input-telefone" value="{{ old('telefone') }}" placeholder="Insira um Telefone">
						</div>
					</div>
				</div>
			</div>
			
			<div class="wrap">
				<h3 class="wrap-title">Endere&ccedil;o</h3>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group mb-3">
						  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
						  data-content="É possível utilizar o caractere coringa % para substituir uma cadeia qualquer de caracteres e o caractere _ para substituir 1 (um) caractere.<br /><br />
						  Isso pode ser útil para pesquisar fragmentos de endere&ccedil;os, especialmente quando foram cadastrados de formas diferentes.">
							<span class="input-group-text" id="input-logradouro">Logradouro</span>
						  </div>
						  <input type="text" class="form-control" name="logradouro" id="logradouroInput" aria-describedby="input-logradouro" value="{{ old('logradouro') }}" placeholder="Insira um Logradouro">
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="input-group mb-3">
						  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
						  data-content="É possível utilizar o caractere coringa % para substituir uma cadeia qualquer de caracteres e o caractere _ para substituir 1 (um) caractere.">
							<span class="input-group-text" id="input-complemento">Complemento</span>
						  </div>
						  <input type="text" class="form-control" name="complemento" id="complementoInput" aria-describedby="input-complemento" value="{{ old('complemento') }}" placeholder="Insira um Complemento">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group mb-3">
						  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
						  data-content="Para esse campo, deve-se inserir o pr&oacute;prio numeral ou a sequ&ecirc;ncia 'S/N' quando o endere&ccedil;o n&atilde;o possuir n&uacute;mero.">
							<span class="input-group-text" id="input-numero">N&uacute;mero</span>
						  </div>
						  <input type="text" class="form-control" name="numero" id="numeroInput" aria-describedby="input-numero" value="{{ old('numero') }}" placeholder="Insira um N&uacute;mero">
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="input-group mb-3">
						  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
						  data-content="É possível utilizar o caractere coringa % para substituir uma cadeia qualquer de caracteres e o caractere _ para substituir 1 (um) caractere.">
							<span class="input-group-text" id="input-bairro">Bairro</span>
						  </div>
						  <input type="text" class="form-control" name="bairro" id="bairroInput" aria-describedby="input-bairro" value="{{ old('bairro') }}" placeholder="Insira um Bairro">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group mb-3">
						  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
						  data-content="O CEP pode ser inserido utilizando-se somente de números ou da máscara padrão para tal entrada.<br /><br />
						  Exemplo:<br />
						  CEP => 00000-000<br />
						  CEP => 00000000">
							<span class="input-group-text" id="input-cep">CEP</span>
						  </div>
						  <input type="text" class="form-control" name="cep" id="cepInput" aria-describedby="input-cep" value="{{ old('cep') }}" placeholder="Insira um CEP">
						</div>
					</div>				
					
					<div class="col-sm-6">
						<div class="input-group mb-3">
						  <div class="input-group-prepend" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Dica de uso" 
						  data-content="É possível utilizar o caractere coringa % para substituir uma cadeia qualquer de caracteres e o caractere _ para substituir 1 (um) caractere.">
							<span class="input-group-text" id="input-municipio">Munic&iacute;pio</span>
						  </div>
						  <input type="text" class="form-control" name="municipio" id="municipioInput" aria-describedby="input-municipio" value="{{ old('municipio') }}" placeholder="Insira um Munic&iacute;pio">
						</div>
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
