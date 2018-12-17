<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnergisaCadastroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energisa_cadastro', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			// our new fields
			$table->bigInteger('cpf_cnpj')->nullable();
			$table->string('cdc', 15);
			$table->string('nome', 100);
			$table->bigInteger('telefone')->nullable();
			$table->bigInteger('telefone2')->nullable();
			$table->string('email', 200)->nullable();
			$table->string('logradouro', 50);
			$table->string('numero', 10);
			$table->string('complemento', 50);
			$table->string('bairro', 50);
			$table->string('cep', 9);
			$table->string('municipio', 50);
			$table->float('lat', 8, 6)->nullable();
			$table->float('lng', 8, 6)->nullable();
			$table->dateTime('data_contrato');
			
			$table->engine = 'InnoDB';
			$table->charset = 'Latin1';
			$table->collation = 'latin1_swedish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('energisa_cadastro');
    }
}
