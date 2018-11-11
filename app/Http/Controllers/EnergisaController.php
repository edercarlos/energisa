<?php

namespace App\Http\Controllers;

use Validator;

use App\Models\Energisa;

use Illuminate\Http\Request;

class EnergisaController extends Controller
{
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
			$cpf_cnpj = $request->input('cpf_cnpj');
			$nome = $request->input('nome');
			$municipio = $request->input('municipio');
			$bairro = $request->input('bairro');
			$logradouro = $request->input('logradouro');
			$cep = $request->input('cep');

			//461.056.381-91
			$rules = array(
				'cpf_cnpj'   => ['nullable', 'regex:/^(\d{0,2}\.?\d{3}\.?\d{3}\/?\d{4}-?\d{2})|(\d{0,3}\.?\d{3}\.?\d{3}-?\d{2})$/'],
				'nome'       => ['nullable', 'regex:/^[a-zA-Z% _]+$/'],
				'municipio'  => ['nullable', 'regex:/^[a-zA-Z% _]+$/'],
				'bairro'     => ['nullable', 'regex:/^[a-zA-Z% _]+$/'],
				'logradouro' => ['nullable', 'regex:/^[a-zA-Z0-9% _]+$/'],
				'cep'        => ['nullable', 'max:9', 'regex:/^(\d{5}-?\d{3})$/']
			);
			$validator = Validator::make($request->all(), $rules);

			// $this->validate($request, $rules);
			
			// if ($validator->fails()) {
				// return $this->respondWithErrorMessage($validator);
			// }
			
			// process the login
			if ($validator->fails()) {
				return redirect('/')
					// ->back()
					->withErrors($validator)
					->withInput();
			} else {
				// retrieve           
			
				$cpf_cnpj = preg_replace('/[^0-9]/', '', $request->input('cpf_cnpj'));
				$cep = preg_replace('/[^0-9]/', '', $request->input('cep'));
				$person = Energisa::query();
				if ($request->filled('cpf_cnpj'))
					$person = $person->where('cpf_cnpj', $cpf_cnpj);
				if ($request->filled('nome'))
					$person = $person->where('nome', 'LIKE', $request->input('nome'));
				if ($request->filled('municipio'))
					$person = $person->where('municipio', 'LIKE', $request->input('municipio'));
				if ($request->filled('bairro'))
					$person = $person->where('bairro', 'LIKE', $request->input('bairro'));
				if ($request->filled('logradouro'))
					$person = $person->where('logradouro', 'LIKE', $request->input('logradouro'));
				if ($request->filled('cep'))
					$person = $person->where('cep', $cep);
				
				$person = $person->get();

				return view('result', ['people' => $person]);
			}
		}
    }	
}