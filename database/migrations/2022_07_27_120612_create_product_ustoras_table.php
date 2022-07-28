<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUstorasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_ustoras', function (Blueprint $table) {
      $table->id();
      $table->integer('cat_id');
      $table->text('product_name');
      $table->string('quantity')->nullable();
      $table->text('image')->nullable();
      $table->string('discount_price')->nullable();
      $table->string('price')->nullable();
      $table->string('top_seller')->nullable();
      $table->string('recently_view')->nullable();
      $table->string('top_new')->nullable();
      $table->text('details')->nullable();
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
    Schema::dropIfExists('product_ustoras');
  }
}
