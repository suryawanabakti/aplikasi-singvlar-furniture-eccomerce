<?php

use App\Models\Toko;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Toko::class);
            $table->integer('total');
            $table->enum('metode', ['cod', 'transfer']);
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['process', 'canceled', 'success']);
            $table->integer('ongkir')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
