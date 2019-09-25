<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenginapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penginapans', function (Blueprint $table) {
            $table->uuid('penginapan_id')->nullable(false)->primary();
//            $table->timestamps();
            $table->string("nama_penginapan", 150)->nullable(false);
            $table->longText("slug")->nullable();
            $table->uuid("kota_id");
            $table->time("waktu_operasional")->nullable();
            $table->enum("waktu_bagian", ['WIB','WIT','WITA'])->default('WIB');
            $table->longText("deskripsi")->nullable();
            $table->text("alamat")->nullable();
            $table->string("image", 200)->nullable();
            $table->string("alt", 100)->nullable();
            $table->enum("is_approved", ['Publish','Reject','Pending'])->default("Pending");
            $table->string("url", "200")->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign("kota_id")->references("kota_id")->on("kotas")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penginapans');
    }
}
