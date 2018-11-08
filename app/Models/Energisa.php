<?php

# app/Models/Energisa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Energisa extends Model
{
	protected $table = 'energisa_cadastro';
	protected $dates = ['data_contrato'];
}