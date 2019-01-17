<?php

namespace App\Http\Controllers;

use Validator;

use App\Models\Energisa;

use Illuminate\Http\Request;

use App\Http\Traits\LogsTrait;

class EnergisaController extends Controller
{
	use LogsTrait;
	 /*
    |--------------------------------------------------------------------------
    | Energisa Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling validation of inputs, query
    | the results on the database and pass the data to the 'result' view, which
    | is consequently responsible for render a table with all the records founded.
    |
    */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Retrieve the record for the given CPF/CNPJ.
     *
     * @param  int  $cpf_cnpj
     * @return Response
     */
    public function result(Request $request)
    {
		if ($request->isMethod('get')){
			// If method is get, return to the search view
			return redirect('/');
		} else {
			// If request method is post, query input data on database
			// and return a Energisa::query object
			// $cpf_cnpj = $request->input('cpf_cnpj');
			// $nome = $request->input('nome');
			// $telefone = $request->input('telefone');
			// $logradouro = $request->input('logradouro');
			// $complemento = $request->input('complemento');
			// $numero = $request->input('numero');
			// $bairro = $request->input('bairro');
			// $cep = $request->input('cep');
			// $municipio = $request->input('municipio');

			//461.056.381-91
			$rules = array(
				'cpf_cnpj'    => ['nullable', 'regex:/^(\d{0,2}\.?\d{3}\.?\d{3}\/?\d{4}-?\d{2})|(\d{0,3}\.?\d{3}\.?\d{3}-?\d{2})$/'],
				'nome'        => ['nullable', 'regex:/^[a-zA-ZÀ-ú% _]+$/'],
				'telefone'    => ['nullable', 'regex:/^[0-9\(\)\- \+]+$/'],
				'logradouro'  => ['nullable', 'regex:/^[a-zA-ZÀ-ú0-9\% _]+$/'],
				'complemento' => ['nullable', 'regex:/^[a-zA-ZÀ-ú0-9\% _]+$/'],
				// 'numero'      => ['nullable', 'regex:/^[a-zA-Z0-9\% _\/\\]+$/'],
				'numero'      => ['nullable', 'regex:/^[0-9]+|[sSnN\/%]+$/'],
				'bairro'      => ['nullable', 'regex:/^[a-zA-ZÀ-ú% _]+$/'],
				'cep'         => ['nullable', 'max:9', 'regex:/^(\d{5}-?\d{3})$/'],
				'municipio'   => ['nullable', 'regex:/^[a-zA-ZÀ-ú% _]+$/']
			);
			$validator = Validator::make($request->all(), $rules);

			// Process the validation. If fails, return error messages
			if ($validator->fails()) {
				return redirect('/')
					// ->back()
					->withErrors($validator)
					->withInput();
			} else {
				// Retrieve           
			
				// Ignore special characters from mask
				$cpf_cnpj = preg_replace('/[^0-9]/', '', $request->input('cpf_cnpj'));
				$telefone = preg_replace('/[^0-9]/', '', $request->input('telefone'));
				$cep = preg_replace('/[^0-9]/', '', $request->input('cep'));
				
				// Build the query
				$person = Energisa::query();
				if ($request->filled('cpf_cnpj'))
					$person = $person->where('cpf_cnpj', $cpf_cnpj);
				if ($request->filled('nome'))
					$person = $person->where('nome', 'LIKE', $request->input('nome'));
				if ($request->filled('telefone')) {
					$person = $person->where(function ($person) use ($telefone) {
						$person->where('telefone', $telefone);
						$person->orWhere('telefone2', $telefone);
					});
				}
				if ($request->filled('logradouro'))
					$person = $person->where('logradouro', 'LIKE', $request->input('logradouro'));
				if ($request->filled('complemento'))
					$person = $person->where('complemento', 'LIKE', $request->input('complemento'));
				if ($request->filled('numero'))
					$person = $person->where('numero', 'LIKE', $request->input('numero'));
				if ($request->filled('bairro'))
					$person = $person->where('bairro', 'LIKE', $request->input('bairro'));
				if ($request->filled('cep'))
					$person = $person->whereRaw('REPLACE(cep, \'-\', \'\') LIKE ?', $cep);
				if ($request->filled('municipio'))
					$person = $person->where('municipio', 'LIKE', $request->input('municipio'));
				
				// $person = $person->toSql();
				// dd($person);
				$person = $person->get();
				
				// build the params variable to register the log
				$params = '';
				foreach ($request->all() as $field => $value) {
                    if($field != '_token' && isset($value))
						$params .= $field . '=' . $value . ';';
                }
				$params = substr($params, 0, -1);
				
				// call the LogsTrait function to insert a new event register in logs table
				$this->insertLog('realizou uma consulta com os parametros', $params);
				
				return view('result', ['people' => $person]);
			}
		}
    }	
}