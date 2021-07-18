<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUSerSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_ser_socials', function (Blueprint $table) {
            $table->increments('id');

            //Chave Estrangeira
            $table->integer('user_id')->unsigned(); //o que é unsigned????

            //Funcionalidade para conectar várias redes sociais
            $table->string('social_network');

            //Código do usuário pra cada rede social - Serve para autenticar se o usuário que está fazendo o login é o mesmo que está acessando ao sistema.
            $table->string('social_id');
            
            //e-mail que o usuário usa na rede social que está sincronizando
            $table->string('social_email');

            //url do avatar perfil
            $table->string('social_avatar');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('social-email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //Serve para reverter uma migration 

    {
        Schema::table('user_socials', function (Blueprint $table){
            $table->dropForeign('user_socials_user_id_foreign');
            $table->dropForeign('user_socials_social-email_foreign');
            //Aqui foi definido que antes de apagar a tabela, as chaves estrangeiras devem ser removidas
        });
        
        Schema::dropIfExists('u_ser_socials');
    }
}
