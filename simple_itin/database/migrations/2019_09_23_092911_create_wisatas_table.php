<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->uuid('wisata_id')->nullable(false)->primary();
            $table->string("nama_wisata", 150)->nullable();
            $table->uuid("kota_id")->nullable();
            $table->text("alamat")->nullable();
            $table->string("kontak", 15)->nullable();
            $table->time("waktu_operasional")->nullable();
            $table->enum("waktu_bagian", ['WIB','WIT','WITA'])->default('WIB');
            $table->string("website", 150)->nullable();
            $table->longText("deskripsi")->nullable();
//            $table->timestamps();

            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign("kota_id")->references("kota_id")->on("kotas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisatas');
    }
}
