<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->timestamps();
        });

        Schema::create('product_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('sell_price', 8, 2);
            $table->integer('min_stock');
            $table->integer('max_stock');
            $table->timestamps();

            //foreing
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['min_stock', 'max_stock', 'sell_price',]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('sell_price', 8, 2);
            $table->integer('min_stock');
            $table->integer('max_stock');
        });

        Schema::dropIfExists('product_branches');

        Schema::dropIfExists('branches');
    }
}
