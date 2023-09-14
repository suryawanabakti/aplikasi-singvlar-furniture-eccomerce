<?php

use App\Models\Product;
use App\Models\Toko;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Transaction::class)->nullable();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Toko::class);
            $table->integer('jumlah');
            $table->integer('total');
            $table->enum('status', ['process', 'checkout'])->default('process');
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
        Schema::dropIfExists('carts');
    }
};
