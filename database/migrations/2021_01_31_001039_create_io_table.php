<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createIoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('io', function (Blueprint $table) {
            			$table->increments("id");
			$table->integer("id_membre")->nullable();
			$table->boolean("validee")->nullable();
			$table->boolean("a_valider")->default('1')->nullable();
			$table->boolean("a_zoner")->default('1')->nullable();
			$table->string("id_io_ref",100)->nullable();
			$table->boolean("modifiee")->nullable();
			$table->string("id_zones",100)->nullable();
			$table->geometry("situation")->nullable();
			$table->date("date_releve")->nullable();
			$table->date("date_validee")->nullable();
			$table->string("lieu_dit",40)->nullable();
			$table->string("origine",40)->nullable();
			$table->text("proprio_terrain")->nullable();
			$table->text("proprio_io")->nullable();
			$table->text("ampleur")->nullable();
			$table->text("impact")->nullable();
			$table->string("patrimonialite",20)->nullable();
			$table->string("classe",200)->nullable();
			$table->string("etat",100)->nullable();
			$table->string("dimensions",100)->nullable();
			$table->text("nombre")->nullable();
			$table->text("accessibilite")->nullable();
			$table->text("facilite_demontage")->nullable();
			$table->text("commentaires")->nullable();
			$table->text("image")->nullable();
			$table->text("video")->nullable();
			$table->date("date_demontage")->nullable();
			$table->string("type_chantier",20)->nullable();
			$table->text("nom_partenaires")->nullable();
			$table->text("duree_chantier")->nullable();
			$table->text("commentaires_chantier")->nullable();
			$table->boolean("demontee")->nullable();
			$table->timestamp("created_at")->nullable();
			$table->timestamp("updated_at")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('io');
    }
}
