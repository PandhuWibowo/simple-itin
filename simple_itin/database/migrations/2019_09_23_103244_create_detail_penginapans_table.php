<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPenginapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penginapans', function (Blueprint $table) {
            $table->uuid('penginapan_id');
            $table->uuid('jenis_penginapan_id');
//            $table->timestamps();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign("penginapan_id")->references("penginapan_id")->on("penginapans")->onDelete('cascade');
            $table->foreign("jenis_penginapan_id")->references("jenis_penginapan_id")->on("jenis_penginapans")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penginapans');
    }
}
