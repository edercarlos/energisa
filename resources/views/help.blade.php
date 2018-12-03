@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="wrap">
			<h3 class="wrap-title">Ajuda</h3>
			<div class="row">
				<div class="col-sm-12">
					<hr>
					<h5 class="wrap-title">Vis&atilde;o geral</h5>
					<p>Esse sistema foi desenvolvido pela <strong>PF</strong> a partir da base de dados de clientes ativos da ENERGISA.
					Há algumas inconsistências na base,	então, se não for possível encontrar uma pessoa, especialmente a partir do <strong>CPF/CNPJ</strong>,
					não quer dizer que a mesma não exista. Isso acontece porque h&aacute; alguns registros sem valor correspondente para esse campo.
					Tente utilizar outros campos como filtros.</p>
					<hr>
					<h5 class="wrap-title">Como usar?</h5>
					<p>O sistema aceita a combina&ccedil;&atilde;o de quaisquer campos, respeitando os caracteres permitidos para cada um deles.
					Passando o mouse sobre o nome do campo, ser&aacute; exibida uma janela com as m&aacute;scaras (padr&otilde;es de caracteres permitidos)
					para cada campo, quando existir.
					<p>É possível utilizar o caractere coringa '%' (percent) para substituir uma cadeia qualquer de caracteres (quando não se tem certeza do nome completo, por exemplo)
					e o caractere '_' (underline) para substituir 1 (um) caractere (quando não se tem certeza sobre a grafia de uma palavra). Os dois caracteres podem ser combinados, inclusive.
					Isso pode ser útil para pesquisar a partir de fragmentos de nomes.</p>
					<hr>
					<h5 class="wrap-title">Exemplos</h5>
					<p>Filtrar a partir do campo NOME, sabendo que o primeiro nome &eacute; PEDRO e o &uacute;ltimo &eacute; SOUZA:<br />
					<strong>PEDRO % SOUZA</strong> => retorna todas as pessoas que contenham o primeiro nome PEDRO e o &uacute;ltimo SOUZA</p>
					<p>Filtrar a partir do campo NOME, mas sem ter certeza da grafia:<br />
					<strong>F_LIPE</strong> => retorna nomes como FELIPE e FILIPE.</p>
					<hr>
					<p class="mb-2"><strong>Lembre-se:</strong> Os campos podem ser combinados entre si para um resultado mais preciso.<p>
				</div>
			</div>
		</div>
	</div>
@endsection