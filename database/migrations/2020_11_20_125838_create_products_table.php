<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('descr')->nullable();
            $table->text('descr2')->nullable();
            $table->text('descr3')->nullable();
            $table->string('composition')->nullable();
            $table->string('sposib')->nullable();
            $table->text('image')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('articul')->nullable();
            $table->string('country')->nullable();
            $table->string('amount')->nullable();
            $table->string('appointment')->nullable();
            $table->string('type')->nullable();
            $table->string('sfera')->nullable();
            $table->string('components')->nullable();
            $table->string('kind')->nullable();
            $table->string('subtype')->nullable();
            $table->string('app')->nullable();
            $table->string('brand')->nullable();
            $table->string('seria')->nullable();
            $table->tinyInteger('woman')->default(0);
            $table->tinyInteger('man')->default(0);
            $table->tinyInteger('child')->default(0);
            $table->tinyInteger('molod')->default(0);
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
        Schema::dropIfExists('products');
    }
}
